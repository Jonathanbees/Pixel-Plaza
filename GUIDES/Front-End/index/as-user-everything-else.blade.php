@extends('layouts.app')

@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])

@section('content')
<div class="row">
    <div class="row justify-content-center">
        <div class="list-group">
            @foreach ($viewData['users'] as $user)
                <a href="{{ route('custom-users.show', $user->getId()) }}" class="list-group-item list-group-item-action">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-1">User ID: {{ $user->getId() }}</h5>
                        <small class="text-muted">{{ $user->getUsername() }}</small>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
@endsection