@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="gp_h1"><a href="{{action('GrandPrixController@show', ['id' => $gp->id])}}"><img src="{{$gp->flag()}}"></a>{{ $gp->name }} <span class="little">- {{ $gp->date }}</span></h1>
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
                    @forelse($results as $result)
                        @if($result->type == "result")
                            <tr class="alert alert-warning">
                                <td></td>
                                <td>Résultat</td>
                        @elseif($result->user->id == \Auth::user()->id)
                            <tr class="alert alert-info">
                                <td>{{$loop->index}}</td>
                                <td>{{$result->user->name}}</td>
                        @else
                            <tr>
                                <td>{{$loop->index}}</td>
                                <td>{{$result->user->name}}</td>
                        @endif
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>{{isset($id_pilotes[$result->pole]) ? $id_pilotes[$result->pole] : "---"}}</td>
                                <td>{{isset($id_pilotes[$result->position1]) ? $id_pilotes[$result->position1] : "---"}}</td>
                                <td>{{isset($id_pilotes[$result->position2]) ? $id_pilotes[$result->position2] : "---"}}</td>
                                <td>{{isset($id_pilotes[$result->position3]) ? $id_pilotes[$result->position3] : "---"}}</td>
                                <td>{{isset($id_pilotes[$result->position4]) ? $id_pilotes[$result->position4] : "---"}}</td>
                                <td>{{isset($id_pilotes[$result->position5]) ? $id_pilotes[$result->position5] : "---"}}</td>
                                <td>{{isset($id_pilotes[$result->position6]) ? $id_pilotes[$result->position6] : "---"}}</td>
                                <td>{{isset($id_pilotes[$result->position7]) ? $id_pilotes[$result->position7] : "---"}}</td>
                                <td>{{isset($id_pilotes[$result->position8]) ? $id_pilotes[$result->position8] : "---"}}</td>
                                <td>{{isset($id_pilotes[$result->position9]) ? $id_pilotes[$result->position9] : "---"}}</td>
                                <td>{{isset($id_pilotes[$result->position10]) ? $id_pilotes[$result->position10] : "---"}}</td>

                            </tr>

                            @if($result->type != "result")
                                @if ($result->user->id == \Auth::user()->id)
                                    <tr class="alert alert-info">
                                @else
                                    <tr>
                                @endif
                                        <td></td>
                                        <td></td>
                                        <td>{{isset($result->point) ? $result->point->total : ""}}</td>
                                        <td>{{isset($result->point) ? $result->point->podium : ""}}</td>
                                        <td>{{isset($result->point) ? $result->point->diumpo : ""}}</td>
                                        <td>{{isset($result->point) ? $result->point->duo : ""}}</td>
                                        <td>{{isset($result->point) ? $result->point->udo : ""}}</td>
                                        <td>{{isset($result->point) ? $result->point->vainq : ""}}</td>
                                        <td>{{isset($result->point) ? $result->point->pole : ""}}</td>
                                        @for ($i = 1; $i <= 10; $i++)
                                            <td>{{isset($result->point) ? $result->point->{"position" .  $i} : "" }}</td>
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
