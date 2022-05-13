<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $casts = [
        'items' => 'array' // transforma o campo items em um array
    ];

    protected $dates = ['date']; // transforma o campo date em um date
    
    public function user(){
        return $this->belongsTo('App\Models\User'); // belongsTo é uma relação de 1 para 1
    }
}
