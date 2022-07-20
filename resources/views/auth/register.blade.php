@extends('layouts.admin',[
    'title'=>'صفحه ثبت نام'
])

{{-- @section('title', 'صفحه ثبت نام') --}}

@section('content')
    @component('components.authentication')
        @slot('url')
            {{ route('login') }}
        @endslot
        @slot('type')
            ورود به
        @endslot
        @slot('text_main')
            <h3 class="register-heading">ثبت نام کاربر</h3>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="row register-form mx-auto">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="first_name" placeholder="* نام" value="{{old('first_name')}}"  autofocus >
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name='last_name' value="{{old('last_name')}}" placeholder="* نام خانوادگی" >
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" name='phone_number' value="{{old('phone_number')}}" placeholder="* شماره‌تلفن" >
                        </div>

                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="* ایمیل"  >

                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="* رمز"  autocomplete="new-password">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="* تکرار رمز عبور" >
                        </div>

                    </div>
                    <div class="col-12">
                        <input type="submit" class="btnRegister col-12 mt-3" value="عضویت">
                    </div>
                    <div class="col-12 mt-2">
                        @if($errors->any())

                            <div class="alert alert-danger col-12">

                                @foreach($errors->all() as $key => $error)
                                    {{ $error }}<br/>
                                @endforeach
                            </div>
                        @endif

                    </div>
                </div>
            </form>
        @endslot
    @endcomponent
@endsection
