@extends('layouts.app')
@section('title', 'Shopping Cart')
@section('subtitle', 'Your shopping Cart')
@section('content')

<div class="container mt-4">
    <h1>Shopping Cart</h1>
    @if(count($viewData['games']) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($viewData['games'] as $game)
                <tr>
                    <td>{{ $game->getId() }}</td>
                    <td><a href="{{ route('game.show', ['id' => $game->getId()]) }}">{{ $game->getName() }}</a></td>
                    <td>{{ $game->getPrice() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Your shopping cart is empty.</p>
    @endif
</div>

@endsection