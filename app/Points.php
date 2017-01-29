<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Points extends Model
{
    //
    protected $fillable = [
        'total', 'pole', 'podium', 'diumpo', 'duo', 'udo', 'vainq', 'position1', 'position2', 'position3', 'position4', 'position5', 'position6', 'position7', 'position8', 'position9', 'position10'
    ];

    public function result () {

        $this->belongsTo('App\Result');
    }
}
