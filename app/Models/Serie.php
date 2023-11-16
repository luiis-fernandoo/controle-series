<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $fillable = [
        'nome',
    ];

    use HasFactory;


    public function seasons(){

        return $this->hasMany(Season::class, 'series_id');
    }

    public function cast(){
        return $this->hasMany(Cast::class, 'series_id');
    }

    public function episodes(){

        return $this->hasManyThrough(Episode::class, Season::class, 'series_id');
    }

    protected static function booted()
    {
        self::addGlobalScope('ordered', function(Builder $queryBuilder){
            $queryBuilder->orderBy('nome');
        });
    }
}
