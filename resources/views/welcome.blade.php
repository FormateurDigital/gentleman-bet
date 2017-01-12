<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>f1-gentleman-bet</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{URL::asset('css/app.css')}}"/>

    </head>
    <body>
        <div class="flex-center position-ref full-height">

            @if (!Auth::user())
                <div class="top-right links">
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                </div>
            @else
                <div class="top-right links">
                    <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout </a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            @endif

            <div class="content">
                <h1>
                    <div class="title m-b-md">
                        F1-Gentleman-bet
                    </div>
                </h1>

                @if (Auth::user() && Auth::user()->role == 'admin')
                    <div class="links">
                        <a href="{{action('SeasonsController@create')}}">Create Season</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                    </div>
                @endif

            </div>
        </div>
    </body>
</html>
