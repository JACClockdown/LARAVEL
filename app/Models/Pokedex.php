<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokedex extends Model
{
    use HasFactory;

    protected $table = 'pokedex';

    protected $fillable = [
        'statusResponse',
        'timesResponse',
        'responseQuery'
    ];

    protected $casts = [
        'responseQuery' => 'array',
    ];

    public function setResponseQueryAttribute($value){
        $this->attributes['responseQuery'] =  json_encode($value);
    }
}
