<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Season;
use CreateSeasonsTable;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    public function index(int $season)
    {
        $season = Season::find($season);
        return view('Episode.index', ['episodes' => $season->episodes, 'mensagem.sucesso' => session('mensagem.sucesso')]);
    }

    public function update(Request $request, int $season)
    {
        $season = Season::find($season);
        
        $watchedEpisodes = $request->episodes;
        $season->episodes->each(function(Episode $episode) use($watchedEpisodes){
            $episode->watched = in_array($episode->id, $watchedEpisodes);
            $episode->save();
        });
        return redirect()->route('episodes.index', $season->id)->with('mensagem.sucesso', 'Episódio marcado com sucesso');
    }
}
