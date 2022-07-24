@props(['category', 'element', 'space_value', 'main_category'])

@if( (!empty($main_category) && $category['id']!==$main_category->id) &&!empty($main_category->parentCategory) && $main_category->parentCategory->id === $category['id'])
    <option value="{{ $category->id }}" @selected(true)>{{ $element ?? ' '}} {{$category->name}}</option>
@else
    <option value="{{ $category->id }}">{{ $element ?? ' '}} {{$category->name}}</option>
@endif
@foreach($category->children as $key=>$child)
    <x-category-item
        :category="$child"
        :element="$key=str_repeat('-', (int)$space_value)"
        :space_value="(int)$space_value*2"
        :main_category="!empty($main_category)?$main_category:false"
    >
    </x-category-item>
@endforeach
