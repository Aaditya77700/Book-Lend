@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Book</h2>

    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('books._form', ['book' => new \App\Models\Book])
        <button type="submit" class="btn btn-primary">Save Book</button>
    </form>
</div>
@endsection
