<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title??''}}</title>
    <!-- Styles -->
    <link href="{{asset('vendor/assets/persian-datepicker/persianDatepicker-default.css')}}" rel="stylesheet">
    @vite(['resources/sass/app.scss','resources/sass/main.scss','resources/sass/auth/dashboard.scss'])
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
    <script src="{{asset('vendor/assets/persian-datepicker/persianDatepicker.min.js')}}"></script>
</head>
<body dir="rtl">
<div class="dashboard">
    <div class="row header">
        <div class="col-2 text-white text-center p-2 bg-blue-one">
            <span class="text-bold fs-20">کنترل پنل‌مدیریت</span>
        </div>
        <div class="col-10 bg-blue-two"></div>
    </div>
    <div class="row user-panel">
        <aside style="background-color: #222d32;height: 1100px" class="col-2 text-white text-center p-2 ps-0">
            <div class="image-right pt-3 text-right pe-3">
                <img class="image-circle" src="{{asset('images/users/avatar.jpg')}}" alt="user_image">
                <span class="pr-10">{{\Illuminate\Support\Facades\Auth::user()->full_name}}</span>
            </div>
            <div class="menu mt-3 mb-3 ">
                <p>منو</p>
            </div>
            <div class="col-12">
                <div class="pe-3  text-right">
                    <a class="text-white text-decoration-none w-100 fs-17" data-bs-toggle="collapse" href="#books"
                       role="button" aria-expanded="false" aria-controls="collapseExample">
                        <i class="mdi mdi-shopping"></i>
                        محصولات
                    </a>
                </div>
                <div class="collapse" id="books">
                    <div style="background-color: #2c3b41" class="card card-body ">
                        <a class="text-decoration-none text-white text-right fs-14" href="{{route('books.index')}}">
                            <i class="mdi mdi-format-list-bulleted"></i>
                            لیست کتاب
                        </a>
                        <a class="text-decoration-none text-white text-right fs-14 pt-3"
                           href="{{route('books.create')}}">
                            <i class="mdi mdi-plus-circle-outline"></i>
                            افزودن کتاب
                        </a>

                    </div>
                </div>
            </div>
        </aside>
        <div class="col-10 gray-main-back">

            <h1 class="fs-17 ps-4 pt-4">{{$title}}</h1>
            <div class="form-add-book col-11 mx-auto pt-4 mt-65 bg-white br-5">
                @yield('content')
            </div>


        </div>
    </div>
</div>
@vite(['resources/js/requirements.js', 'resources/js/app.js'])
</body>
</html>

