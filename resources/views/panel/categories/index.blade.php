@extends('dashboard',[
    'title'=>'لیست دسته‌بندی‌ها'
])
@section('content')
    <div class="list-books">

        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">نام</th>
                <th scope="col">زیردسته‌بندی</th>
                <th scope="col"> </th>
                <th scope="col"> </th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $key=>$category)
                <tr>
                    <th scope="row">{{to_persian($key)}}</th>
                    <td>{{$category->name}}</td>
                    @if($category->category)
                    <td>{{$category->category->name}}</td>
                    @else
                        <td>-</td>
                    @endif

                    <td><a class="text-decoration-none text-dark" href="{{route('books.edit',[$category])}}">ویرایش</a></td>
                    <td>
                        <form method="POST" action="{{route('books.destroy',[$category->id])}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" >حدف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $categories->links() !!}
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
