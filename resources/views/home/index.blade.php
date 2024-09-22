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
</div>
@endsection