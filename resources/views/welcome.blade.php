<!doctype html>
<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-head/>
<x-style/>
<style>
    .container{
        z-index: 10;
        position: relative;
        bottom: 120px;
    }
    /*#home-img{*/
    /*    position: relative;*/
    /*    display: block;*/
    /*    top: -80px;*/
    /*    z-index: 5;*/
    /*}*/
</style>
<head>
<x-navbar/>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
<body>

<img id="home-img" width="100%" height="450vw" src="{{asset('img/imgslader/bench-blur-books-color-459791.jpg')}}">

<div class="container">
    <div class="row text-center d-flex justify-content-center text-white">
        <div style="background-color: #FFA500"  class="col-lg-3 mt-3 mr-3 ml-3">s</div>
        <div style="background-color: #009988"  class="col-lg-3 mt-3 mr-3 ml-3">s</div>
        <div style="background-color: #C14000"  class="col-lg-3 mt-3 mr-3 ml-3">s</div>
    </div>
</div>


<x-footer/>
<script src="{{'/js/main_script/navbar.js'}}"></script>
</body>
</html>
