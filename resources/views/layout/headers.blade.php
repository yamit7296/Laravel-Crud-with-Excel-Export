<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/datatables.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/regular.css') }}">
</head>

<body>
    <!-- <div class="container bg-light"> -->
    <!-- <header>
            <div class="container bg-info">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="#" class="nav-link px-2 link-dark">Home</a></li>
                        <li><a href="#" class="nav-link px-2 link-dark">About</a></li>
                        <li><a href="#" class="nav-link px-2 link-dark">Contact</a></li>
                    </ul>
                </div>
            </div>
        </header> -->
    <div class="container">
        @yield('main')
    </div>
    <!-- @include('layout.footers') -->
    <!-- </div> -->

    </div>

</body>

</html>
<script src="{{ URL::asset('js/jquery-3.6.0.min.js' )}}" defer></script>
<script src="{{ URL::asset('js/jquery-ui.js')}}" defer></script>
<script src="{{ URL::asset('js/datatables.min.js' )}}" defer></script>
<script src="{{ URL::asset('js/bootstrap.min.js' )}}" defer></script>
<script src="{{ URL::asset('js/regular.js' )}}" defer></script>