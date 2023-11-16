<?php

namespace App\Repositories;

use App\Http\Requests\SeriesFormResquest;
use App\Models\Cast;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Serie;
use Illuminate\Support\Facades\DB;
use App\Repositories\SeriesRepository;

class EloquentSeriesRepository implements SeriesRepository{

    public function add(SeriesFormResquest $request):Serie
    {
        return DB::transaction(function()use($request){
            $series = Serie::create($request->all());

            $cast = $request->nomeAtor;

            foreach($cast as $casts){
                $actor = new Cast();
                $actor->series_id = $series->id;
                $actor->nomeAtor = $casts;
                $actor->save();
            }

            $seasons = [];
            for($i = 1; $i <= $request->seasonsQnt; $i++){
                $seasons[] = [
                    'series_id' => $series->id,
                    'number' => $i,
                ];   
            }
    
            Season::insert($seasons);
    
            $episodes = [];
            foreach($series->seasons as $season){
                for($j = 1; $j <= $request->episodesPerSeason; $j++){
                    $episodes[] = [
                        'number' => $j,
                        'season_id' => $season->id,
                    ];
                    
                }
            }
            Episode::insert($episodes);
            return $series;
        });

    
    }
}