@extends('layouts.app')

@section('title', __('Game Details'))
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
                    <p class="card-text"><strong>{{ __('Categories:') }}</strong>
                        @foreach ($viewData['categories'] as $category)
                            {{ $category->getName() }}@if (!$loop->last), @endif
                        @endforeach
                    </p>
                    <p class="card-text"><strong>{{ __('Price:') }}</strong> ${{ $viewData['game']->getPrice() }}</p>
                    <p class="card-text"><strong>{{ __('Description:') }}</strong> {{ $viewData['game']->getDescription() }}</p>
                    <p class="card-text"><strong>{{ __('Company:') }}</strong> {{ $viewData['game']->getCompany() ? $viewData['game']->getCompany()->getName() : 'N/A' }}</p>
                    <p class="card-text"><strong>{{ __('Rating:') }}</strong> {{ $viewData['game']->getRating() }}⭐</p>
                    <p class="card-text"><strong>{{ __('Created At:') }}</strong> {{ $viewData['game']->getCreatedAt() }}</p>
                    <p class="card-text"><strong>{{ __('Updated At:') }}</strong> {{ $viewData['game']->getUpdatedAt() }}</p>
                </div>
                <div class="card-footer text-center">
                    <form action="{{ route('game.addToShoppingCart', ['id' => $viewData['game']->getId()]) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-primary">{{ __('Add to Cart') }}</button>
                    </form>
                    @auth
                        @if(Auth::user()->getIsAdmin())
                            <form action="{{ route('game.generateBalanceGemini', ['id' => $viewData['game']->getId()]) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-secondary">{{ __('Generate Balance (Gemini)') }}</button>
                            </form>

                            <form action="{{ route('game.generateBalanceHuggingFace', ['id' => $viewData['game']->getId()]) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-secondary">{{ __('Generate Balance (HuggingFace)') }}</button>
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
                <h5>{{ __('Balance') }}</h5>
            </div>
            <div class="card-body">
                <p><strong>{{ __('Balance:') }}</strong> {!! $viewData['game']->getBalance() !!}</p>
                <p><strong>{{ __('Balance Date:') }}</strong> {{ $viewData['game']->getBalanceDate() }}</p>
                <p><strong>{{ __('Balance Reviews Count:') }}</strong> {{ $viewData['game']->getBalanceReviewsCount() }}</p>
            </div>
        </div>
    @endif

    <!-- Reviews Section -->
    <div class="card mt-4">
        <div class="card-header">
            <h5>{{ __('Reviews') }}</h5>
        </div>
        <div class="card-body">
            @foreach ($viewData['game']->getReviews() as $review)
                <div class="card mb-3">
                    <div class="card-body">
                        <p><strong>{{ __('Author:') }}</strong> {{ $review->getCustomUser()->getName() }}</p>
                        <p><strong>{{ __('Comment:') }}</strong> {{ $review->getComment() }}</p>
                        <p><strong>{{ __('Rating:') }}</strong> {{ $review->getRating() }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- AddReview form, only for authenticated users -->
    @auth
    <div class="card mt-4">
        <div class="card-header">
            <h5>{{ __('Add a Review') }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('review.addReview', ['id' => $viewData['game']->getId()]) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="rating" class="form-label">{{ __('Rating') }}</label>
                    <input type="number" class="form-control" id="rating" name="rating" min="1" max="5" required>
                </div>
                <div class="mb-3">
                    <label for="comment" class="form-label">{{ __('Comment') }}</label>
                    <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">{{ __('Submit Review') }}</button>
            </form>
        </div>
    </div>
    @else
    <div class="alert alert-warning mt-4" role="alert">
        {{ __('Please log in to add a review.') }}
    </div>
    @endauth
</div>
@endsection