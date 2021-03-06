@extends('dashboard',['title'=>'لیست کتاب'])

@section('content')
    <div class="list-books">

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
                <th scope="col"> </th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $key=>$book)
            <tr>
                <th scope="row">{{to_persian($key)}}</th>
                <td>{{$book->name}}</td>
                <td>{{$book->category->name}}</td>
                <td>{{$book->writer->full_name}}</td>
                <td>{{to_persian($book->inventory)}}</td>
                <td>{{to_persian($book->price)}}</td>
                <td>{{to_persian(jalali_date($book->publication_year))}}</td>
                <td>{{$book->description}}</td>
                <td><a class="text-decoration-none text-dark" href="{{route('books.edit',[$book])}}">ویرایش</a></td>
                <td>
                    <form method="POST" action="{{route('books.destroy',[$book->id])}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" >حدف</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {!! $books->links() !!}
    </div>
    <script type="module">
        @if (Session::has('success'))
        Swal.fire({
            title: '',
            text: "{!! \Session::get('success') !!}",
            icon: 'success',
            confirmButtonText: 'تایید'
        })
        @endif
    </script>
@endsection
