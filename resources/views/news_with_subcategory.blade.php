@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($news_with_subcategory as $subcategory_news)
        @foreach ($subcategory_news->news as $products)
        <a href="{{ route('usershow', ['id'=>$products->id]) }}"><h3>{{ $products->title }}</h3></a>
        <article>{{ $products->desc }}</article>
        <img src="{{ asset('image').'/'.$products->photo }}" alt="image">
        @endforeach
    @endforeach
    </div>
@endsection