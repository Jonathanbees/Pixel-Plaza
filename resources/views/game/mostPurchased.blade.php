@extends('layouts.app')

@section('title', "PIXEL PLAZA - Most Purchased Games")
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

    <h2 class="mb-4">Most Purchased Games</h2>

    <form method="GET" action="{{ route('game.mostPurchased') }}">
        <div class="form-group">
            <label for="limit">Number of Games to Display:</label>
            <input type="number" name="limit" id="limit" class="form-control" value="{{ request('limit', 5) }}" min="1">
        </div>
        <button type="submit" class="btn btn-primary mt-2">Show</button>
    </form>

    <div class="row mt-4">
        @foreach ($viewData['games'] as $game)
            <div class="col-md-4 col-lg-3 mb-2">
                <div class="card">
                    <img src="{{ $game->getImage() }}" class="card-img-top img-card">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $game->getName() }}</h5>
                        <p class="card-text">Total Purchased: {{ $game->total_purchased }}</p>
                        <p class="card-text">Price: {{ $game->getPrice() }}$</p>
                        <div class="btn-group" role="group">
                            <a href="{{ route('game.show', ['id'=> $game->getId()]) }}" class="btn bg-primary text-white">View</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
