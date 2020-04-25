<!doctype html>
<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-head/>
<x-style/>
<body>
<x-navbar/>
<main>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6 mt-3">
                <div class="card-body">
                    <h5 class="text-center">{{__('confirm_student_data.complete_the_registration')}}</h5>
                    <div class="alert alert-warning text-center" role="alert">
                        {{__('confirm_student_data.alert_message')}}
                    </div>
                    <form action="{{route('confirm_student_data.store')}}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input name="first_name" type="text"
                                   class="form-control @error('first_name') is-invalid @enderror col-6"
                                   placeholder="{{__('confirm_student_data.first_name')}}" value="{{old('first_name')}}"/>
                            <input name="last_name" type="text"
                                   class="form-control @error('last_name') is-invalid @enderror col-6 mr-1"
                                   placeholder="{{__('confirm_student_data.last_name')}}" value="{{old('last_name')}}"/>
                        </div>
                        <div class="row">
                            @error('first_name')
                            <div class="col-6 text-right">
                                <span class="invalid-feedback d-flex" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            </div>
                            @enderror
                            @error('last_name')
                            <div class="col-6 text-right">
                                <span class="invalid-feedback d-flex" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            </div>
                            @enderror
                        </div>
                        <div class="input-group mt-3">
                            <input name="iug_id" type="text"
                                   class="form-control @error('iug_id') is-invalid @enderror col-6"
                                   placeholder="{{__('confirm_student_data.id_student')}}" value="{{old('iug_id')}}"/>
                            <input name="phone" type="text"
                                   class="form-control @error('phone') is-invalid @enderror col-6 mr-1"
                                   placeholder="{{__('confirm_student_data.phone_number')}}" value="{{old('phone')}}"/>
                        </div>
                        <div class="row">
                            @error('iug_id')
                            <div class="col-6 text-right">

                                <span class="invalid-feedback d-flex" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            </div>
                            @enderror
                            @error('phone')
                            <div class="col-6 text-right">

                                <span class="invalid-feedback d-flex" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            </div>
                            @enderror
                        </div>
                        <div class="input-group">
                            <select name="gender" class="form-control col-6 @error('gender') is-invalid @enderror">
                                <option selected>{{__('confirm_student_data.gender')}}</option>
                                <option value="m">{{__('confirm_student_data.male')}}</option>
                                <option value="f">{{__('confirm_student_data.female')}}</option>
                            </select>
                            <select name="college" class="form-control col-6 mr-1">
                                <option selected>الكلية</option>
                                @foreach($categories as $coll)
                                <option value="{{$coll->id}}">{{__('confirm_student_data.college')}} {{$coll->name}}</option>
                                @endforeach
                            </select>
                        </div>

                <div class="row">
                    <div class="col-6 text-right mt-1">
                        @error('gender')
                        <span class="invalid-feedback d-flex mt-1" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                        <div class="checkbox d-flex">
                            <label><input class="ml-2" type="checkbox"
                                          value="">{{__('confirm_student_data.usage_policy')}}</label>
                        </div>
                        <div class="d-flex">
                            <button type="submit"
                                    class="btn btn-primary m-2 mt-3">{{__('confirm_student_data.confirm_data')}}</button>
                            <button type="reset"
                                    class="btn btn-secondary m-2 mt-3">{{__('confirm_student_data.data_dump')}}</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="d-none d-lg-block col-lg-6 mb-4" align="end">
                <img src="{{asset('img/college_img/confirm_data.png')}}" height="400px">
            </div>
        </div>
    </div>
</main>
<x-footer/>
<script src="{{'js/main_script/navbar.js'}}"></script>
</body>
</html>
