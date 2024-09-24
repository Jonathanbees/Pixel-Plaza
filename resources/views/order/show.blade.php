@extends('layouts.app')

@section('title', 'Order Details')

@section('content')
<div class="container mt-4">
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">Order #{{ $viewData['order']->getId() }}</h5>
            <p class="card-text"><strong>Date:</strong> {{ $viewData['order']->getCreatedAt() }}</p>
            <p class="card-text"><strong>Total:</strong> ${{ $viewData['order']->getTotalPrice() }}</p>
        </div>
    </div>

    <!-- Items Section -->
    <div class="card mt-4">
        <div class="card-header">
            <h5>Items</h5>
        </div>
        <div class="card-body">
            @foreach ($viewData['items'] as $item)
                <div class="card mb-3">
                    <div class="card-body">
                        <p><strong>Game:</strong> {{ $item->getGame()->getName() }}</p>
                        <p><strong>Quantity:</strong> {{ $item->getQuantity() }}</p>
                        <p><strong>Price:</strong> {{ $item->getPrice() }}$</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection