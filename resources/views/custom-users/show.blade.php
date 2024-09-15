@extends('layouts.app')

@section('title', 'User Details')
@section('subtitle', 'Details of the selected user')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h4>User Details</h4>
                </div>
                <div class="card-body">
                    <p><strong>ID:</strong> {{ $viewData['user']->getId() }}</p>
                    <p><strong>Username:</strong> {{ $viewData['user']->getUsername() }}</p>
                    <p><strong>Email:</strong> {{ $viewData['user']->getEmail() }}</p>
                    <p><strong>Password:</strong> {{ $viewData['user']->getPassword() }}</p>
                </div>
                <div class="card-footer text-center">
                    <form action="{{ route('custom-users.destroy', $viewData['user']->getId()) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection