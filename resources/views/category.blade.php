@extends('layouts.app')

@section('content')
    <form action="{{ route('adminAppendCategory') }}" method="post">
        @csrf
        <div class="container">
            <input type="text" name="category" class="form-control" placeholder="კატეგორიის სახელი">
            <button class="btn btn-primary w-100 mt-4">დამატება</button>
        </div>
    </form>
@endsection