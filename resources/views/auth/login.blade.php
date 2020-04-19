@extends('layouts.app')

@section('content')
    <div class="container mt-5">

        <div class="row">
            <div class="col-lg-6 mt-3">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="alert text-right alert-info" role="alert">
                            <a href="#" class="close position-absolute d-block" style="top: -2px;right: 10px" data-dismiss="alert" aria-label="close">×</a>
                            {{__('layout.note')}}
                        </div>
                        <h5 class="text-center mb-4 mt-2">{{__('layout.login')}}</h5>

                        <div class="form-group">
                            <input type="iug_id" name="iug_id" class="form-control" placeholder="{{__('layout.email_or_iug_id')}}"  style="border-radius: 20px"/>
                        </div>
                        <div class="input-group mt-3">
                            <input type="password" name="password" class="form-control" placeholder="{{__('layout.password')}}" style="border-radius: 20px"/>
                        </div>
                        <div class="checkbox d-flex mt-3 justify-content-between">
                            <label><input class="ml-2" type="checkbox" value="">{{__('layout.remember_me')}}</label>
                            <a href="#">{{__('layout.forget_password')}}</a>

                        </div>
                        @if(Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{Session::get('error')}}
                        </div>
                        @endif
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary m-2 mt-3" style="border-radius: 20px">{{__('layout.login')}}</button>
                        </div>
                        <div class="d-flex flex-column">
                            <div class="d-flex flex-column align-items-center">
                                <p>{{__('layout.you_can_use')}}</p>
                                <div>
                                    <a class="ml-2 h2" href="{{route('oAuth' , ['provider' => 'facebook'])}}"><i class="fab fa-facebook"></i></a>
                                    <a class="h2 text-danger" href="{{route('oAuth' , ['provider' => 'google'])}}"><i class="fab fa-google-plus-g"></i></a>
                                </div>
                            </div>
                            <span class="d-flex justify-content-center">{{__('layout.i_dont_have_account')}}<a class="mr-2" href="{{route('register')}}">{{__('layout.register_new_account')}}</a></span>
                        </div>
                    </form>
                </div>
            </div>

            <div class="d-none d-lg-block col-lg-6 mb-4" align="end">
                <img src="{{asset('img/public/84609203_186534342643386_6058639824477224960_n.png')}}"  height="400px">
            </div>
        </div>
    </div>
@endsection
