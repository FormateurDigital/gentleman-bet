<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Stable;
use App\Pilote;

class PilotesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    //
    public function create () {

        $stables = Stable::all();

        return view('/pilotes/create')->withStables($stables);

    }

    public function show () {

        $pilotes = Pilote::all()->sortBy("stable_id");
        return view("/pilotes/show")->withPilotes($pilotes);
    }

    public function store (Request $request) {

        $this->validate($request, [
            'name'      => 'required | string',
            'acronym'   => 'required | string | size:3',
            'stable'    => 'required',
            'avatar'    => 'required | mimes:jpeg,jpg,png'
        ]);

        $stable = Stable::findOrFail(Input::get('stable'));

        $pilote = new Pilote();
        $pilote->name = Input::get('name');
        $pilote->acronym = Input::get('acronym');
        $pilote->avatar = Input::file('avatar');
        $pilote->stable()->associate($stable);
        $pilote->save();

        return redirect()->action('HomeController@home');
    }
}
