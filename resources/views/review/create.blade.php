@extends('layouts.app')

@section('title', 'Create Review')
@section('subtitle', 'Create a new review')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-header text-center">
                    <h4>Create Review</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('review.save') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="rating" class="form-label">Rating:</label>
                            <input type="number" id="rating" name="rating" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="comment" class="form-label">Comment:</label>
                            <textarea id="comment" name="comment" class="form-control" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="game" class="form-label">Game:</label>
                            <input type="text" id="game" name="game" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="client" class="form-label">Client:</label>
                            <input type="text" id="client" name="client" class="form-control" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection