<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    public $timestamps = false;

    use HasFactory;

    protected $fillable = [
        'number',
    ];

    public function seasons()
    {
        return $this->belongsTo(Season::class);
    }
}
