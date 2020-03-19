@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <form>
        <div class="input-group d-flex justify-content-center">
            <input class="form-control col-6" placeholder="ابحث عن التصنيف">
            <button type="submit" class="btn btn-outline-info mr-2"><i class="fas fa-search"></i></button>
            <a href="#" class="btn btn-outline-info mr-2">عرض التصنيفات</a>
        </div>
    </form>
    <div class="d-flex justify-content-center mt-3">{{ $library->links() }}</div>

    <div class="row mx-md-n4">
@foreach($library as $lib)
        <div class="col-md-4 mt-lg-2 px-md-2 mt-2"><div class="p-4 bg-white text-center" style="border-radius: 10px">
                <strong class="mb-2" style="border-bottom: 2px solid green">{{$lib->name}}</strong>
                <p class="mt-3">عدد الكتب المتاحة 302</p>
                <p class="text-danger">عدد الكتب المحجوزة 30</p>
                <a href="/books.html" class="d-block mt-2">عرض الكتب المتاحة</a>
            </div>
        </div>
@endforeach
       </div>
</div>
@endsection
