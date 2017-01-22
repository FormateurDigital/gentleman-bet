@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @forelse($gps as $gp)
                {{$gp->date}}
                <img src="{{'/public/' . $gp->avatar->url()}}">
                <a href="{{action('GrandPrixController@show', ['id' => $gp->id])}}">{{$gp->name}}</a>
            @empty
                No Gp
            @endforelse
        </div>
    </div>
@endsection
