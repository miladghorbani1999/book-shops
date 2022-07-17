@extends('layout/admin',[
    'title'=>'صفحه ثبت‌نام کاربر'
])

@section('content')
    <div class="col-12 col-md-9">
    <div class="register-left p-3">
        <!-- /Tabs Nav-bar -->

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <h3 class="register-heading">ثبت‌نام کاربر</h3>
                <form action="{{route('register')}}" method="post">
                    @csrf
                    <div class="row register-form mx-auto">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input type="text" name="first_name" class="form-control" placeholder="* نام" value="{{old('first_name')}}" />
                            </div>
                            <div class="form-group pt-2">
                                <input type="text"  name="last_name" class="form-control" placeholder="* نام خانوادگی" value="{{old('last_name')}}" />
                            </div>
                            <div class="form-group  pt-2">
                                <input type="password"  name="password" class="form-control" placeholder="* رمز عبور " value="" />
                            </div>
                            <div class="form-group  pt-2">
                                <input type="password"  name="password_confirmation" class="form-control"  placeholder="* تکرار رمز عبور " value="" />
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input type="email"  name="email" class="form-control" placeholder="* پست الکترونیک " value="{{old('email')}}" />
                            </div>
                            <div class="form-group  pt-2">
                                <input type="text" name="phone_number" class="form-control" placeholder="* تلفن تماس" value="{{old('phone_number')}}" />
                            </div>
                            <input type="submit" class="btnRegister"  value="عضویت"/>
                        </div>
                        @if($errors->any())
                            <div class="col-12 mx-auto mt-3">
                                <div class="alert alert-danger mt-90">

                                    @foreach($errors->all() as $key => $error)
                                        {{ $error }}<br/>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
@endsection
