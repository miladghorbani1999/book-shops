@extends('dashboard',['title'=>'افزودن کتاب'])
@section('content')
    <div class="add-book">
        <form action="{{route('books.store')}}" class="row col-11 mx-auto pb-3" method="POST">
            @csrf
            <div class="form-group col-6 ">
                <label for="first-name">نام</label>
                <input type="text" name="name" class="form-control" id="first-name"
                       placeholder="نام کتاب‌را وارد کنید" {{old('name')}}>
            </div>
            <div class="form-group col-6 ">
                <label for="price">قیمت</label>
                <input type="number" name="price" class="form-control" id="price"
                       placeholder="قیمت کتاب را به ریال وارد کنید" {{old('price')}}/>
            </div>
            <div class="form-group col-6 pt-3">
                <label for="count">تعداد</label>
                <input type="number" name="inventory" class="form-control" id="count"
                       placeholder="تعداد کتاب‌را وارد کنید" {{old('count')}}/>
            </div>
            <div class="form-group col-6 pt-3">
                <label for="category">دسته‌بندی</label>
                <select id="category" name="category" class="form-control" {{old('category')}}>
                    <option>بدون دسته‌بندی</option>
                    @foreach($categories as $category)
                        <option value="{{$category['id']}}">{{$category['name']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-6 pt-3">
                <label for="writer">نویسنده</label>
                <select id="writer" name="writer_id" class="form-control" {{old('category')}}>
                    <option>انتخاب</option>
                    @foreach($writers as $writer)
                        <option value="{{$writer['id']}}">{{$writer['full_name']}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-6 pt-3">
                <label for="publication">زمان انتشار</label>
                <input  data-jdp type="text" name="publication_year" class="form-control publication-time" id="publication"
                       placeholder="زمان انتشار کتاب را وارد کنید" {{old('publication_year')}}/>
            </div>
            <div class="form-group col-12 pt-3">
                <label for="editor-simple">توضیحات</label>
                <textarea type="text" name="description" class="form-control text-right" id="editor-simple"
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
                    <div class="alert alert-success mb-0">
                        <ul>
                            <li>{!! Session::get('success') !!}</li>
                        </ul>
                    </div>
                @endif
            </div>
        </form>
    </div>
    <script type="module">
        jalaliDatepicker.startWatch();
        ClassicEditor
            .create( document.querySelector( '#editor-simple' ) )
            .then( editor => {
                window.editor = editor;
            } )
            .catch( error => {
                console.error( 'There was a problem initializing the editor.', error );
            } );
    </script>


@endsection
