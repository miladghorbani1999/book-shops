@extends('dashboard',[
    'title'=>'ویرایش دسته‌بندی'
])
@section('content')
    <div class="add-book">
        <form action="{{route('category.update',$category)}}" class="row col-11 mx-auto pb-3" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group col-12 ">
                <label for="first-name">نام</label>
                <input type="text" name="name" class="form-control" id="first-name"
                       placeholder="نام دسته‌بندی وارد کنید" value="{{$category->name}}">
            </div>
            <div class="form-group col-12 pt-3">
                <label for="category">دسته بندی</label>
                <select autocomplete="off" name="category_id" class="form-control pr-30" id="category" >
                    <option value="">بدون‌دسته‌بندی</option>

                    @foreach($categories as $cat)
                        <x-category-item
                            :category="$cat"
                            :space_value="4"
                            :main_category="$category"
                        >
                        </x-category-item>
                    @endforeach
                </select>
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
            </div>
        </form>
    </div>

@endsection
