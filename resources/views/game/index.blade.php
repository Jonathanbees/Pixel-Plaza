@extends('layouts.app')
@section('title', "PIXEL PLAZA - List of games")
@section('content')

<div class="container mt-4">
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
                <a href="{{ route('game.show', ['id'=> $game->getId()]) }}" class="btn bg-primary text-white">{{ $game->getName() }}</a>
                <form action="{{ route('game.addToShoppingCart', ['id' => $game->getId()]) }}" method="POST" class="mt-2">
                    @csrf
                    <button type="submit" class="btn btn-success">Add to Cart</button>
                </form>
            </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection