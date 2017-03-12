<?php

namespace App\Http\Controllers;

use App\GrandPrix;
use App\Points;
use App\Result;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ResultsController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }

    public function bet ($gp_id, $user_id) {
        $gp = GrandPrix::findOrFail($gp_id);
        $gps = $gp->season->gp->sortByDesc('date');
        $result = $gp->results()->where('user_id', $user_id)->first();
        if (!$result)
            $result = new Result();
        elseif (Input::get('type') == 'result') {
            $resultat = $gp->results()->where('type', 'result')->first();
            if ($resultat)
                return view('grand_prixs/show')->withGp($gp)->withResultErrors('Vous avez deja annonce des resultats')->withInput(Input::all());
            else
                $result = new Result();
        }

        $user = User::findOrFail($user_id);
        $result->score = 0;
        $result->type = Input::get('type');
        $result->pole = Input::get('pole');
        $result->position1 = Input::get('position1');
        $result->position2 = Input::get('position2');
        $result->position3 = Input::get('position3');
        $result->position4 = Input::get('position4');
        $result->position5 = Input::get('position5');
        $result->position6 = Input::get('position6');
        $result->position7 = Input::get('position7');
        $result->position8 = Input::get('position8');
        $result->position9 = Input::get('position9');
        $result->position10 = Input::get('position10');
        $result->user()->associate($user);
        $result->gp()->associate($gp);
        $result->save();

        foreach ($gps as $index => $gpd) {
            if ($gpd->id == $gp_id)
                $pos = $index;
        }
        if (Input::get('type') != 'result') {
            for ($i = $index; $i < count($gps); $i++) {
                $res = $gps[$i]->results()->where('type', 'bet')->where('user_id', $user_id)->first();
                if (!$res)
                    $res = new Result();
                $res->score = 0;
                $res->type = $result->type;
                $res->pole = $result->pole;
                $res->position1 = $result->position1;
                $res->position2 = $result->position2;
                $res->position3 = $result->position3;
                $res->position4 = $result->position4;
                $res->position5 = $result->position5;
                $res->position6 = $result->position6;
                $res->position7 = $result->position7;
                $res->position8 = $result->position8;
                $res->position9 = $result->position9;
                $res->position10 = $result->position10;
                $res->user()->associate($user);
                $res->gp()->associate($gps[$i]);
                $res->save();
            }
        }

        if (Input::get('type') === "result")
            $this->_calculate_points($gp);
        return view('grand_prixs/show')->withGp($gp)->withValidation('Pari pris en compte !')->withInput(Input::all());
    }

    private function _calculate_position ($result, $bet, $position)
    {
        if ($result->{'position' . $position} == $bet->{'position' . $position})
            return 25;
        else {
            $i = 1;
            while ($result->{'position' . $position} != $bet->{'position' . $i}) {
                $i++;
                if ($i == 11)
                    return 0;
            }
            $abs = abs($position - $i);
            if ($abs == 1)
                return 18;
            else
                return 20 - (2 * $abs);
        }

    }

    private function _calculate_points($gp) {

        $bets = $gp->results;
        $result = $gp->results->where('type', 'result')->first();

        foreach ($bets as $bet) {
            $point = new Points();
            $total = 0;
            for ($i = 1; $i <= 10; $i++) {
                $point->{'position' . $i} = $this->_calculate_position($result, $bet, $i);
                $total += $point->{'position' . $i};
            }
            if ($result->pole == $bet->pole)
                $point->pole = 20;
            else
                $point->pole = 0;
            if ($bet->position1 == $result->position1) {
                if ($bet->position2 == $result->position2) {
                    if ($bet->position3 == $result->position3) {
                        $point->podium = 100;
                    }
                    else
                        $point->duo = 60;
                }
                elseif ($bet->position2 == $result->position3) {
                    if ($bet->position3 == $result->position2)
                        $point->diumpo = 50;
                }
                else
                    $point->vainq = 20;
            }
            elseif ($bet->position2 == $result->position2) {
                if ($bet->position1 == $result->position3)
                    if ($bet->position3 == $result->position1)
                        $point->diumpo = 60;
            }
            elseif ($bet->position3 == $result->position3) {
                if ($bet->position2 == $result->position1)
                    if ($bet->position1 == $result->position2)
                        $point->diumpo = 50;
            }
            elseif ($bet->position2 == $result->position1)
                if ($bet->position1 == $result->position2)
                    $point->udo = 30;
            $point->total = $total + $point->pole + $point->podium + $point->diumpo + $point->duo + $point->udo + $point->vainq;
            $bet->point()->save($point);
        }
     }

    public function show ($gp_id)
    {
        $gp = GrandPrix::findOrFail($gp_id);
        if (isset($gp->results->point)) {
            $results = $gp->results->sortByDesc(function ($elem) {
                return ($elem->point->total);
            });
        }
        $results = $gp->results->sortByDesc(function ($elem) {
            return ($elem->type);
        });

        $pilotes = $gp->pilotes;
        $id_pilotes = array();
        foreach ($pilotes as $pilote)
            $id_pilotes[$pilote->id] = $pilote->acronym;

        return view('results/show')->withResults($results)->withGp($gp)->withIdPilotes($id_pilotes);
    }
}
