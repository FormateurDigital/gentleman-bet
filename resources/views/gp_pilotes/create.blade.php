@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Select your pilote</div>
                    <div class="panel-body">
                        {{ Form::open(['url' => action('Gp_PiloteController@store'), 'method' => 'POST', 'files' => true]) }}
                        {{ csrf_field() }}
                        <h2>
                                Selection des Pilotes
                        </h2>

                        <input type="hidden" id="season" name="season" value="{{$season}}">

                        @for ($i = 1; $i < 9; $i++)
                            <div class="form-group{{ $errors->has('pilote'.$i) ? ' has-error' : '' }}">
                                <label for="{{'pilote'.$i}}" class="col-md-4 control-label">{{'Pilote'.$i}}</label>

                                <div class="col-md-6">
                                    <select id="{{'pilote'.$i}}" type="text" class="form-control" name="{{'pilote'.$i}}" value="{{ old('pilote'.$i) }}" required >
                                        @forelse($pilotes as $pilote)
                                            <option name="{{'pilote'.$i}}" value="{{$pilote->id}}">
                                                {{$pilote->name}}
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
                            <div class="col-md-6 col-md-offset-4">
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
@endsection
