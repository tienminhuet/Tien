<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="{{asset('')}}">
    <title>{{ config('app.name', 'Clustering go together') }}</title>
    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .current-tab {
            background-color: #4aa0e6;
            color: #ffffff !important;
            border-radius: 5px;
        }

        .text-tab {
            font-weight: bold;
        }

        #map {
            position: unset;
            height: 600px; /* The height is 400 pixels */
            width: 100%; /* The width is the width of the web page */
        }

        .coordinate {
            font-size: 1.3em;
        }

        .collapse-content {
            border: 1px solid #000000;
        }

        input {
            border: 1px solid #000 !important;
        }

        .modal-content {
            width: 600px;
        }

        .modal-selectRole {
            background-color: #fff;
        }

        .route {
            overflow: auto;
            height: 300px;
        }

        #style-3::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            background-color: #F5F5F5;
        }

        #style-3::-webkit-scrollbar {
            width: 4px;
            background-color: #F5F5F5;
        }

        #style-3::-webkit-scrollbar-thumb {
            background-color: #343a40;
        }

        .float-select {
            width: 18rem;
            margin-left: 0.5rem;
            margin-top: 15px;
            cursor: pointer;
            pointer-events: auto;
            border: 1px solid #000;
            text-align: center;
            -webkit-transition: margin 0.5s ease-out;
            -moz-transition: margin 0.5s ease-out;
            -o-transition: margin 0.5s ease-out;
        }

        #carTitle {
            padding-left: 15px;
        }

        #timeTitle {
            padding-left: 15px;
        }


         .carousel-inner img {
             width: 500px;
             height: 275px;
         }

    </style>
</head>
<body>

<div id="app">

    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        @if (Auth::user() && Auth::user()->super_user != 1)
            {{--            <a class="navbar-brand" href="{{ url('/home') }}">--}}
            {{--                {{ config('app.name', 'Laravel') }}--}}
            {{--            </a>--}}
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class=" row collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
            <div class="row">
                <ul class="navbar-nav mr-auto" style="
                    padding-top: 150px;">
                    {{--                    <img src="{{ asset('images/uetshare.png') }}" class="img align-items-md-baseline"  width="150" height="120px" alt="...">--}}
                    <li class="nav-item"  >
                        <a style="width: 90px; margin-top: 25px; margin-left: 30px"  id="home" class="nav-link text-tab" href="{{ route('home') }}">Trang Chủ</a>
                    </li>
                    <li class="nav-item">
                        <a style="width: 140px; margin-top: 25px; margin-left: 20px" id="profile" class="nav-link text-tab" href="{{ route('profile') }}">Thông tin cá nhân</a>
                    </li>

                </ul>
            </div>

                @elseif (Auth::user() && Auth::user()->super_user == 1)
                    <ul class="navbar-nav mr-auto">

                        <li class="nav-item">
                            <a id="userList" class="nav-link text-tab" href="{{ 'admin/user' }}">Danh sách người dùng</a>
                        </li>
                        <li class="nav-item">
                            <a id="groupList" class="nav-link text-tab" href="{{ 'admin/group' }}">Danh sách nhóm</a>
                        </li>
                    </ul>
            @endif
            <!-- Right Side Of Navbar -->
              <img src="{{ asset('images/uetshare.png') }}" class=""  width="150" height="120px" alt="...">
                    <h2 style="margin-left: 40px"><b >Hệ thống đi chung xe</b></h2>

                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->

                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Đăng nhập') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Đăng ký') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div style="border-color: #4aa0e6" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}">
                                    {{ __('Đăng Xuất') }}
                                </a>


                            </div>
                        </li>
                    @endguest
                </ul>
            </div>

    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script type="text/javascript">
    var $j = jQuery.noConflict();
    $j(document).ready(function() {
        $j('#dateRange').daterangepicker({
            locale: {
                format: 'DD/MM/Y'
            }
        })
    })
</script>
<script>
    let url = document.URL.split("/")[3]
    let tab = url.includes('admin') ? document.URL.split("/")[4] + 'List' : url
    let el = document.getElementById(tab);
    el.classList.add("current-tab")
</script>
</body>
</html>
