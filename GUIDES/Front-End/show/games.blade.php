@extends('layouts.app') 
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"]) 
@section('content') 
<div class="card mb-3"> 
    <div class="row g-0"> 
        <div class="col-md-4"> 
        <img src="https://i.pinimg.com/736x/16/86/d4/1686d42168dce2aa1c9957cbfd39a45f.jpg" class="img-fluid rounded-start"> 
        </div> 
        <div class="col-md-8"> 
        <div class="card-body"> 
            <h5 class="card-title"> 
            {{ $viewData["review"]["client"] }} 
            </h5> 
            <p class="card-text"><small class="text-muted">About {{ $viewData["review"]["game"] }}</small></p>
            <p class="card-text">{{ $viewData["review"]["comment"] }}<small class="text-muted"> ({{ $viewData["review"]["rating"] }} stars)</small></p>
            <p class="card-text"><small class="text-muted">Created at: {{ $viewData["review"]["created_at"] }}</small></p>
            <p class="card-text"><small class="text-muted">Updated at: {{ $viewData["review"]["updated_at"] }}</small></p>
            <form action="{{ route('review.destroy', ['id' => $viewData['review']['id']]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div> 
        </div> 
    </div> 
</div> 
@endsection