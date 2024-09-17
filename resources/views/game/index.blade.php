@extends('layouts.app')
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
    <div class="row">
        @foreach ($viewData["games"] as $game)
        <div class="col-md-4 col-lg-3 mb-2">
            <div class="card">
                <img src="{{ $game->getImage() }}" class="card-img-top img-card">
                <div class="card-body text-center">
                    <div class="name-price">
                        <h5 class="card-title">{{ $game->getName() }}</h5>
                        <p class="card-text">{{ $game->getPrice() }}</p>
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