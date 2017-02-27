<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Stable;

class StablesController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    //
    public function create () {

        return view('/stables/create');

    }

    public function store (Request $request) {

        $this->validate($request, [
            'name'  => 'required | string',
        ]);

        Stable::create(Input::all());

        return redirect()->action("HomeController@home");
    }
}
