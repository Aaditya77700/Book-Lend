@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Lend a Book</h2>

    <form method="POST" action="{{ route('lendings.store') }}">
        @csrf

        <div class="mb-3">
            <label for="book_id">Book</label>
            <select name="book_id" class="form-control" required>
                <option value="">Select a book</option>
                @foreach($books as $book)
                    <option value="{{ $book->id }}">{{ $book->title }} ({{ $book->available_copies }} available)</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="user_id">Member</label>
            <select name="user_id" class="form-control" required>
                <option value="">Select a member</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="due_date">Due Date</label>
            <input type="date" name="due_at" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Lend Book</button>
    </form>
</div>
@endsection
