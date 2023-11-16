<?php

namespace Tests\Feature;

use App\Http\Requests\SeriesFormResquest;
use App\Models\Serie;
use App\Repositories\EloquentSeriesRepository;
use App\Repositories\SeriesRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SeriesRepositoryTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        /**  @var seriesRepository $repository */
        $repository = $this->app->make(SeriesRepository::class);
        
        $request = new SeriesFormResquest();
        
        $request->merge([
            'nome' => 'Nome da Série',
            'seasonsQnt' => 1,
            'episodesPerSeason' => 5,
        ]);

        $repository->add($request);

        $this->assertDatabaseHas('series', ['nome' => 'Nome da Série']);
        $this->assertDatabaseHas('seasons', ['number' => 1]);
        $this->assertDatabaseHas('episodes', ['number' => 5]);
        
    }
}
