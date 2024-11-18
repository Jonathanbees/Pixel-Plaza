@extends('layouts.app')

@section('title', __('Order Details'))

@section('content')
<div class="container mt-4">
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ __('Order') }} #{{ $viewData['order']->getId() }}</h5>
            <p class="card-text"><strong>{{ __('Date:') }}</strong> {{ $viewData['order']->getCreatedAt() }}</p>
            <p class="card-text"><strong>{{ __('Total:') }}</strong> ${{ $viewData['order']->getTotalPrice() }}</p>
        </div>
    </div>

    <!-- Items Section -->
    <div class="card mt-4">
        <div class="card-header">
            <h5>{{ __('Items') }}</h5>
        </div>
        <div class="card-body">
            @foreach ($viewData['items'] as $item)
                <div class="card mb-3">
                    <div class="card-body">
                        <p><strong>{{ __('Game:') }}</strong> {{ $item->getGame()->getName() }}</p>
                        <p><strong>{{ __('Quantity:') }}</strong> {{ $item->getQuantity() }}</p>
                        <p><strong>{{ __('Price:') }}</strong> {{ $item->getPrice() }}$</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection