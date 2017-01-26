@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            {{$season->name}}
            <table>
                <thead>
                <tr>
                    <th>Rang</th>
                    <th>Pronostiqueurs</th>
                    <th>TOTAL</th>
                    @forelse($gps as $gp)
                        <th>{{$gp->name}}</th>
                    @empty
                    @endforelse
                </tr>
                </thead>
                <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>0</td>
                        <td>{{$user->name}}</td>
                        <td>0</td>
                        @forelse($gps as $gp)
                            <td>0</td>
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
