@extends('layouts.app')

@section('title', __('User Details'))

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h4>{{ __('User Details') }}</h4>
                </div>
                <div class="card-body">
                    <p><strong>{{ __('ID:') }}</strong> {{ $viewData['user']->getId() }}</p>
                    <p><strong>{{ __('Username:') }}</strong> {{ $viewData['user']->getName() }}</p>
                    <p><strong>{{ __('Email:') }}</strong> {{ $viewData['user']->getEmail() }}</p>
                    <p><strong>{{ __('Password:') }}</strong> {{ $viewData['user']->getPassword() }}</p>
                    <p><strong>{{ __('Is Admin:') }}</strong> {{ $viewData['user']->getIsAdmin() }}</p>
                    <p><strong>{{ __('Company:') }}</strong> 
                        @if ($viewData['user']->getCompany())
                            {{ $viewData['user']->getCompany()->getName() }}
                        @else
                            {{ __('No company associated') }}
                        @endif
                    </p>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('admin-custom-user.edit', ['id' => $viewData['user']->getId()]) }}" class="btn btn-primary">{{ __('Edit') }}</a>
                    <form action="{{ route('admin-custom-user.destroy', ['id' => $viewData['user']->getId()]) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection