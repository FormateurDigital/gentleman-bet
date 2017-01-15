@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Patern for Grand Prix</div>
                        {{ Form::open(['url' => action('GrandPrixController@store'), 'method' => 'POST', 'files' => true]) }}
                        {{ csrf_field() }}

                    <input id="season" type="hidden" class="form-control" name="season" value="{{ $season }}">

                        <h2>
                            Creation de Grand Prix
                        </h2>

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

                        <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                            <label for="avatar" class="col-md-4 control-label">Flag</label>

                            <div class="col-md-6">
                                <?= Form::file('avatar') ?>

                                @if ($errors->has('avatar'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                            <label for="date" class="col-md-4 control-label">Date</label>

                            <div class="col-md-6">
                                <input id="date" type="text" class="form-control" name="date" value="{{ old('date') }}" required >

                                @if ($errors->has('date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('info1') ? ' has-error' : '' }}">
                            <label for="info1" class="col-md-4 control-label">Info circuit 1</label>

                            <div class="col-md-6">
                                <input id="info1" type="text" class="form-control" name="info1" value="{{ old('info1') }}" required >

                                @if ($errors->has('info1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('info1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('info2') ? ' has-error' : '' }}">
                            <label for="info2" class="col-md-4 control-label">Info circuit 2</label>

                            <div class="col-md-6">
                                <input id="info2" type="text" class="form-control" name="info2" value="{{ old('info2') }}" required >

                                @if ($errors->has('info2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('info2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('info3') ? ' has-error' : '' }}">
                            <label for="info3" class="col-md-4 control-label">Info circuit 3</label>

                            <div class="col-md-6">
                                <input id="info3" type="text" class="form-control" name="info3" value="{{ old('info3') }}" required >

                                @if ($errors->has('info3'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('info3') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('info4') ? ' has-error' : '' }}">
                            <label for="info4" class="col-md-4 control-label">Info circuit 4</label>

                            <div class="col-md-6">
                                <input id="info4" type="text" class="form-control" name="info4" value="{{ old('info4') }}" required >

                                @if ($errors->has('info4'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('info4') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add Event
                                </button>
                            </div>
                        </div>

                        {{ Form::close() }}
                    @if (isset($gp))
                        <div class="col-md-6 col-md-offset-4">
                            <a href="{{action('Gp_PiloteController@create', $gp)}}" class="btn btn-info" role="button">Go to Pilote selection</a>
                        </div>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $( "#date" ).datepicker({
            altField: "#date",
            closeText: 'Fermer',
            prevText: 'Précédent',
            nextText: 'Suivant',
            currentText: 'Aujourd\'hui',
            monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
            monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
            dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
            dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
            dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
            weekHeader: 'Sem.',
            dateFormat: 'yy-mm-dd'
        });
    </script>
@endsection
