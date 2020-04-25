@extends('layouts.app')

@section('content')
<div class="container">

<form method="POST" action="{{ route('register') }}">
@csrf
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6 mt-3">
                <div class="card-body">
                    <h5 class="text-center">{{__('layout.create_new_account')}}</h5>
                    <form>
                        <div class="input-group mt-3">
                            <input name="email" type="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" required placeholder="{{__('layout.email')}}" style="border-radius: 20px"/>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="input-group mt-3">
                            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror col-6" autocomplete="new-password" required placeholder="{{__('layout.password')}}" style="border-radius: 20px"/>
                            <input name="password_confirmation" type="password" class="form-control  col-6 mr-1" placeholder="{{__('layout.confirm_password')}}" autocomplete="off" style="border-radius: 20px" required/>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="d-flex">
                            <button type="submit" class="btn btn-primary m-2 mt-3">{{__('layout.register_new_account')}}</button>
                            <button type="reset" class="btn btn-secondary m-2 mt-3">{{__('layout.clear')}}</button>
                        </div>

                        <div class="d-flex flex-column">
                            <div class="d-flex flex-column align-items-center">
                                <p>{{__('layout.you_can_use')}}</p>
                                <div>
                                    <a class="ml-2 h2" href="{{route('oAuth' , ['provider' => 'facebook'])}}"><i class="fab fa-facebook"></i></a>
                                    <a class="h2 text-danger" href="{{route('oAuth' , ['provider' => 'google'])}}"><i class="fab fa-google-plus-g"></i></a>
                                </div>
                            </div>
                            <div>
                            </div>
                            <span class="d-flex justify-content-center">{{__('layout.i_have_account')}}<a class="mr-2" href="{{route('login')}}">{{__('layout.login')}}</a></span>
                        </div>
                    </form>
                </div>
            </div>

            <div class="d-none d-lg-block col-lg-6 mb-4" align="end">
                <img src="{{asset('img/public/email.png')}}"  height="400px">
            </div>
        </div>
    </div>
</form>
</div>
@endsection
