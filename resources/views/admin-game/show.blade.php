@extends('layouts.app')

@section('title', __('Game Details'))

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h4>{{ __('Game Details') }}</h4>
                </div>
                <div class="card-body">
                    <p><strong>{{ __('ID:') }}</strong> {{ $viewData['game']->getId() }}</p>
                    <p><strong>{{ __('Name:') }}</strong> {{ $viewData['game']->getName() }}</p>
                    <p><strong>{{ __('Image:') }}</strong> <img src="{{ $viewData['game']->getImage() }}" class="img-fluid rounded" alt="{{ $viewData['game']->getName() }}"></p>
                    <p><strong>{{ __('Price:') }}</strong> ${{ $viewData['game']->getPrice() }}</p>
                    <p><strong>{{ __('Description:') }}</strong> {{ $viewData['game']->getDescription() }}</p>
                    <p><strong>{{ __('Company:') }}</strong> {{ $viewData['game']->getCompany() ? $viewData['game']->getCompany()->getName() : __('No company associated') }}</p>
                    <p><strong>{{ __('Reviews Sum:') }}</strong> {{ $viewData['game']->getReviewsSum() }}</p>
                    <p><strong>{{ __('Reviews Quantity:') }}</strong> {{ $viewData['game']->getReviewsCount() }}</p>
                    <p><strong>{{ __('Balance:') }}</strong> {{ $viewData['game']->getBalance() }}</p>
                    <p><strong>{{ __('Balance Date:') }}</strong> {{ $viewData['game']->getBalanceDate() }}</p>
                    <p><strong>{{ __('Balance Reviews Count:') }}</strong> {{ $viewData['game']->getBalanceReviewsCount() }}</p>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('admin-game.edit', ['id' => $viewData['game']->getId()]) }}" class="btn btn-primary">{{ __('Edit') }}</a>
                    <form action="{{ route('admin-game.destroy', ['id' => $viewData['game']->getId()]) }}" method="POST" class="d-inline">
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