<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class GrandPrix extends Model implements StaplerableInterface {

    use EloquentTrait;

    protected $fillable = [
        'name', 'avatar', 'date', 'info1', 'info2', 'info3', 'info4'
    ];

    public function season () {

        return $this->belongsTo('App\Season');
    }

    public function pilotes () {

        return $this->belongsToMany('App\Pilote');
    }

    public function flag () {

        return $this->avatar->url();
    }

    public function betable () {

        $now = Carbon::now(new \DateTimeZone('Europe/Paris'));
        if ($now->gte($this->betTime()))
            return false;
        else
            return true;
    }

    public function betTime () {

        $date = new Carbon($this->date, 'Europe/Paris');
        return $date->subHours(60);
    }

    public function results () {

        return $this->hasMany('App\Result');
    }

    public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('avatar', [
            'styles' => [
                'medium' => '300x300',
                'thumb' => '100x100'
            ],
        ]);

        parent::__construct($attributes);
    }
}
