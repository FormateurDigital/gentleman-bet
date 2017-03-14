<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stable extends Model
{
    //
    protected $fillable = [
        'name'
    ];

    public function pilotes () {

        return $this->hasMany('App\Pilote');
    }
}
