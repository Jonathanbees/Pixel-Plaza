@extends('layouts.app') 
@section("title", $viewData["title"]) 
@section('content') 
<div class="container"> 
    <div class="row justify-content-center"> 
        <div class="col-md-8"> 
        <div class="card"> 
            <div class="card-header">Create review</div> 
            <div class="card-body"> 
                @if($errors->any()) 
                <ul id="errors" class="alert alert-danger list-unstyled"> 
                @foreach($errors->all() as $error) 
                <li>{{ $error }}</li> 
                @endforeach 
                </ul> 
                @endif 
    
                <form method="POST" action="{{ route('review.save') }}"> 
                    @csrf 
                    <input type="number" class="form-control mb-2" placeholder="Enter rating (1-5)" name="rating" 
                    value="{{ old('rating') }}" min="1" max="5" />
                    <input type="text" class="form-control mb-2" placeholder="Enter comment" name="comment" 
                    value="{{ old('comment') }}" /> 
                    <input type="text" class="form-control mb-2" placeholder="Enter game" name="game" 
                    value="{{ old('game') }}" /> 
                    <input type="text" class="form-control mb-2" placeholder="Enter client" name="client" 
                    value="{{ old('client') }}" /> 
                    <input type="submit" class="btn btn-primary" value="Send" /> 
                </form> 
            </div> 
            </div> 
        </div> 
        </div> 
    </div> 
</div> 
@endsection