<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{ route('home') }}">მთავარი გვერდი</a> <div class="container">
        @foreach ($news_with_subcategory as $subcategory_news)
        @foreach ($subcategory_news->news as $products)
        <a href="{{ route('usershow', ['id'=>$products->id]) }}"><h3>{{ $products->title }}</h3></a>
        <article>{{ $products->desc }}</article>
        <img src="{{ asset('image').'/'.$news->photo }}" alt="image">
        @endforeach
    @endforeach
    </div>
</body>
</html>