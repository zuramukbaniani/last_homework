@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $news_and_comments->title }}</h1>
        <img src="{{ asset('image').'/'.$news_and_comments->photo }}" alt="image">
        <article>{{ $news_and_comments->desc }}</article>
        <h1>კომენტარები</h1>
        @foreach ($news_and_comments->comments  as $comments)
            <article>{{ $comments->comment }}</article>
            <a href="#" onclick="ChangeDisplay({{ $comments->id }})">პასუხი</a>
            <div style="text-align: right">
                @foreach ($news_and_comments->reply_comments as $reply_comments)
                @if($comments->id === $reply_comments->comment_id)
                    <article>{{ $reply_comments->comment }}</article>
                @endif
            @endforeach
            </div>
        @endforeach
        <form action="{{ route('userCommentReply') }}" method="post">
            @csrf
            <div style="display:none" id="reply-{{ $comments->id }}">
                <input type="hidden" name="comment_id" value="{{ $comments->id }}">
                <input type="hidden" name="post_id" value="{{ $news_and_comments->id }}">
                <input type="text" name="reply_comment" class="form-control">
                <button class="btn btn-primary">პასუხი</button>
            </div>
            <script>
                function ChangeDisplay(name){
                    document.getElementById('reply-' + name).style.display = 'block';
                }
            </script>   
        </form>
        <form action="{{ route('userComment') }}" method="post">
            @csrf
            <textarea name="comment" class="form-control" placeholder="კომენტარი" cols="30" rows="10"></textarea>
            <input type="hidden" name="id" value="{{ $news_and_comments->id }}">
            <button class="btn btn-primary w-100 mt-4">დაკომენტარება</button>
        </form>
    </div>
@endsection