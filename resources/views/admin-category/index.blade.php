@extends('layouts.app')
@section('title', 'Categories - Admin')
@section('content')

<div class="container mt-4">
  @if(session('viewData.success'))
    <div class="alert alert-success">
      {{ session('viewData.success') }}
    </div>
  @endif
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3>Categories</h3>
        </div>
        <div class="card-body">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col"># of Games</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($viewData["categories"] as $category)
              <tr>
                <td>{{ $category->getId() }}</td>
                <td>
                  <a href="{{ route('admin-category.show', ['id'=> $category->getId()]) }}" class="text-decoration-none">
                    {{ $category->getName() }}
                  </a>
                </td>
                <td>
                  <span>
                    {{ $category->getGames()->count() }}
                  </span>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection