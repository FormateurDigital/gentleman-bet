@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Saisons</h1>
        <table class="col-md-5 table">
            <thead>
                <tr>
                    <th>Nom</th>
                </tr>
            </thead>
            <tbody>

                @forelse($seasons as $season)
                    <tr>
                        <td>
                            <div class="row season-row">
                                <a href="{{action('SeasonsController@showResults', ['season' => $season->id])}}">{{$season->name}}</a>
                            </div>
                        </td>
                    </tr>
                @empty
                    No Gp
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
