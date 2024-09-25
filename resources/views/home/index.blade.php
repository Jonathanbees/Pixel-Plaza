@extends('layouts.app')
@section('title', 'Home Page - Online Store')
@section('styles')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="text-center">
    <h1>Welcome to PIXEL PLAZA</h1>
    <a href="{{ route('game.index') }}" class="btn btn-primary mt-3">View Games</a>
    <a href="{{ route('game.shoppingCart') }}" class="btn btn-secondary mt-3">View Shopping Cart</a>
    <a href="{{ route('game.mostPurchased') }}" class="btn btn-success mt-3">Most Purchased Games</a> 
    <a href="{{ route('company.topSellingGames') }}" class="btn btn-info mt-3">Top Selling Games by Company</a>
    <a href="{{ route('game.topCategories') }}" class="btn btn-danger mt-3">Top Selling Games by Category</a>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @auth
                        {{ __('You are logged in!') }}
                    @else
                        {{ __('Please log in to access your dashboard.') }}
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
