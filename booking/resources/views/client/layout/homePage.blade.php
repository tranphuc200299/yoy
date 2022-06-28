<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/homePage.css') }}" rel="stylesheet">
    <title>modal</title>
</head>
<body>
<div class="header">
    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="logo">
                    <img src="./images/logo.png">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-xs-3">
                <div class="title-right float-lg-right">
                    <h3>Home Page</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content-about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @yield('content')
            </div>
        </div>
    </div>
</div>

<script src="{{ URL::asset('js/jquery.min.js')}}"></script>
<script src="{{ URL::asset('js/toastr.min.js')}}"></script>
<script src="{{ URL::asset('js/popper.min.js')}}"></script>
<script src="{{ URL::asset('js/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('js/moment.min.js') }}"></script>
<script src="{{ URL::asset('js/datetimepicker.min.js') }}"></script>
<script src="{{ URL::asset('js/wow.min.js')}}"></script>
<script src="{{ URL::asset('js/main.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/jquery.validate.min.js" integrity="sha512-FOhq9HThdn7ltbK8abmGn60A/EMtEzIzv1rvuh+DqzJtSGq8BRdEN0U+j0iKEIffiw/yEtVuladk6rsG4X6Uqg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@stack('scripts')
<script src="{{ URL::asset('js/homePage.js')}}"></script>
</body>
</html>