@extends('layouts.app') 

@section('title', $viewData["title"]) 

@section('styles')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content') 
<div class="container"> 
  <div class="row"> 
    <div class="col-lg-4 mx-auto"> 
      <h1 class="lead">That {{ $viewData["objectType"] ?? 'object' }} doesn't exist</h1> 
      <img src="https://i.ytimg.com/vi/fEHcsNmu6Yc/mqdefault.jpg" alt="kanye west seeing your bs search">
    </div>
  </div> 
</div> 
@endsection