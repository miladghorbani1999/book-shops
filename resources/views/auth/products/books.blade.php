@extends('dashboard',['title'=>'لیست کتاب'])

@section('content')
    <div class="list-books">
        @if (Session::has('success'))
            <div class="alert alert-success mb-0">
                <ul class="mb-0">
                    <li>{!! Session::get('success') !!}</li>
                </ul>
            </div>
        @endif
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">نام</th>
                <th scope="col">دسته‌بندی</th>
                <th scope="col">نویسنده</th>
                <th scope="col">موجودی</th>
                <th scope="col">قیمت</th>
                <th scope="col">تاریخ انتشار</th>
                <th scope="col">توضیحات</th>
                <th scope="col"> </th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $key=>$book)
            <tr>
                <th scope="row">{{$key}}</th>
                <td>{{$book->name}}</td>
                <td>{{$book->category->name}}</td>
                <td>{{$book->writer->full_name}}</td>
                <td>{{$book->inventory}}</td>
                <td>{{$book->price}}</td>
                <td>{{$book->publication_year}}</td>
                <td>{{$book->description}}</td>
                <td><a href="{{route('books.edit',[$book])}}">ویرایش</a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {!! $books->links() !!}
    </div>
@endsection
