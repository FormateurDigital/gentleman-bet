<?php

namespace App\Http\Controllers;

use App\GrandPrix;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Season;
use Monolog\Handler\SyslogUdp\UdpSocket;

class SeasonsController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }

    public function show ($id) {
        #to
        $season = Season::findOrFail($id);
        $gps = $season->gp;
        return view('seasons/show')->withGps($gps)->withSeason($season);
    }

    public function showAll () {

        $seasons = Season::all();
        return view('seasons/show_all')->withSeasons($seasons);
    }

    public function showResults ($id) {

        $season = Season::findOrFail($id);
        $gps = $season->gp;
        $users = User::all();
        foreach ($users as $user) {
            $user->total = 0;
            foreach ($gps as $gp)
                foreach ($gp->results->where('user_id', $user->id)->where('type', 'bet') as $result) {
                    if (isset($result->point))
                        $user->total += $result->point->total;
                }
        }

        return view('seasons/results')->withSeason($season)->withGps($gps)->withUsers($users->sortByDesc("total"));
    }

    public function create () {

        return view('/seasons/create');

    }

    public function store (Request $request) {

        $this->validate($request, [
            'name'      => 'required | string'
        ]);
        $season = Season::create(Input::all());
        return view('/grand_prixs/create')->withSeason($season->id)->withNew(false);
    }
}
