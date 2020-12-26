<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{ route('home') }}">მთავარი გვერდი</a>
    <div class="container">
        @foreach ($subcategory_news as $subcategory_new)
        @foreach ($subcategory_new->products as $products)
            <a href="{{ route('guestShow', ['id'=>$products->id]) }}"><h3>{{ $products->title }}</h3></a>
            <article>{{ $products->desc }}</article>
            <img src="{{ asset('image').'/'.$products->photo }}" alt="image">
        @endforeach
    </div>
    <ul class="list-group list-group-flush" id="list-example">
        <div class="row justify-content-start">
            <div class="col-4">
                @foreach ($subcategory_new->subcategories as $subcategories)
                    <a href="{{ route('guestShowWithSubcategory', ['id'=>$subcategories->id]) }}"><li class="list-group-item w-15">{{ $subcategories->subcategory }} </li></a>
                @endforeach
            </div>
        </div>
      </ul>
      @endforeach
</body>
</html>