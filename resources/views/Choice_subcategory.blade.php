@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>აირჩიეთ ქვეკატეგორა</h2>
        @foreach ($subcategories as $subcategory)
            <a href="{{ route('adminCreatePost', ['id'=>$subcategory->id]) }}">{{ $subcategory->subcategory }}</a>
        @endforeach
    </div>
@endsection