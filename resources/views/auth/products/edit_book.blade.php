@extends('dashboard',[
    'title'=>'ویرایش اطلاعات کتاب'
])
@section('content')
    <div class="add-book">
        <form action="{{route('books.update',$book)}}" class="row col-11 mx-auto pb-3" method="POST">
            @csrf
            <input type="hidden" name="_method" value="put" />
            <div class="form-group col-6 ">
                <label for="first-name">نام</label>
                <input type="text" name="name" class="form-control" id="first-name"
                       value="{{$book->name}}" >
            </div>
            <div class="form-group col-6 ">
                <label for="price">قیمت</label>
                <input type="number" name="price" class="form-control" id="price"
                       value="{{$book->price}}"/>
            </div>
            <div class="form-group col-6 pt-3">
                <label for="count">تعداد</label>
                <input type="number" name="inventory" class="form-control" id="count"
                       value="{{$book->inventory}}"/>
            </div>
            <div class="form-group col-6 pt-3">
                <label for="category">دسته‌بندی</label>
                <select id="category" name="category" class="form-control" >
                    @foreach($categories as $category)
                        @if($category->id==$book->category->id)
                            <option selected value="{{$category['id']}}">{{$category['name']}}</option>
                        @endif
                        <option value="{{$category['id']}}">{{$category['name']}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-6 pt-3">
                <label for="writer">نویسنده</label>
                <select id="writer" name="writer_id" class="form-control">

                    @foreach($writers as $writer)
                        @if($writer->id==$book->writer->id)
                            <option selected value="{{$writer['id']}}">{{$writer['full_name']}}</option>
                        @endif
                        <option value="{{$writer['id']}}">{{$writer['full_name']}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-6 pt-3">
                <label for="publication">زمان انتشار</label>
                <input data-jdp type="text" name="publication_year" class="form-control publication-time" id="publication"
                       value="{{jalali_date_format2($book->publication_year)}}" {{old('publication_year')}}/>
            </div>
            <div class="form-group col-12 pt-3">
                <label for="description">توضیحات</label>
                <textarea type="text" name="description" class="form-control text-right" id="editor-simple"
                >{{$book->description}}</textarea>
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
