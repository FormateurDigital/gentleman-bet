<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class Pilote extends Model implements StaplerableInterface
{
    use EloquentTrait;
    //
    protected $fillable = [
        'name', 'acronym', 'avatar'
    ];

    public function stable () {

        return $this->belongsTo('App\Stable');
    }

    public function avatar () {

        return $this->avatar->url();
    }

    public function gp () {

        return $this->belongsToMany('App\GrandPrix');
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
