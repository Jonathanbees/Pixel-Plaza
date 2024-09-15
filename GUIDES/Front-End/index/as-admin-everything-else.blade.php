@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')

<div class="container mt-4">
  @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{ $viewData["categories"]["id"] }}</td>
        <td>{{ $viewData["categories"]["name"] }}</td>
        <td>{{ $viewData["categories"]["description"] }}</td>
        <td>
          <a href="" class="btn btn-primary">Edit</a>
          <form action="{{ route('category.destroy', ['id' => $viewData['categories']['id']]) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
        </td>
      </tr>
    </tbody>
  </table>
</div>

@endsection