<?php

namespace App\Http\Controllers;

use App\Models\Cast;
use App\Models\Season;
use App\Models\Serie;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    public function index(int $series){
        $seasons = Season::query()
        ->with('episodes')
        ->where('series_id', $series)
        ->get();
        
        $cast = Cast::query()->where('series_id', $series)->get();

        return view('Seasons.index')->with('seasons', $seasons)->with('cast', $cast);
    }
}
