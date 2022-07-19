@extends('layouts.admin',[
    'title'=>'صفحه ورود'
])

{{-- @section('title', 'صفحه ورود') --}}

@section('content')
@component('components.authentication')
    @slot('url')
    {{ route('register') }}
    @endslot
    @slot('type')
     ثبت نام در
    @endslot
    @slot('text_main')
    <h3 class="register-heading">صفحه ورود کاربر‍</h3>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="row register-form mx-auto">

            <div class="col-12 col-md-12">
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="پست الکترونیکی *" value="{{old('email')}}"  >

                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="رمز *" autocomplete="new-password">
                </div>
                <div class="form-group">
                    <a class="text-sm text-gray-600 hover:text-gray-900 text-decoration-none text-dark" href="{{ route('password.request') }}">
                        فراموشی رمز عبور >
                    </a>
                </div>
                <div class="col-12">
                    <input type="submit" class="btnRegister mt-2 col-12" value="ورود">
                </div>
                <div class="col-12 ">
                    @if($errors->any())

                        <div style="margin-top: 70px!important" class="alert alert-danger col-12 ">

                            @foreach($errors->all() as $key => $error)
                                {{ $error }}<br/>
                            @endforeach
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </form>
    @endslot
@endcomponent
@endsection
