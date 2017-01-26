@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @forelse($seasons as $season)
                <a href="{{action('SeasonsController@showResults', ['season' => $season->id])}}">{{$season->name}}</a>
            @empty
                No Gp
            @endforelse
        </div>
    </div>
@endsection
