@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body form-horizontal">
                    {{ Form::open(['url' => action('PilotesController@store'), 'method' => 'POST', 'files' => true]) }}
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('acronym') ? ' has-error' : '' }}">
                            <label for="acronym" class="col-md-4 control-label">Acronym</label>

                            <div class="col-md-6">
                                <input id="acronym" type="text" class="form-control" name="acronym" value="{{ old('acronym') }}" required >

                                @if ($errors->has('acronym'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('acronym') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('stable') ? ' has-error' : '' }}">
                            <label for="stable" class="col-md-4 control-label">Acronym</label>

                            <div class="col-md-6">
                                <select class="form-control" name="stable">
                                    @forelse($stables as $stable)
                                        <option value="{{$stable->id}}">{{$stable->name}}</option>
                                    @empty
                                        <div class="alert alert-danger">
                                            NO STABLE
                                        </div>
                                    @endforelse
                                </select>
                                @if ($errors->has('stable'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('stalbe') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                            <label for="avatar" class="col-md-4 control-label">Avatar</label>

                            <div class="col-md-6">
                                <?= Form::file('avatar') ?>

                                @if ($errors->has('avatar'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

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
