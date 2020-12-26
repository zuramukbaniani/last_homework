@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>აირჩიეთ კატეგორია</h2>
        @foreach ($categories as $category)
            <a href="{{ route('adminChoiceSubcategory', ['id'=>$category->id]) }}">{{ $category->category }}</a>
        @endforeach
    </div>
@endsection