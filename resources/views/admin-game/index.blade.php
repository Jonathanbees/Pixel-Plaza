@extends('layouts.app')

@section('title', __('Games - PIXEL PLAZA'))

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
                <a href="{{ route('admin-game.create') }}" class="btn btn-primary">{{ __('Create Game') }}</a>
            </div>
            <div class="list-group">
                <div class="list-group-item list-group-item-action active">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-1">{{ __('Game ID') }}</h5>
                        <strong class="text-muted">{{ __('Name') }}</strong>
                        <strong class="text-muted">{{ __('Price') }}</strong>
                    </div>
                </div>
                @foreach ($viewData['games'] as $game)
                    <a href="{{ route('admin-game.show', ['id'=> $game->getId()]) }}" class="list-group-item list-group-item-action">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-1">{{ $game->getId() }}</h5>
                            <small class="text-muted">{{ $game->getName() }}</small>
                            <small class="text-muted">{{ $game->getPrice() }}$</small>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection