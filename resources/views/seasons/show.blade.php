@extends('layouts.app')

@section('content')
    <div class="container">
    <h1>Calendrier</h1>
    <table class="col-md-5 table">
        <!--<thead>
            <tr>
                <th>Date</th>
                <th>Logo</th>
                <th>Nom</th>
            </tr>
        </thead>-->
        <tbody>
            @forelse($gps as $gp)
                <td>{{$gp->date}}</td>
                <!--<td><img src="{{'/public/' . $gp->avatar->url()}}"></td>-->
                <td><img style="height: 30px" src="{{'' . $gp->avatar->url()}}"></td>
                <td><a href="{{action('GrandPrixController@show', ['id' => $gp->id])}}">{{$gp->name}}</a></td>
            @empty
                No Gp
            @endforelse
        </tbody>
    </table>
    </div>
@endsection
