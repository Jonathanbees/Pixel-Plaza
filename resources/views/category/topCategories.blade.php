@extends('layouts.app')
@section('title', __('Top Categories with Most Games'))
@section('styles')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container mt-4">
    <h1>{{ __('Top Categories with Most Games') }}</h1>
    @foreach ($viewData['categories'] as $category)
        <div class="card mb-3">
            <div class="card-header">
                <h2>{{ $category->getName() }}</h2>
            </div>
            <div class="card-body">
                <p>{{ __('Total Games:') }} {{ $category->games_count }}</p>
            </div>
        </div>
    @endforeach
</div>
@endsection