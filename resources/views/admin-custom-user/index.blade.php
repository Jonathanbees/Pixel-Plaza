@extends('layouts.app')

@section('title', __('Custom Users - PIXEL PLAZA'))

@section('content')
<div class="container mt-4">
    @if (!empty($viewData['success']))
        <div class="alert alert-success">
            {{ $viewData['success'] }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="d-flex justify-content-center mb-3">
                <a href="{{ route('admin-custom-user.create') }}" class="btn btn-primary">{{ __('Create User') }}</a>
            </div>
            <div class="list-group">
                <div class="list-group-item list-group-item-action active">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-1">{{ __('User ID') }}</h5>
                        <strong class="text-muted">{{ __('Name') }}</strong>
                        <strong class="text-muted">{{ __('Email') }}</strong>
                        <strong class="text-muted">{{ __('Is Admin') }}</strong>
                    </div>
                </div>
                @foreach ($viewData['users'] as $user)
                    <a href="{{ route('admin-custom-user.show', ['id'=> $user->getId()]) }}" class="list-group-item list-group-item-action">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-1">{{ $user->getId() }}</h5>
                            <small class="text-muted">{{ $user->getName() }}</small>
                            <small class="text-muted">{{ $user->getEmail() }}</small>
                            <small class="text-muted">{{ $user->getIsAdmin() }}</small>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection