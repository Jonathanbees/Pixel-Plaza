@extends('layouts.app')

@section('title', 'Edit Game')

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
                    <h4>Edit Game</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin-game.update', ['id' => $viewData['game']->getId()]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $viewData['game']->getName()) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image URL:</label>
                            <input type="url" id="image" name="image" class="form-control" value="{{ old('image', $viewData['game']->getImage()) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price:</label>
                            <input type="number" id="price" name="price" class="form-control" value="{{ old('price', $viewData['game']->getPrice()) }}" step="0.01" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description:</label>
                            <textarea id="description" name="description" class="form-control" rows="3" required>{{ old('description', $viewData['game']->getDescription()) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="company_id" class="form-label">Company:</label>
                            <select id="company_id" name="company_id" class="form-select" required>
                                @foreach ($viewData['companies'] as $company)
                                    <option value="{{ $company->getId() }}" {{ old('company_id', $viewData['game']->getCompany()->getId()) == $company->getId() ? 'selected' : '' }}>
                                        {{ $company->getName() }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection