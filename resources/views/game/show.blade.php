@extends('layouts.app')
@section('title', 'Game Details')
@section('content')

<div class="container mt-4">
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ $viewData['game']->getImage() }}" class="img-fluid rounded-start" alt="{{ $viewData['game']->getName() }}">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $viewData['game']->getName() }}</h5>
                    <p class="card-text"><strong>Price:</strong> ${{ $viewData['game']->getPrice() }}</p>
                    <p class="card-text"><strong>Description:</strong> {{ $viewData['game']->getDescription() }}</p>
                    <p class="card-text"><strong>Company:</strong> {{ $viewData['game']->getCompany() }}</p>
                    <p class="card-text"><strong>Reviews Sum:</strong> {{ $viewData['game']->getReviewsSum() }}</p>
                    <p class="card-text"><strong>Reviews Quantity:</strong> {{ $viewData['game']->getReviewsCuantity() }}</p>
                    <p class="card-text"><strong>Balance:</strong> {{ $viewData['game']->getBalance() }}</p>
                    <p class="card-text"><strong>Balance Date:</strong> {{ $viewData['game']->getBalanceDate() }}</p>
                    <p class="card-text"><strong>Balance Reviews Count:</strong> {{ $viewData['game']->getBalanceReviewsCount() }}</p>
                    <p class="card-text"><strong>Created At:</strong> {{ $viewData['game']->getCreatedAt() }}</p>
                    <p class="card-text"><strong>Updated At:</strong> {{ $viewData['game']->getUpdatedAt() }}</p>
                    <form action="{{ route('game.addToShoppingCart', ['id' => $viewData['game']->getId()]) }}" method="POST">
                    @csrf
                        <button type="submit" class="btn btn-success">Add to Cart</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection