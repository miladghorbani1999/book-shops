@props(['category', 'element', 'space_value'])

<option class="" value="{{$category->id}}">{{$element??' '}} {{$category->name}}</option>
@foreach($category->children as $key=>$child)
    <x-category-item :category="$child" :element="$key=str_repeat('-', (int)$space_value)" :space_value="(int)$space_value*2"></x-category-item>
@endforeach
