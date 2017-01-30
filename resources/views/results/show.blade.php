@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <!--{{$gp->name}}
           <img src="{{$gp->avatar->url()}}">
            {{$gp->date}}-->
            <h1 class="gp_h1"><img src="{{$gp->avatar->url()}}"> {{ $gp->name }} <span class="little">- {{ $gp->date }}</span></h1>
            <table class="table">
                <thead>
                <tr>
                    <th>Rang</th>
                    <th>Pronostiqueurs</th>
                    <th>TOTAL</th>
                    <th>Pole</th>
                    <th>Podium</th>
                    <th>Diumpo</th>
                    <th>Duo</th>
                    <th>Udo</th>
                    <th>Vainqueur</th>
                    <th>Pole</th>
                    <th>1er</th>
                    <th>2eme</th>
                    <th>3eme</th>
                    <th>4eme</th>
                    <th>5eme</th>
                    <th>6eme</th>
                    <th>7eme</th>
                    <th>8eme</th>
                    <th>9eme</th>
                    <th>10eme</th>
                </tr>
                </thead>
                <tbody>
                    @forelse($results as $result)
                        <tr>
                            <td>0</td>
                            <td>{{$result->user->name}}</td>
                            <td></td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>{{$result->pole}}</td>
                            <td>{{$result->position1}}</td>
                            <td>{{$result->position2}}</td>
                            <td>{{$result->position3}}</td>
                            <td>{{$result->position4}}</td>
                            <td>{{$result->position5}}</td>
                            <td>{{$result->position6}}</td>
                            <td>{{$result->position7}}</td>
                            <td>{{$result->position8}}</td>
                            <td>{{$result->position9}}</td>
                            <td>{{$result->position10}}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>

                        </tr>
                    @empty
                        No Results
                    @endforelse
                </tbody>

            </table>

        </div>
    </div>
@endsection
