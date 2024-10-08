@extends('layouts.app')

@section('title', 'Game Details')
@section('styles')
    <link href="{{ asset('css/show_products.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container mt-4">
    @if (!empty($viewData['success']))
        <div class="alert alert-success">
            {{ $viewData['success'] }}
        </div>
    @endif
    <div class="card mb-3">
        <div class="row g-0 block">
            <div class="col-md-4 block">
                <img src="{{ $viewData['game']->getImage() }}" class="img-fluid rounded-start block" alt="{{ $viewData['game']->getName() }}">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $viewData['game']->getName() }}</h5>
                    <p class="card-text"><strong>Categories:</strong>
                        @foreach ($viewData['categories'] as $category)
                            {{ $category->getName() }}@if (!$loop->last), @endif
                        @endforeach
                    </p>
                    <p class="card-text"><strong>Price:</strong> ${{ $viewData['game']->getPrice() }}</p>
                    <p class="card-text"><strong>Description:</strong> {{ $viewData['game']->getDescription() }}</p>
                    <p class="card-text"><strong>Company:</strong> {{ $viewData['game']->getCompany() ? $viewData['game']->getCompany()->getName() : 'N/A' }}</p>
                    <p class="card-text"><strong>Rating:</strong> {{ $viewData['game']->getRating() }}⭐</p>
                    <p class="card-text"><strong>Created At:</strong> {{ $viewData['game']->getCreatedAt() }}</p>
                    <p class="card-text"><strong>Updated At:</strong> {{ $viewData['game']->getUpdatedAt() }}</p>
                </div>
                <div class="card-footer text-center">
                    <form action="{{ route('game.addToShoppingCart', ['id' => $viewData['game']->getId()]) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                    </form>
                    @auth
                        @if(Auth::user()->is_admin)
                            <form action="{{ route('game.generateBalance', ['id' => $viewData['game']->getId()]) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-secondary">Generate Balance</button>
                            </form>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <!-- Balance Section -->
    @if ($viewData['game']->getBalance())
        <div class="card mt-4">
            <div class="card-header">
                <h5>Balance</h5>
            </div>
            <div class="card-body">
                <p><strong>Balance:</strong> {!! $viewData['game']->getBalance() !!}</p>
                <p><strong>Balance Date:</strong> {{ $viewData['game']->getBalanceDate() }}</p>
                <p><strong>Balance Reviews Count:</strong> {{ $viewData['game']->getBalanceReviewsCount() }}</p>
            </div>
        </div>
    @endif

    <!-- Reviews Section -->
    <div class="card mt-4">
        <div class="card-header">
            <h5>Reviews</h5>
        </div>
        <div class="card-body">
            @foreach ($viewData['game']->getReviews() as $review)
                <div class="card mb-3">
                    <div class="card-body">
                        <p><strong>Author:</strong> {{ $review->getCustomUser()->getName() }}</p>
                        <p><strong>Comment:</strong> {{ $review->getComment() }}</p>
                        <p><strong>Rating:</strong> {{ $review->getRating() }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- AddReview form, only for authenticated users -->
    @auth
    <div class="card mt-4">
        <div class="card-header">
            <h5>Add a Review</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('review.addReview', ['id' => $viewData['game']->getId()]) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="rating" class="form-label">Rating</label>
                    <input type="number" class="form-control" id="rating" name="rating" min="1" max="5" required>
                </div>
                <div class="mb-3">
                    <label for="comment" class="form-label">Comment</label>
                    <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit Review</button>
            </form>
        </div>
    </div>
    @else
    <div class="alert alert-warning mt-4" role="alert">
        Please log in to add a review.
    </div>
    @endauth
</div>
@endsection