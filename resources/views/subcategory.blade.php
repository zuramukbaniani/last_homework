@extends('layouts.app')

@section('content')
@foreach ($subcategories as $subcategory)
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{ $subcategory->subcategory }}</th>
            </tr>
            </thead>
    </table>
@endforeach
    <form action="{{ route('adminAppendSubcategory') }}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $category_id->id }}">
        <input type="text" name="subcategory" class="form-control" placeholder="ქვეკატეგორიის დამატება">
        <button class="btn btn-primary w-100 mt-4">დამატება</button>
    </form>
</div>
@endsection