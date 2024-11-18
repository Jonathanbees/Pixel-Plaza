@extends('layouts.app')
<!-- Samuel B) --->
@section('title', __('PIXEL PLAZA - Most Purchased Games'))
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

    <h2 class="mb-4" style="color:white">{{ __('Most Purchased Games') }}</h2>

    <form method="GET" action="{{ route('game.mostPurchased') }}">
        <label for="limit" style="color:white">{{ __('Number of Games to Display:') }}</label>
        <div class="input-group">
            <input type="number" name="limit" id="limit" class="form-control" value="{{ request('limit', 4) }}" min="1">
            <button type="submit" class="btn btn-primary">{{ __('Show') }}</button>
            <a href="{{ route('game.mostPurchased') }}" class="btn btn-secondary">{{ __('Reset') }}</a> 
        </div>
    </form>

    <div class="row mt-4">
        @foreach ($viewData['games'] as $game)
            <div class="col-md-4 col-lg-3 mb-2">
                <div class="card">
                    <img src="{{ $game->getImage() }}" class="card-img-top img-card">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $game->getName() }}</h5>
                        <p class="card-text">{{ __('Total Purchased:') }} {{ $game->total_purchased }}</p>
                        <p class="card-text">{{ __('Price:') }} {{ $game->getPrice() }}$</p>
                        <div class="btn-group" role="group">
                            <a href="{{ route('game.show', ['id'=> $game->getId()]) }}" class="btn bg-primary text-white">{{ __('View') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection