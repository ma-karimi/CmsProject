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
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>
    </nav>

    <main class="py-4 col-md-12">
        <div class="d-flex flex-row">
            <div class="container-fluid text-center col-md-2 ">
                <div class=" sidenav border pt-4 d-flex flex-column">
                    <h3>پـنل مـدیریـت</h3>
                    <img src="https://uupload.ir/files/h23g_richscorer_small.png" alt="">
                    <a class="m-3" href="{{route('admin.dashboard')}}">پـنل مـدیریـت</a>
                    <a class="m-3" href="{{route('users.index')}}">کـاربران</a>
                    <a class="m-3" href="{{route('posts.index')}}">پـســت ها</a>
                    <a class="m-3" href="{{route('tags.index')}}">تــگ ها</a>
                    <a class="m-3" href="{{route('categories.index')}}">دسـتــه بنـدی ها</a>

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
