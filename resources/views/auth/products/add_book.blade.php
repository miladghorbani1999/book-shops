@extends('dashboard')
@section('content')
    <div class="add-book">
        <h1 class="fs-17 ps-4 pt-4">افزودن کتاب</h1>
        <div class="form-add-book col-11 mx-auto pt-4 mt-65 bg-white br-5">
            <form action="{{route('book.store')}}" class="row col-11 mx-auto pb-3" method="POST">
                @csrf
                <div class="form-group">
                    <label for="first-name">نام</label>
                    <input type="text" name="name" class="form-control" id="first-name"
                           placeholder="نام خودرا وارد کنید" {{old('name')}}>
                </div>
                <div class="form-group col-6 pt-3">
                    <label for="price">قیمت</label>
                    <input type="number" name="price" class="form-control" id="price"
                           placeholder="قیمت کتاب را به ریال وارد کنید" {{old('price')}}/>
                </div>
                <div class="form-group col-6 pt-3">
                    <label for="count">تعداد</label>
                    <input type="number" name="count" class="form-control" id="count"
                           placeholder="تعداد کتاب‌را وارد کنید" {{old('count')}}/>
                </div>
                <div class="form-group col-6 pt-3">
                    <label for="category">دسته‌بندی</label>
                    <select id="category" name="category" class="form-control" {{old('category')}}>
                        <option value="null">بدون دسته‌بندی</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category['name']}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-6 pt-3">
                    <label for="publication">زمان انتشار</label>
                    <input type="text" name="publication_year" class="form-control publication-time" id="publication"
                           placeholder="زمان انتشار کتاب را وارد کنید" {{old('publication_year')}}/>
                </div>
                <div class="form-group col-12 pt-3">
                    <label for="description">توضیحات</label>
                    <textarea type="text" name="description" class="form-control text-right" id="editor"
                              >{{old('publication_year')}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-5 ">ثبت</button>
                <div class="col-12 mt-2">
                    @if($errors->any())

                        <div class="alert alert-danger col-12">

                            @foreach($errors->all() as $key => $error)
                                {{ $error }}<br/>
                            @endforeach
                        </div>
                    @endif
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! Session::get('success') !!}</li>
                            </ul>
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#publication").persianDatepicker({
                months: ["فروردین", "اردیبهشت", "خرداد", "تیر", "مرداد", "شهریور", "مهر", "آبان", "آذر", "دی", "بهمن", "اسفند"],
                dowTitle: ["شنبه", "یکشنبه", "دوشنبه", "سه شنبه", "چهارشنبه", "پنج شنبه", "جمعه"],
                shortDowTitle: ["ش", "ی", "د", "س", "چ", "پ", "ج"],
                showGregorianDate: !1,
                persianNumbers: !0,
                formatDate: "YYYY/MM/DD",
                selectedBefore: !1,
                selectedDate: null,
                startDate: null,
                endDate: null,
                prevArrow: '\u25c4',
                nextArrow: '\u25ba',
                theme: 'default',
                alwaysShow: !1,
                selectableYears: null,
                selectableMonths: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
                cellWidth: 25, // by px
                cellHeight: 20, // by px
                fontSize: 13, // by px
                isRTL: !1,
                calendarPosition: {
                    x: 0,
                    y: 0,
                },
                onShow: function () { },
                onHide: function () { },
                onSelect: function () { },
                onRender: function () { }
            });
        });

    </script>

@endsection
