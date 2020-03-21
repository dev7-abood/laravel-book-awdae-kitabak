<!doctype html>
<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-head/>
<x-style/>
<body>
<main>

    <div id="app">
        <app-component :src_logo="'{{asset('img/logo/logo_white.png')}}'" :src_add_book="'{{asset('img/add_book.png')}}'"/>
    </div>

</main>
</body>
</html>
