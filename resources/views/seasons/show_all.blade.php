@extends('layouts.app')

@section('content')
    <div class="container">
            @forelse($seasons as $season)
                <div class="row season-row">
                    <h1><a href="{{action('SeasonsController@showResults', ['season' => $season->id])}}">{{$season->name}}</a></h1>
                </div>
            @empty
                No Gp
            @endforelse
    </div>
@endsection
