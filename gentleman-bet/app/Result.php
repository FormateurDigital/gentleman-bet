<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model {

    protected $fillable = [
        'pole', 'score',    'position1', 'position2', 'position3', 'position4', 'position5', 'position6', 'position7', 'position8', 'position9', 'position10'
    ];

    public function gp () {

        return $this->belongsTo('App\GrandPrix', 'grand_prix_id');
    }

    public function point () {

        return $this->hasOne('App\Points');
    }

    public function user () {

        return $this->belongsTo('App\User');
    }
}
