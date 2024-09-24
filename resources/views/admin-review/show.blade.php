@extends('layouts.app')

@section('title', 'Review Details')
@section('subtitle', 'Details of the selected review')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Review Details</h4>
                </div>
                <div class="card-body">
                    <p><strong>ID:</strong> {{ $viewData['review']->getId() }}</p>
                    <p><strong>Rating:</strong> {{ $viewData['review']->getRating() }}</p>
                    <p><strong>Comment:</strong> {{ $viewData['review']->getComment() }}</p>
                    <p><strong>Game:</strong> {{ $viewData['review']->getGame()->getName() }}</p>
                    <p><strong>Client:</strong> {{ $viewData['review']->getCustomUser()->getName() }}</p>
                </div>
                <div class="card-footer text-center">
                    <form action="{{ route('admin-review.destroy', ['id'=> $viewData['review']->getId()]) }}" method="POST" class="d-inline">
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