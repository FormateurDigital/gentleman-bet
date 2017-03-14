@extends('layouts.app')

@section('content')
    <script type="text/javascript" src="{{asset('js/checkBox.js')}}"></script>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Sélectionner les pilotes</div>
                    <div class="panel-body form-horizontal">
                        <div class="pull-right">
                            <button onclick="checkAll(true)" class="btn btn-primary">Check All</button>
                            <br/>
                            <br/>
                            <button onclick="checkAll(false)" class="btn btn-warning">Uncheck All</button>

                        </div>
                        {{ Form::open(['url' => action('Gp_PiloteController@store'), 'method' => 'POST', 'files' => true]) }}
                        {{ csrf_field() }}

                        <input type="hidden" id="season" name="season" value="{{$season}}">

                        <h2 class="col-md-offset-3">Pilotes :</h2>

                        <div class="form-group{{ $errors->has('pilote') ? ' has-error' : '' }} col-pilote">
                                <div class="col-md-9">
                                    @forelse($pilotes as $pilote)
                                        <div class=" col-md-offset-5">
                                        <input type="checkbox" name="{{'pilote' . (string)($loop->index + 1)}}" value="{{$pilote->id}}" id="{{'pilote' . (string)($loop->index + 1)}}">
                                        <label for="{{'pilote' . (string)($loop->index + 1)}}">{{$pilote->name . " - (" . $pilote->stable->name . ")"}}</label>
                                        </div>
                                            @if ($loop->last)
                                                <input type="hidden" id="numbers" name="numbers" value="{{$loop->count}}">
                                            @endif
                                        @empty
                                        Vous n'avez aucun PILOTE !
                                    @endforelse
                                </div>
                            </div>
                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

    </script>

@endsection
