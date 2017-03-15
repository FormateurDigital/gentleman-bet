<?php

namespace App\Http\Controllers;

use App\Pilote;
use App\Result;
use Carbon\Carbon;
use App\GrandPrix;
use App\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class GrandPrixController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }

    public function show ($id) {

        $gp = GrandPrix::findOrFail($id);
        $date = new Carbon($gp->date);
        $lastDay = false;
        if ($gp->betTime()->isToday())
            $lastDay = true;
        $date = $date->format('Y/m/d');
        $result = $gp->results()->where('user_id', \Auth::user()->id)->where('type', '!=', 'result')->first();

        if (isset($result->pole))
            $input["pole"] = $result->pole;
        for ($i = 1; $i <= 10; $i++) {
            if (isset($result->{'position' . $i}))
            $input["position" . $i] = (string)$result->{'position' . $i};
        }
        return isset($input) ? view('grand_prixs/show')->withGp($gp)->withInput($input)->withDate($date)->withLast($lastDay)
            : view('grand_prixs/show')->withGp($gp)->withDate($date)->withLast($lastDay);
    }

    public function create ($season_id) {

        return view('/grand_prixs/create')->withSeason($season_id)->withNew(true);

    }

    public function updateRedirect ($id) {

        $gp = GrandPrix::findOrFail($id);
        return view("grand_prixs/update")->withGp($gp);
    }

    public function update ($id) {

        $gp = GrandPrix::findOrFail($id);
        $name = Input::get('name');
        $date = Input::get('date');
        $flag = Input::file('avatar');
        $info1 = Input::get('info1');
        $info2 = Input::get('info2');
        $info3 = Input::get('info3');
        $info4 = Input::get('info4');

        if (isset($name))
            $gp->name = $name;
        if (isset($date))
            $gp->date = $date;
        if (isset($flag))
            $gp->avatar = $flag;
        if (isset($info1))
            $gp->info1 = $info1;
        if (isset($info2))
            $gp->info2 = $info2;
        if (isset($info3))
            $gp->info3 = $info3;
        if (isset($info4))
            $gp->info4 = $info4;
        $gp->save();

        return redirect()->action("GrandPrixController@show", ["id" => $gp->id]);
    }

    public function destroy($id) {

        $gp = GrandPrix::findOrFail($id);
        $id = $gp->season->id;
        $results = $gp->results;
        foreach($results as $result) {
            $point = $result->point;
            if (isset($point))
                $point->delete();
            $result->delete();
        }
        foreach($gp->pilotes as $pilote) {
            $pilote->pivot->delete();
        }
        $gp->delete();
        return redirect()->action("SeasonsController@show", ["id" => $id]);
    }

    public function updatePilotes ($id) {
        $gp = GrandPrix::findOrFail($id);
        $pilotes = Pilote::all();
        return view('/grand_prixs/updatePilotes')->withGp($gp)->withPilotes($pilotes);
    }

    public function storePilotes ($id) {
        $gp = GrandPrix::findOrFail($id);
        $gp->pilotes()->detach();
        for ($i = 1; $i <= Input::get('numbers') + 1; $i++) {
            if (Input::get('pilote' . $i) !== null) {
                $gp->pilotes()->attach(Input::get('pilote' . $i));
                $gp->save();
            }
        }
        return redirect()->action('GrandPrixController@show', ['id' => $gp]);
    }

    public function store (Request $request) {

        $this->validate($request, [
            'name'      => 'required | string',
            'avatar'    => 'required',
            'info1'     => 'required | string',
            'info2'     => 'required | string',
            'info3'     => 'required | string',
            'info4'     => 'required | string',
            'date'      => 'required'
        ]);

        $season = Season::findOrFail(Input::get('season'));
        $new = Input::get('new');

        $gp = new GrandPrix();
        $gp->name = Input::get('name');
        $gp->avatar = Input::file('avatar');
        $gp->date = Input::get('date');
        $gp->info1 = Input::get('info1');
        $gp->info2 = Input::get('info2');
        $gp->info3 = Input::get('info3');
        $gp->info4 = Input::get('info4');
        $gp->season()->associate($season);
        $gp->save();
        if (!$new)
            return view('/grand_prixs/create')->withGp($gp)->withSeason(Input::get('season'))->withNew(false);
        return redirect()->action("SeasonsController@show", ["id" => $season->id]);
    }
}
