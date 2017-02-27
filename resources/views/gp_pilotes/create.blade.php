@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Sélectionner les pilotes</div>
                    <div class="panel-body form-horizontal">
                        {{ Form::open(['url' => action('Gp_PiloteController@store'), 'method' => 'POST', 'files' => true]) }}
                        {{ csrf_field() }}

                        <input type="hidden" id="season" name="season" value="{{$season}}">

                        @for ($i = 1; $i <= 10; $i++)
                            <div class="form-group{{ $errors->has('pilote'.$i) ? ' has-error' : '' }} col-pilote">
                                <label for="{{'pilote'.$i}}" class="col-md-3 control-label">{{'Pilote '.$i}}</label>

                                <div class="col-md-9">
                                    <select id="{{'pilote'.$i}}" type="text" class="form-control" name="{{'pilote'.$i}}" value="{{ old('pilote'.$i) }}" required >
                                        @forelse($pilotes as $pilote)
                                            <option name="{{'pilote'.$i}}" value="{{$pilote->id}}">
                                                {{$pilote->name . " - (" . $pilote->stable->name . ")"}}
                                            </option>
                                        @empty
                                            Vous n'avez aucun PILOTE !
                                        @endforelse
                                    </select>
                                    @if ($errors->has('pilote'.$i))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('pilote'.$i) }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endfor

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
