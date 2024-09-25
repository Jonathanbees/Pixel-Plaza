@extends('layouts.app')
<!-- Jonathan, Samuel -->
@section('title', "PIXEL PLAZA - List of games")
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

    <div class="row mb-4">
        <div class="col-md-12">
            <form action="{{ route('game.search') }}" method="GET">
                <div class="input-group">
                    <input type="text" name="query" class="form-control" placeholder="Search by name or company" value="{{ request('query') }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                    <a href="{{ route('game.index') }}" class="btn btn-secondary">Reset</a> 
                    <a href="{{ route('game.mostPurchased') }}" class="btn btn-warning">Most Popular</a> 

                </div>
            </form>
        </div>
    </div>

    <div class="row">
        @foreach ($viewData["games"] as $game)
        <div class="col-md-4 col-lg-3 mb-2">
            <div class="card">
                <img src="{{ $game->getImage() }}" class="card-img-top img-card">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $game->getName() }}</h5>
                    <div class="d-flex justify-content-between">
                        <p class="card-text">Rating: {{ number_format($game->getRating(), 1) }}⭐</p>
                        <p class="card-text">Price: {{ $game->getPrice() }}$</p>
                    </div>
                    <div class="btn-group" role="group">
                        <a href="{{ route('game.show', ['id'=> $game->getId()]) }}" class="btn bg-primary text-white">View</a>
                        <form action="{{ route('game.addToShoppingCart', ['id' => $game->getId()]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">Add to cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
