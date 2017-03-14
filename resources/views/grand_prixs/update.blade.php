@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 panel">
                <div class="panel-default">
                    <div class="panel-heading">Ajouter des Grands Prix</div>
                </div>
                    <div class="panel-body">
                        {{ Form::open(['url' => action('GrandPrixController@update', ["id" => $gp->id]), 'method' => 'POST', 'files' => true]) }}
                        {{ csrf_field() }}

                        <input id="season" type="hidden" class="form-control" name="season" value="{{ $gp->season }}">

                        <h3>
                            Modification de Grand Prix
                        </h3>
                        <div class="form-horizontal">
                        <div class="form-group row{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-3 control-label">Nom</label>

                            <div class="col-md-9">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $gp->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row{{ $errors->has('avatar') ? ' has-error' : '' }}">
                            <label for="avatar" class="col-md-3 control-label">Drapeau</label>

                            <div class="col-md-9">
                                <?= Form::file('avatar') ?>

                                @if ($errors->has('avatar'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row{{ $errors->has('date') ? ' has-error' : '' }}">
                            <label for="date" class="col-md-3 control-label">Date</label>

                            <div class="col-md-9">
                                <input id="date" type="text" class="form-control" name="date" value="{{ $gp->date }}" required >

                                @if ($errors->has('date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row{{ $errors->has('info1') ? ' has-error' : '' }}">
                            <label for="info1" class="col-md-3 control-label">Info circuit 1</label>

                            <div class="col-md-9">
                                <input id="info1" type="text" class="form-control" name="info1" value="{{$gp->info1}}" required >

                                @if ($errors->has('info1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('info1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row{{ $errors->has('info2') ? ' has-error' : '' }}">
                            <label for="info2" class="col-md-3 control-label">Info circuit 2</label>

                            <div class="col-md-9">
                                <input id="info2" type="text" class="form-control" name="info2" value="{{$gp->info2}}" required >

                                @if ($errors->has('info2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('info2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row{{ $errors->has('info3') ? ' has-error' : '' }}">
                            <label for="info3" class="col-md-3 control-label">Info circuit 3</label>

                            <div class="col-md-9">
                                <input id="info3" type="text" class="form-control" name="info3" value="{{$gp->info3}}" required >

                                @if ($errors->has('info3'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('info3') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row{{ $errors->has('info4') ? ' has-error' : '' }}">
                            <label for="info4" class="col-md-3 control-label">Info circuit 4</label>

                            <div class="col-md-9">
                                <input id="info4" type="text" class="form-control" name="info4" value="{{$gp->info4}}" required >

                                @if ($errors->has('info4'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('info4') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-9 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Ajouter le Grand Prix
                                </button>
                            </div>
                        </div>
                    </div>

                    {{ Form::close() }}
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
