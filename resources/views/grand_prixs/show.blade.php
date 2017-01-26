@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div>
                    <img src="{{$gp->flag()}}">
                </div>
                <div>
                    {{$gp->date}}
                </div>
                <br/>
                <div>
                    <ul>
                        <li>
                            {{$gp->info1}}
                        </li>
                        <li>
                            {{$gp->info2}}
                        </li>
                        <li>
                            {{$gp->info3}}
                        </li>
                        <li>
                            {{$gp->info4}}
                        </li>
                    </ul>
                </div>
                <div id="timer">
                    <input id="betTime" type="hidden" value="{{$gp->betTime()->format('Y/m/d h:m:s')}}">
                </div>
                @if (!$gp->betable())
                    <a href="#">Pronos & Resultats</a>
                @endif
                <h1>Mes Pronos</h1>
                {{ Form::open(['url' => action('ResultsController@bet', ['user' => \Auth::user()->id,'gp' => $gp->id]), 'method' => 'POST']) }}
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('pole') ? ' has-error' : '' }}">
                    <label for="pole" class="col-md-4 control-label">Pole</label>

                    <div class="col-md-6">
                        <select id="pole" type="text" class="form-control" name="pole" required >
                            @forelse($gp->pilotes as $pilote)
                                <option name="pole" value="{{$pilote->id}}">
                                    {{$pilote->acronym}}
                                </option>
                            @empty
                                Il n'a aucun PILOTE sur cette course!
                            @endforelse
                        </select>
                        @if ($errors->has('pole'))
                            <span class="help-block">
                                <strong>{{ $errors->first('pole') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                @for($i = 1; $i <= 10; $i++)
                    <div class="form-group{{ $errors->has('position'.$i) ? ' has-error' : '' }}">
                        <label for="{{'position'.$i}}" class="col-md-4 control-label">{{$i}}</label>

                        <div class="col-md-6">
                            <select id="{{'position'.$i}}" type="text" class="form-control" name="{{'position'.$i}}" value="{{ old('position'.$i) }}" required >
                                @forelse($gp->pilotes as $pilote)
                                    <option name="{{'pilote'.$i}}" value="{{$pilote->id}}">
                                        {{$pilote->acronym}}
                                    </option>
                                @empty
                                    Il n'a aucun PILOTE sur cette course!
                                @endforelse
                            </select>
                            @if ($errors->has('position'.$i))
                                <span class="help-block">
                                            <strong>{{ $errors->first('position'.$i) }}</strong>
                                        </span>
                            @endif
                        </div>
                    </div>
                @endfor
                @if ($gp->betable())

                    <input name="type" type="hidden" value="bet">

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Valider
                            </button>
                        </div>
                    </div>

                @elseif(\Auth::user()->role == 'admin')

                    <input name="type" type="hidden" value="result">

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Rentrer le Resultat
                            </button>
                        </div>
                    </div>

                @endif
                {{ Form::close() }}
                @if(isset($result_errors))
                    <div>
                        {{$result_errors}}
                    </div>
                @endif
                @if(isset($validation))
                    <div>
                        {{$validation}}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        var betTime = $('#betTime').val();
        console.log(betTime);
        $('#timer').countdown(betTime, function(event) {
            $(this).html(event.strftime('%D jours %Hh:%Mm:%Ss'));
        });
    </script>
@endsection
