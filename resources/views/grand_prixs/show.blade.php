@extends('layouts.app')

@section('content')
    <div class="container gp-show">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1 class="gp_h1"><img src="{{$gp->avatar->url()}}"> {{ $gp->name }} <span class="little">- {{ $gp->date }}</span></h1>
                <h2 id="timer" class="gp_h2">
                    <input id="betTime" type="hidden" value="{{$gp->betTime()->format('Y/m/d h:m:s')}}">
                </h2>
                <hr>
                <h3>Circuits</h3>
                <ol class="list-circuits">
                    <li>{{$gp->info1}}</li>
                    <li>{{$gp->info2}}</li>
                    <li>{{$gp->info3}}</li>
                    <li>{{$gp->info4}}</li>
                </ol>
                @if (!$gp->betable())
                    <hr>
                    <h3><a href="{{action('ResultsController@show', ['gp'=> $gp->id])}}">Pronos & Resultats</a></h3>
                @endif
                <hr>
                <h3>Mes Pronos</h3><br>
                {{ Form::open(['url' => action('ResultsController@bet', ['user' => \Auth::user()->id,'gp' => $gp->id]), 'method' => 'POST']) }}
                {{ csrf_field() }}

                <div class="row form-horizontal form-group{{ $errors->has('pole') ? ' has-error' : '' }}">
                    <label for="pole" class="col-md-5 control-label">Pole position</label>

                    <div class="col-md-2">
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
                <br><br>
                </div>

                @for($i = 1; $i <= 10; $i++)
                    <div class="row row-pilote form-horizontal form-group{{ $errors->has('position'.$i) ? ' has-error' : '' }}">
                        <label for="{{'position'.$i}}" class="col-md-5 control-label">{{$i}}</label>

                        <div class="col-md-2">
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
                    <br>
                    <input name="type" type="hidden" value="bet">

                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-5">
                            <button type="submit" class="btn btn-primary">
                                Valider
                            </button>
                        </div>
                    </div>
                    <br><br>
                @elseif(\Auth::user()->role == 'admin')
                    <br>
                    <input name="type" type="hidden" value="result">

                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-5">
                            <button type="submit" class="btn btn-primary">
                                Rentrer le Resultat
                            </button>
                        </div>
                    </div>
                    <br>
                    <br>
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
