@extends('candidate.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Lists Candidate</h1>
  </div>

  @if (session()->has('success'))
  <div class="alert alert-success" role="alert">
    {{ session('success') }}
  </div>
      
  @endif

  <div class="table-responsive">
    <a href="{{ (auth()->user()->status  === "Senior HRD") ? '/candidate/candidates/create' : '' }}" class="{{ (auth()->user()->status  === "Senior HRD") ? 'btn btn-primary mb-3' : '' }}">
      {{ (auth()->user()->status  === "Senior HRD") ? 'Create Candidate' : '' }} </a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Name</th>
          <th scope="col">Education</th>
          <th scope="col">Birthday</th>
          <th scope="col">Experience</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($lists as $l)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $l->name }}</td>
            <td>{{ $l->education }}</td>
            <td>{{ $l->birthday }}</td>
            <td>{{ $l->experience }}</td>
            <td>
                <a href="/candidate/candidates/{{ $l->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
                <a href="/candidate/candidates/{{ $l->id }}/edit" class="{{ (auth()->user()->status  === "Senior HRD") ? 'badge bg-warning' : '' }}"><span data-feather="{{ (auth()->user()->status  === "Senior HRD") ? 'edit' : '' }}"></span></a>
                <form action="/candidate/candidates/{{ $l->id }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="{{ (auth()->user()->status  === "Senior HRD") ? 'badge bg-danger border-0' : '' }} " onclick="return confirm('Are You Sure?')"><span data-feather="{{ (auth()->user()->status  === "Senior HRD") ? 'x-circle' : '' }}"></span></button>
                </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection