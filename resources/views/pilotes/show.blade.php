@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Pilotes</th>
                        <th>Trigrammes</th>
                        <th>Ecuries</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($pilotes as $pilote)
                            <tr>
                                <td>
                                    <img style="height: 30px" src="{{'/' . $pilote->avatar()}}">&nbsp;&nbsp;&nbsp;&nbsp;{{$pilote->name}}
                                </td>
                                <td>
                                    {{$pilote->acronym}}
                                </td>
                                <td>
                                    {{$pilote->stable->name}}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                Aucun Pilotes !
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
