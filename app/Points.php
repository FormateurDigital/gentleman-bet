<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Points extends Model
{
    //
    protected $fillable = [
        'total', 'pole', 'podium', 'diumpo', 'duo', 'udo', 'vainq', 'position1', 'position2', 'position3', 'position4', 'position5', 'position6', 'position7', 'position8', 'position9', 'position10'
    ];

    public function __construct(array $attributes = [])
    {
        $this->total = 0;
        $this->pole = 0;
        $this->podium = 0;
        $this->diumpo = 0;
        $this->duo = 0;
        $this->udo = 0;
        $this->vainq = 0;
        $this->position1 = 0;
        $this->position2 = 0;
        $this->position3 = 0;
        $this->position4 = 0;
        $this->position5 = 0;
        $this->position6 = 0;
        $this->position7 = 0;
        $this->position8 = 0;
        $this->position9 = 0;
        $this->position10 = 0;
        parent::__construct($attributes);
    }

    public function result () {

        $this->belongsTo('App\Result');
    }
}
