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
        <h1>{{ $news_and_comments->title }}</h1>
        <img src="{{ asset('image').'/'.$news_and_comments->photo }}" alt="image">
        <article>{{ $news_and_comments->desc }}</article>
        <h1>კომენტარები</h1>
        @foreach ($news_and_comments->comments  as $comments)
            <article>{{ $comments->comment }}</article>
            <div style="text-align: right">
                @foreach ($news_and_comments->reply_comments as $reply_comments)
                @if($comments->id === $reply_comments->comment_id)
                    <article>{{ $reply_comments->comment }}</article>
                @endif
            @endforeach
            </div>
        @endforeach
</body>
</html>