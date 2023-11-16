<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormResquest;
use App\Models\Serie;
use App\Repositories\SeriesRepository;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function __construct(private SeriesRepository $repository)
    {}

    public function index(Request $request){

        $query = Serie::query();

        if($request->has('nome')){
            $query->where('nome', $request->nome);
        }

        return $query->paginate(5);
        
    }

    public function store(SeriesFormResquest $request){

        return response()->json($this->repository->add($request), 201);
    }

    public function show(int $series){

        $series = Serie::with('seasons.episodes')->find($series);

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
