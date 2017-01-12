<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SeasonsController extends Controller
{
    //

    public function create () {

        return view('/seasons/create');

    }

    public function store () {
        dd('store');
    }
}
