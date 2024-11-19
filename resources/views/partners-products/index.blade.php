@extends('layouts.app')

@section('title', __('PIXEL PLAZA - Partner Products'))

@section('styles')
  <link href="{{ asset('css/index_products.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container">
  @if(session('viewData.success'))
    <div class="alert alert-success">
      {{ session('viewData.success') }}
    </div>
  @endif

  <div class="row mt-4">
    @if (isset($viewData['products']) && !empty($viewData['products']))
      @foreach ($viewData['products'] as $product)
        <div class="col-md-4 col-lg-3 mb-2">
          <div class="card">
            <img src="{{ $product['image_url'] }}" class="card-img-top img-card">
            <div class="card-body">
              <h5 class="card-title">{{ $product['name'] }}</h5>
              <p class="card-text">{{ __('Description') }}: {{ $product['description'] }}</p>
              <div class="d-flex justify-content-between align-items-center">
                <p class="card-text mb-0">{{ __('Price') }}: {{ number_format($product['price'], 2) }} $</p>
                <p class="card-text mb-0">{{ __('Warranty') }}: {{ $product['warranty'] }} {{ __('Years') }}</p>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    @else
      <div class="alert alert-info">
        {{ __('No partner products found at this time.') }}
      </div>
    @endif
  </div>
</div>

@endsection