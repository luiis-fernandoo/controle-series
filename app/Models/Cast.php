<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cast extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomeAtor',
        'series_id',
    ];

    public function series(){
        return $this->belongsTo(Serie::class);
    }

}
