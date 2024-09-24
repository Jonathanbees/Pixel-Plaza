@extends('layouts.app')

@section('title', 'Game Details')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Game Details</h4>
                </div>
                <div class="card-body">
                    <p><strong>ID:</strong> {{ $viewData['game']->getId() }}</p>
                    <p><strong>Name:</strong> {{ $viewData['game']->getName() }}</p>
                    <p><strong>Image:</strong> <img src="{{ $viewData['game']->getImage() }}" class="img-fluid rounded" alt="{{ $viewData['game']->getName() }}"></p>
                    <p><strong>Price:</strong> ${{ $viewData['game']->getPrice() }}</p>
                    <p><strong>Description:</strong> {{ $viewData['game']->getDescription() }}</p>
                    <p><strong>Company:</strong> {{ $viewData['game']->getCompany() ? $viewData['game']->getCompany()->getName() : 'N/A' }}</p>
                    <p><strong>Reviews Sum:</strong> {{ $viewData['game']->getReviewsSum() }}</p>
                    <p><strong>Reviews Quantity:</strong> {{ $viewData['game']->getReviewsCount() }}</p>
                    <p><strong>Balance:</strong> {{ $viewData['game']->getBalance() }}</p>
                    <p><strong>Balance Date:</strong> {{ $viewData['game']->getBalanceDate() }}</p>
                    <p><strong>Balance Reviews Count:</strong> {{ $viewData['game']->getBalanceReviewsCount() }}</p>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('admin-game.edit', $viewData['game']->getId()) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('admin-game.destroy', $viewData['game']->getId()) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection