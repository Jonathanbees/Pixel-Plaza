@extends('layouts.app')

@section('title', 'Custom Users - PIXEL PLAZA')


@section('content')
<div class="container mt-4">
    @if (!empty($viewData['success']))
        <div class="alert alert-success">
            {{ $viewData['success'] }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="list-group">
                @foreach ($viewData['users'] as $user)
                    <a href="{{ route('admin-custom-user.show', ['id'=> $user->getId()]) }}" class="list-group-item list-group-item-action">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-1">User ID: {{ $user->getId() }}</h5>
                            <small class="text-muted">{{ $user->getUsername() }}</small>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection