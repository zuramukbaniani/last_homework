@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($subcategory_news as $subcategory_new)
    @foreach ($subcategory_new->products as $products)
        <a href="{{ route('usershow', ['id'=>$products->id]) }}"><h3>{{ $products->title }}</h3></a>
        <article>{{ $products->desc }}</article>
        <img src="{{ asset('image').'/'.$products->photo }}" alt="image">
    @endforeach
</div>
<ul class="list-group list-group-flush" id="list-example">
    <div class="row justify-content-start">
        <div class="col-4">
            @foreach ($subcategory_new->subcategories as $subcategories)
                <a href="{{ route('userShowWithSubcategories', ['id'=>$subcategories->id]) }}"><li class="list-group-item w-15">{{ $subcategories->subcategory }} @admin 
                    <a href="{{ route('adminCreateSubcategory', ['id'=>$subcategories->id]) }}" style="color: black">ქვეკატეგორიის დამატება</a> @endadmin</li></a>
            @endforeach
        </div>
    </div>
  </ul>
  @endforeach
@endsection