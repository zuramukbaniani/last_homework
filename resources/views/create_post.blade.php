@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('adminSavePost') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" name="title" class="form-control" placeholder="title">
            <input type="file" name="image" class="form-control" placeholder="image">
            <textarea name="desc" class="form-control" placeholder="description" cols="30" rows="10"></textarea>
            <input type="hidden" name="category_id" value="{{ $category_id->category_id }}">
            <input type="hidden" name="id" value="{{ $category_id->id }}">
            <button class="btn btn-primary w-100 mt-4">დამატება</button>
        </form>
    </div>
@endsection