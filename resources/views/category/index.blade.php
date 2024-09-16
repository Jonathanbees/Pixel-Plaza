@extends('layouts.app')
@section('title', 'Home Page - Online Store')
@section('content')

<div class="container mt-4">
  @if(session('viewData.success'))
    <div class="alert alert-success">
      {{ session('viewData.success') }}
    </div>
  @endif
  <div class="row">
    <div class="col-12">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($viewData["categories"] as $category)
          <tr>
            <td>{{ $category["id"] }}</td>
            <td>
              <a href="{{ route('category.show', ['id'=> $category["id"]]) }}" class="text-decoration-none">
                {{ $category["name"] }}
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection