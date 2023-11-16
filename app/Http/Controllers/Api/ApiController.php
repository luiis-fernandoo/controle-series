<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormResquest;
use App\Models\Cast;
use App\Models\Season;
use App\Models\Serie;
use App\Repositories\SeriesRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    private $repository;

    public function __construct( SeriesRepository $repository)
    {
        $this->repository = $repository;
    }


    public function index(Request $request){

        $querySerie = Serie::query();
        
        if($request->has('nome')){
            $querySerie->where('nome', 'like', "%$request->nome%");

        }else if($request->has('nomeAtor')){
            $actor = Serie::with('cast')->whereHas('cast', function(Builder $query ) use($request){
                $query->where('nomeAtor', 'like', "%$request->nomeAtor%");
            })->get();  

            return $actor;
        }

        return $querySerie->paginate(5);
        
    }

    public function store(SeriesFormResquest $request){

        return response()->json($this->repository->add($request), 201);
    }

    public function show(int $series, Request $request){

        $queryActor = Serie::query();
        $querySeason = Serie::query();

        if($request->has('nomeAtor')){
            
            $queryActor = Serie::with(['cast' => function($query) use($request){
                $query->where('nomeAtor', 'like', "%$request->nomeAtor%");
            }])->whereHas('cast', function(Builder $query) use($request, $series){
                $query->where('nomeAtor', 'like', "%$request->nomeAtor%")->where('series_id', $series);
            });

            return $queryActor->paginate(5);
        
        }else if($request->has('season')){
            $querySeason = Serie::with('seasons')->with('episodes')->whereHas('seasons', function(Builder $query) use($request, $series){
                $query->where('number', '=', $request->season)->where('series_id', $series);
            });
            
            return $querySeason->paginate(5); 
        }

        $series = Serie::with('seasons.episodes', 'cast')->findOrFail($series);

        return $series;

    }

    public function update(Serie $series, SeriesFormResquest $request){

        $series->fill($request->all());
        $series->save();

        return $series;
    }

    public function destroy(Serie $series){
        $series->delete();

        return response()->noContent();
    }
}
