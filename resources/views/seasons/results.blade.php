@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>{{$season->name}}</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>Rang</th>
                    <th>Pronostiqueurs</th>
                    <th>TOTAL</th>
                    @forelse($gps as $gp)
                        <th><a href="{{action('ResultsController@show', ['gp'=> $gp->id])}}">{{$gp->name}}</a></th>
                    @empty
                    @endforelse
                </tr>
                </thead>
                <tbody>
                @forelse($users as $user)
                    @if ($user->id == \Auth::user()->id)
                        <tr class="alert alert-info">
                    @else
                        <tr>
                    @endif
                        <td>{{$loop->index + 1}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$users_total[$user->id]}}</td>
                        @forelse($gps as $gp)
                            <td>{{($total = $gp->results->where('user_id', $user->id)->where('type', 'bet')->first()) !== null ? isset($total->point) ? $total->point->total : "None" : "None"}}</td>
                        @empty
                        @endforelse
                    </tr>
                @empty
                    Pas de Pronostiqueurs
                @endforelse
                </tbody>

            </table>

        </div>
    </div>
@endsection
