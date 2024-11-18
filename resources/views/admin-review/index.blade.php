@extends('layouts.app')

@section('title', __('Reviews - PIXEL PLAZA'))
@section('subtitle', __('List of reviews'))

@section('content')
<div class="container mt-4">
    @if (!empty($viewData['success']))
        <div class="alert alert-success">
            {{ $viewData['success'] }}
        </div>
    @endif
    <div class="row">
        @foreach ($viewData["reviews"] as $review)
        <div class="col-md-4 col-lg-3 mb-2">
            <div class="card">
                <img src="https://media.zenfs.com/es/levelup_525/2aaa862355fa5749aa728dd95440ffc1" class="card-img-top img-card">
                <div class="card-body text-center">
                    <a href="{{ route('admin-review.show', ['id'=> $review["id"]]) }}" class="btn bg-primary text-white">({{ $review["id"] }}) {{ $review["client"] }}</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection