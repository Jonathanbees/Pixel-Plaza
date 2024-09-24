@extends('layouts.app')

@section('title', 'Orders - PIXEL PLAZA')

@section('content')
<div class="container mt-4">
    @if (!empty($viewData['success']))
        <div class="alert alert-success">
            {{ $viewData['success'] }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="list-group">
                <div class="list-group-item list-group-item-action active">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-1">Order ID</h5>
                        <strong class="text-muted">Date</strong>
                        <strong class="text-muted">Total</strong>
                    </div>
                </div>
                @foreach ($viewData['orders'] as $order)
                    <a href="{{ route('order.show', ['id'=> $order->getId()]) }}" class="list-group-item list-group-item-action">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-1">{{ $order->getId() }}</h5>
                            <small class="text-muted">{{ $order->getCreatedAt() }}</small>
                            <small class="text-muted">{{ $order->getTotalPrice() }}$</small>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection