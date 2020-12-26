@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($newses as $news)
        <a href="{{ route('usershow', ['id'=>$news->id]) }}"><h3>{{ $news->title }}</h3></a>
        <article>{{ $news->desc }}</article>
        <img src="{{ asset('image').'/'.$news->photo }}" alt="image">
    @endforeach
</div>
<ul class="list-group list-group-flush" id="list-example">
    <div class="row justify-content-start">
        <div class="col-4">
            @foreach ($caterogies as $category)
                <a href="{{ route('userShowWithCategories', ['id'=>$category->id]) }}"><li class="list-group-item w-15">{{ $category->category }} @admin 
                    <a href="{{ route('adminCreateSubcategory', ['id'=>$category->id]) }}" style="color: black">ქვეკატეგორიის დამატება</a> @endadmin</li></a>
            @endforeach
        </div>
    </div>
  </ul>
@endsection
