<!doctype html>
<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-head/>
<x-style/>
<body>
<x-navbar/>
<main>
@yield('content')
</main>
<x-footer/>

<script src="{{'/js/main_script/navbar.js'}}"></script>
@yield('script')
</body>
</html>
