<?php

namespace App\Http\Controllers;

use App\Events\SeriesCreated as EventsSeriesCreated;
use App\Http\Requests\SeriesFormResquest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Serie;
use App\Repositories\EloquentSeriesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\SeriesRepositorysitory;
use App\Http\Middleware\Autenticador;
use App\Mail\SeriesCreated;
use App\Models\User;
use App\Repositories\SeriesRepository;
use Illuminate\Support\Facades\Mail;

class seriesController extends Controller
{

    private $repository;

    public function __construct(SeriesRepository $repository)
    {
        $this->repository = $repository;
        $this->middleware(Autenticador::class)->except('index');
    
    }

    public function index(Request $request)
    {
        
        $series = Serie::all();
        $mensagem = session('mensagem.sucesso');

        return view('Series.index')->with('series', $series)->with('mensagem', $mensagem);
    }
    
    public function create()
    {

        return view('Series.create');
    }

    public function store(SeriesFormResquest $request)
    {
        $serie = $this->repository->add($request);

        EventsSeriesCreated::dispatch(
            $serie->nome,
            $serie->id,
            $request->seasonsQnt,
            $request->episodesPerSeason,
        );

        return redirect()->route('series.index')->with('mensagem.sucesso', 'Serie adicionada com sucesso')->with('series', $serie);
    }

    public function destroy(Serie $series)
    {
        $series->delete();

        return redirect()->route('series.index')->with('mensagem.sucesso', "Serie '{$series->nome}' removida com sucesso!");
    }

    public function edit(Serie $series)
    {
        return view('Series.edit')->with('series', $series);
    }

    public function update(Serie $series, SeriesFormResquest $request)
    {
        $series->fill($request->all());
        $series->save();

        return redirect()->route('series.index')->with('mensagem.sucesso', 'Serie Editada com sucesso');

    }

}
