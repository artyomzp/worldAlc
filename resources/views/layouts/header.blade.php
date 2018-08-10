<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="/slick/slick-theme.css"/>
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    
</head>
<body>
    <div id="app">
            <div class="jumbotron">
            <h1>WORLD ALCOHOL</h1> 
            <p> Best of the Best</p>
            {!! Form::open(array('action'=>'SearchController@search','class'=>'form')) !!}
                <div class="input-group search">
                {!! Form::text('searchform', '', array('class'=>'form-control',
                'placeholder'=>'Enter name of goods'))!!}
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                    <i class="fas fa-search"></i>
                    </button>
                </div>
            {!! Form::close() !!}
                </div>
            </div>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
            </button>
            
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><a href="{{url('/category/wine')}}">Вино</a></li>
                <li><a href="{{url('/category/gin')}}">Джин</a></li>
                <li><a href="{{url('/category/konyak')}}">Коньяк</a></li>
                <li><a href="{{url('/category/whisky')}}">Виски</a></li>
                <li><a href="{{url('/category/rum')}}">Ром</a></li>
                <li><a href="{{url('/home/about')}}">О нас</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#" data-toggle="modal" data-target="#cart"><i class="fas fa-shopping-cart"></i> Корзина</a></li>
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->firstname }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/logout') }}"onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout
                                </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
      </ul>
    </div>
  </div>
</nav>