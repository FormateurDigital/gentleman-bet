@extends('layouts.app')

@section('content')
    <div class="container">
    <h1>Calendrier - {{$season->name}}
        @if (\Auth::user()->role == "admin")
            <a href="{{action("GrandPrixController@create", ["season_id" => $season->id])}}" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></a>
        @endif
    </h1>
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
                    <td>
                        <a href="{{action('GrandPrixController@show', ['id' => $gp->id])}}"><img style="height: 30px" src="{{'' . $gp->flag()}}">  {{$gp->name}}</a></td>
                    <td>
                        {{$gp->date}}
                        @if (\Auth::user()->role == "admin")
                            <div class="pull-right">
                                <a href="{{action("GrandPrixController@updateRedirect", ["id" => $gp->id])}}" class="btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a href="{{action("GrandPrixController@destroy", ["id" => $gp->id])}}" class="btn btn-danger" onclick="return confirm('Etes-vous sûr ?');"><i class="fa fa-trash" aria-hidden="true"></i></a>&nbsp;
                            </div>&nbsp;
                        @endif
                    </td>
                </tr>
            @empty
                No Gp
            @endforelse
        </tbody>
    </table>
    </div>
@endsection
