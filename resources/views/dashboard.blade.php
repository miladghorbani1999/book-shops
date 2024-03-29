<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title??''}}</title>
    <!-- Styles -->

    @vite(['resources/sass/app.scss','resources/sass/dashboard/main.scss'])
    @vite(['resources/js/app.js'])

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
            <div class="image-right pt-3 text-right pe-3 d-flex justify-content-space-around">
                <div class="col-8 d-flex">
                    <img class="image-circle" src="{{asset('images/users/avatar.jpg')}}" alt="user_image">
                    <span class="pr-10">{{Auth::user()->full_name}}</span>
                </div>
                <a class="btn btn-primary logout col-4" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    خروج <i class="mdi mdi-logout"></i>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
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
            <div class="col-12">
                <div class="pe-3  text-right ">
                    <a class="text-white text-decoration-none w-100 fs-17" data-bs-toggle="collapse" href="#categories"
                       role="button" aria-expanded="false" aria-controls="collapseExample">
                        <i class="mdi mdi-collage"></i>
                        دسته‌بندی
                    </a>
                </div>
                <div class="collapse mt-3" id="categories">
                    <div style="background-color: #2c3b41" class="card card-body ">
                        <a class="text-decoration-none text-white text-right fs-14" href="{{route('category.index')}}">
                            <i class="mdi mdi-format-list-bulleted"></i>
                            لیست دسته بندی ها
                        </a>
                        <a class="text-decoration-none text-white text-right fs-14 pt-3"
                           href="{{route('category.create')}}">
                            <i class="mdi mdi-plus-circle-outline"></i>
                            افزودن دسته بندی
                        </a>
                    </div>
                </div>
            </div>
        </aside>
        <div class="col-10 gray-main-back">
            <h1 class="fs-17 ps-4 pt-4">{{$title??''}}</h1>
            <div class="content-main col-11 mx-auto pt-4 pb-4 mt-65 bg-white br-5">
                @yield('content')
            </div>
        </div>
    </div>
</div>
</body>
</html>

