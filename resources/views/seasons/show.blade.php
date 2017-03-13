@extends('layouts.app')

@section('content')
    <div class="container">
    <h1>Calendrier - {{$season->name}}</h1>
    <table class="col-md-5 table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse($gps as $gp)
                <tr>
                    <td><a href="{{action('GrandPrixController@show', ['id' => $gp->id])}}"><img style="height: 30px" src="{{'' . $gp->flag()}}">  {{$gp->name}}</a></td>
                    <td>{{$gp->date}}</td>
                </tr>
            @empty
                No Gp
            @endforelse
        </tbody>
    </table>
    </div>
@endsection
