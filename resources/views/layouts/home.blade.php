<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Cms Project</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body {
            direction: rtl;
            text-align: right;
        }
    </style>
</head>
<body class="bg bg-info">
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-info shadow-sm">
        <div class="container">
            <div>
                <a href="{{ route('login') }}" class="mx-1 text-sm text-darkbtn btn btn-outline-dark">Login</a>
                <a href="{{ route('register') }}" class="mx-1 text-sm text-dark btn btn-outline-dark">Register</a>
                <a href="{{ route('/') }}" class="mx-1 text-sm text-dark btn btn-outline-dark">Home</a>
            </div>
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>
    </nav>

    <main class="py-4 col-md-12">
        <div class="d-flex flex-row">
            <div class="container-fluid text-center col-md-3">
                <div class="card">
                    <div class="card-header d-flex flex-row align-items-center justify-content-between">
                        {{ __('مدیـریت جستـجو') }}
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <label class="d-flex justify-content-between" for="categories">
                                {{ __('تــگ:') }} {{count($tags)}}
                            </label>
                            <select class="form-control" id="categories">
                                @foreach($tags as $tag)
                                    <option value="">
                                        <a class="dropdown-item" href="#">{{$tag->title}}</a>
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="d-flex justify-content-between" for="categories">
                                {{ __('دسـته بنـدی:') }} {{count($categories)}}
                            </label>
                            <select class="form-control" id="categories">
                                @foreach($categories as $category)
                                    <option value="">
                                        <a class="dropdown-item" href="#">{{$category->title}}</a>
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <hr>
                        <hr>

                        <div class="d-flex flex-row  align-items-center justify-content-between">
                            <a class="btn btn-light mx-3" href="{{route('categories')}}">{{ __('دسـته بنـدی') }}</a>
                            <a class="btn btn-light mx-3" href="{{route('tags')}}">{{ __('تــگ') }}</a>
                        </div>

                    </div>
                </div>
            </div>
            @yield('content')
        </div>
    </main>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
@yield('script')
</body>
</html>
