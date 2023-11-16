<?php

namespace App\Repositories;

use App\Http\Requests\SeriesFormResquest;
use App\Models\Serie;

interface SeriesRepository
{
    public function add(SeriesFormResquest $request):Serie;

}