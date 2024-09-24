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
                    <form action="{{ route('admin-game.save') }}" method="POST">
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
                            <label for="company_id" class="form-label">Company:</label>
                            <select id="company_id" name="company_id" class="form-control" required>
                                <option value="">Select a company</option>
                                @foreach ($viewData['companies'] as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection