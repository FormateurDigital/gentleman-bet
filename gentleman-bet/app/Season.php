<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    //
    protected $fillable = [
        'name',
    ];

    public function gp () {

        return $this->hasMany('App\GrandPrix');
    }
}
