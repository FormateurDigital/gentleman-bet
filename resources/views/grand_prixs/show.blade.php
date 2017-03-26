@extends('layouts.app')

@section('content')
    <div class="container gp-show">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1 class="gp_h1">
                    <a href="{{action('GrandPrixController@show', ['id' => $gp->id])}}">
                        <img src="{{$gp->flag()}}">
                    </a>
                    {{ $gp->name }}
                    <span class="little">
                        - {{ $date }}
                    </span>
                    @if (\Auth::user()->role == "admin")
                        <div class="pull-right">
                            <a href="{{action("GrandPrixController@updateRedirect", ["id" => $gp->id])}}" class="btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;
                            <a href="{{action("GrandPrixController@destroy", ["id" => $gp->id])}}" class="btn btn-danger" onclick="return confirm('Etes-vous sûr ?');"><i class="fa fa-trash" aria-hidden="true"></i></a>&nbsp;
                        </div>
                    @endif
                </h1>
                <h2 id="timer" data-lastDay="{{$last}}" class="gp_h2">
                    <input id="betTime" type="hidden" value="{{$gp->betTime()->format('Y/m/d')}}">
                </h2>
                <hr>
                <h3>Circuit</h3>
                <ul class="list-circuits text-center" style="list-style-type:none;">
                    <li>{{$gp->info1}}</li>
                    <li>{{$gp->info2}}</li>
                    <li>{{$gp->info3}}</li>
                    <li>{{$gp->info4}}</li>
                </ul>
                @if (!$gp->betable())
                    <hr>
                    <h3><a href="{{action('ResultsController@show', ['gp'=> $gp->id])}}">Pronos & Résultats</a></h3>
                @endif
                <hr>
                    <h3>Mes Pronos
                        @if (Auth::user()->role == "admin")
                           - <a href="{{action('GrandPrixController@updatePilotes', ['gp' => $gp->id])}}"> Modifier les Pilotes </a>
                        @endif
                    </h3><br/>
                @if (isset($resultErrors))
                    <div class="alert alert-danger">
                        {{$resultErrors}}
                    </div>
                @elseif (isset($validation))
                    <div class="alert alert-success">
                        {{$validation}}
                    </div>
                @endif
                {{ Form::open(['url' => action('ResultsController@bet', ['user' => \Auth::user()->id,'gp' => $gp->id]), 'method' => 'POST']) }}
                {{ csrf_field() }}
                <div class="row form-horizontal form-group{{ $errors->has('pole') ? ' has-error' : '' }}">
                    <label for="pole" class="col-md-5 control-label">Pole position</label>

                    <div class="col-md-2">
                        <input name="check" type="hidden" value="{{\Auth::user()->role == "admin" && !$gp->betable() ? "false" : "true"}}">
                        <select {{ ($gp->betable() || \Auth::user()->role == "admin") ?  " " : "disabled"}} id="pole" type="text" class="form-control" name="pole" data-selected="{{isset($input) ? $input["pole"] : ""}}" required >
                            @forelse($gp->pilotes as $pilote)
                                <option name="pole" value="{{$pilote->id}}" data-stable="{{$pilote->stable->name}}" data-name="{{$pilote->name  }}">
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
                    <div id="text-pole" class="col-md-4 text-center">
                    </div>
                <br><br>
                </div>
            @for($i = 1; $i <= 10; $i++)
                    <div class="row row-pilote form-horizontal form-group{{ $errors->has('position'.$i) ? ' has-error' : '' }}">
                        <label for="{{'position'.$i}}" class="col-md-5 control-label">{{$i}}</label>
                            <div class="col-md-2">
                            <select {{ ($gp->betable() || \Auth::user()->role == "admin") ?  " " : "disabled"}} id="{{'position'.$i}}" type="text" class="form-control" name="{{'position'.$i}}" value="{{ old('position'.$i) }}" data-old="0" data-selected="{{isset($input) ? $input["position" . $i] : ""}}" required >
                                @forelse($gp->pilotes as $pilote)
                                    <option name="{{'pilote'.$i}}" value="{{$pilote->id}}" data-stable="{{$pilote->stable->name}}" data-name="{{$pilote->name  }}">
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
                        <div id="text-{{'position'.$i}}" class="col-md-4 text-center">
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
                                 Rentrer le classement
                            </button>
                        </div>
                    </div>
                    <br>
                    <br>
                @endif
                {{ Form::close() }}
            </div>
        </div>
    </div>

    <script>
        //TImer
        var betTime = $('#betTime').val();
        $('#timer').countdown(betTime, function(event) {
            if ($('#timer').data('lastday')) {
                $('#timer').text("Dernier Jour !");
            }
            else
                $(this).html(event.strftime('Fin des pronos dans : %D jours'));
        });

        //Block the already selected option
        if ($("input[name='check']").val() == "true") {
            elems = $("select").not("#pole");
        }

        $.each(elems, function (id, item) {
            //
            $.each(item.children, function (index, child) {
                if (item.dataset.selected == "")
                    $(item).prop("selectedIndex", -1);
                else if (child.value == item.dataset.selected) {
                    $(item).prop("selectedIndex", index);
                    $(item).attr("data-old", $(child).val());
                }
            });
            //
            if (item.value != "") {
                var position = item.id;
                var option = $('option[value=' + item.value + ']').first();
                $("#text-" + position).html("(" + option[0].dataset.stable + ") - " + option[0].dataset.name);

                $.each(elems.not($(item)), function (index, elem) {
                    $("select[name=" + elem.name + "] option[value=" + item.value + "]").attr("disabled", "disabled");
                })
            }
        });

        //On change, block the selected value in other field, display name and clear previous value
        elems.change(function () {
            $("option[value=" + $(this)[0].dataset.old + "]").removeAttr("disabled");
            $(this)[0].dataset.old = $(this).val();
            val = $(this).val();
            $.each(elems.not($(this)), function (index, item){
                $("select[name=" + item.name + "] option[value=" + val + "]").attr("disabled", "disabled");
            });
            var position = $(this).attr("id");
            var option = $(this).find("option[value=" + $(this).val() + "]");
            $("#text-" + position).html("(" + option[0].dataset.stable +  ") - " + option[0].dataset.name);
        })
    </script>
@endsection
