@extends('layouts.app')
@section('title', $viewData['category']->getName().' - Online Store')
@section('content')

<div class="container mt-4">
  @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif
  <div class="card">
    <div class="card-header">
      <h3>Category Details</h3>
    </div>
    <div class="card-body">
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
            <td>{{ $viewData['category']->getId() }}</td>
            <td>{{ $viewData['category']->getName() }}</td>
            <td>{{ $viewData['category']->getDescription() }}</td>
            <td>
              <form action="{{ route('admin-category.destroy', ['id' => $viewData['category']->getId()]) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection