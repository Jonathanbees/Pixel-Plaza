@extends('layouts.app')

@section('title', 'Create Game')

@section('styles')
    <link href="{{ asset('css/create_products.css') }}" rel="stylesheet">
@endsection

@section('content')
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
            <div class="card form-container">
                <div class="card-header form-header">
                    <h4>Create Game</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('game.save') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image URL:</label>
                            <input type="text" id="image" name="image" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price:</label>
                            <input type="number" step="0.01" id="price" name="price" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description:</label>
                            <textarea id="description" name="description" class="form-control" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="company" class="form-label">Company:</label>
                            <input type="text" id="company" name="company" class="form-control" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection