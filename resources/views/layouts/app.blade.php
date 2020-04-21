<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{--Facebook Meta--}}
    <meta property="og:url" content="@yield('facebook-url')" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('facebook-title')" />
    <meta property="og:description" content="@yield('facebook-description')" />
    <meta property="og:image" content="@yield('facebook-image')" />
    <meta property="og:image:alt" content="@yield('facebook-image-alt')"/>
    <meta property="og:image:width" content="600"/>
    <meta property="og:image:height" content="600"/>
    <meta property="og:site_name" content="Skill Jobs Training Portal">

    {{--Twitter Meta--}}
    <meta name="twitter:title" content="@yield('twitter-title')">
    <meta name="twitter:description" content="@yield('twitter-description')">
    <meta name="twitter:image" content="@yield('twitter-image')">
    <meta name="twitter:image:alt" content="@yield('twitter-image-alt')">
    <meta name="twitter:card" content="summary_large_image">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">



    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @stack('scripts')
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        #main{
            padding-top: 55px;
        }
    </style>
    
    @stack('style')
    
        <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-120085781-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-120085781-3');
</script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-light bg-light navbar-expand-md fixed-top navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-th"></i>  Categories
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @php
                                    use App\Models\Category;$categories = Category::all();
                                @endphp

                                @foreach($categories as $category)
                                    <a class="dropdown-item" href="{{route('courses.category',$category->slug)}}">{{$category->name}}</a>
                                @endforeach
                            </div>
                        </li>
                    </ul>
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('index') }}">{{ __('Home') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('courses') }}">{{ __('Courses') }}</a>
                        </li>
                        {!! \App\Helpers\ConfigHelpers::program() !!}

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact') }}">{{ __('Contact') }}</a>
                        </li>
                         
                        <li class="nav-item">
                            <a class="nav-link" href="https://skill.jobs/">Back to Skill Jobs</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    {{--<ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item pr-md-3">
                                <a class="nav-link btn btn-outline-success" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item ">
                                @if (Route::has('register'))
                                    <a class="nav-link btn btn-outline-info" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>--}}
                </div>
            </div>
        </nav>

        <main id="main">
            @yield('content')
            
            
     <!---start popup---->
    <!---<div id="popup_content_wrap" style='display:none'>
        <div id="popup_content">
            <center>
                
                <img src="{{url('assets/uploads/popup-karona.jpg')}}" alt="Carona">
                 
            </center>
             <input type="submit" name="submit" value="Visit the Site" class="btn btn-primary caruna" onClick="popup_content('hide')" />
        </div>
    </div>---->
     <!---end popup---->

            
            
        </main>
    </div>
     <!---start popup---->
    <style>
        #popup_content_wrap {
width: 100%;
    height: 100%;   
    top: 0;
    left: 0;   
 position: fixed;	
    background: rgba(0, 0, 0, 0.74);
    z-index: 9999999;
}
#popup_content {
    width: 600px;
   height:700px;
    
	 position: relative;
	top: 15%;
    left: 30%;
    background: #1b100ed9;
   
    
}

.caruna:not(:disabled):not(.disabled) {
    cursor: pointer;
    position: absolute;
    top: 0px;
    right: 0px;
    background-color:#8B4522;
    border:0px;
}

    </style>
    <script>
    
          function popup_content(hideOrshow) {
    if (hideOrshow == 'hide') document.getElementById('popup_content_wrap').style.display = "none";
    else document.getElementById('popup_content_wrap').removeAttribute('style');
}
window.onload = function () {
    setTimeout(function () {
        popup_content('show');
    }, 100);
}
    </script>
    <!---end popup---->
    
    
    <script>
(function(h,e,a,t,m,p) {
m=e.createElement(a);m.async=!0;m.src=t;
p=e.getElementsByTagName(a)[0];p.parentNode.insertBefore(m,p);
})(window,document,'script','https://u.heatmap.it/log.js');
</script>


</body>
</html>
