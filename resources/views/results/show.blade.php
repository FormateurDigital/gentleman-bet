@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="gp_h1"><a href="{{action('GrandPrixController@show', ['id' => $gp->id])}}"><img src="{{$gp->flag()}}"></a>{{ $gp->name }} <span class="little">- {{ $gp->betterDate() }}</span></h1>
            <table class="table">
                <thead>
                   <tr>
                        <th>Rang</th>
                        <th>Pronostiqueurs</th>
                        <th>TOTAL</th>
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
                    @forelse($bets as $bet)
                        @if($bet->type == "result")
                            <tr class="alert alert-warning">
                                <td></td>
                                <td>Résultat</td>
                        @elseif($bet->user->id == \Auth::user()->id)
                            <tr class="alert alert-info">
                                <td>{{$loop->index}}</td>
                                <td>{{$bet->user->name}}</td>
                        @else
                            <tr>
                                <td>{{$loop->index}}</td>
                                <td>{{$bet->user->name}}</td>
                        @endif
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>{{isset($id_pilotes[$bet->pole][0]) ? $id_pilotes[$bet->pole][0] : "---"}}</td>
                                <td>{{isset($id_pilotes[$bet->position1][0]) ? $id_pilotes[$bet->position1][0] : "---"}}</td>
                                <td>{{isset($id_pilotes[$bet->position2][0]) ? $id_pilotes[$bet->position2][0] : "---"}}</td>
                                <td>{{isset($id_pilotes[$bet->position3][0]) ? $id_pilotes[$bet->position3][0] : "---"}}</td>
                                <td>{{isset($id_pilotes[$bet->position4][0]) ? $id_pilotes[$bet->position4][0] : "---"}}</td>
                                <td>{{isset($id_pilotes[$bet->position5][0]) ? $id_pilotes[$bet->position5][0] : "---"}}</td>
                                <td>{{isset($id_pilotes[$bet->position6][0]) ? $id_pilotes[$bet->position6][0] : "---"}}</td>
                                <td>{{isset($id_pilotes[$bet->position7][0]) ? $id_pilotes[$bet->position7][0] : "---"}}</td>
                                <td>{{isset($id_pilotes[$bet->position8][0]) ? $id_pilotes[$bet->position8][0] : "---"}}</td>
                                <td>{{isset($id_pilotes[$bet->position9][0]) ? $id_pilotes[$bet->position9][0] : "---"}}</td>
                                <td>{{isset($id_pilotes[$bet->position10][0]) ? $id_pilotes[$bet->position10][0] : "---"}}</td>

                            </tr>

                            @if($bet->type != "result")
                                @if ($bet->user->id == \Auth::user()->id)
                                    <tr class="alert alert-info">
                                @else
                                    <tr>
                                @endif
                                        <td></td>
                                        <td></td>
                                        <td>{{isset($bet->point) ? $bet->point->total : ""}}</td>
                                        <td>{{isset($bet->point) ? $bet->point->podium : ""}}</td>
                                        <td>{{isset($bet->point) ? $bet->point->diumpo : ""}}</td>
                                        <td>{{isset($bet->point) ? $bet->point->duo : ""}}</td>
                                        <td>{{isset($bet->point) ? $bet->point->udo : ""}}</td>
                                        <td>{{isset($bet->point) ? $bet->point->vainq : ""}}</td>
                                        <td>{{isset($bet->point) ? $bet->point->pole : ""}}</td>
                                        @for ($i = 1; $i <= 10; $i++)
                                            <td>{{isset($bet->point) ? $bet->point->{$id_pilotes[$bet->{"position".$i}][1]} : "" }}</td>
                                        @endfor
                                    </tr>
                            @endif
                            @empty
                                No Results
                            @endforelse
                        </tbody>
                     </table>
        </div>
    </div>
@endsection
