@extends('layouts.app')
@section('title', 'Top Selling Games by Company')
@section('styles')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container mt-4">
    <h1>Top Selling Games by Company</h1>
    @foreach ($viewData['companies'] as $company)
        <div class="card mb-3">
            <div class="card-header">
                <h2>{{ $company->getName() }}</h2>
            </div>
            <div class="card-body">
                <ul>
                    @foreach ($company->topSellingGames as $game)
                        <li>{{ $game->getName() }} - {{ $game->total_purchased }} sales</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endforeach
</div>
@endsection