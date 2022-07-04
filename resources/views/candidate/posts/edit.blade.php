@extends('candidate.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Candidate</h1>
  </div>

  <div class="col-lg-6">
    <form method="post" action="/candidate/candidates/{{ $candidate->id}}">
      @method('put')
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">name</label>
          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" autofocus required 
          value="{{ old('name', $candidate->name) }}">
          @error('name')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="education" class="form-label">education</label>
          <input type="text" name="education" class="form-control" id="education" required 
          value="{{ old('education', $candidate->education) }}">
        </div>
        <div class="mb-3">
          <label for="birthday" class="form-label">birthday</label>
          <input type="date" name="birthday" class="form-control" id="birthday" required 
          value="{{ old('birthday', $candidate->birthday) }}">
        </div>
        <div class="mb-3">
          <label for="experience" class="form-label">experience</label>
          <input type="text" name="experience" class="form-control" id="experience" required 
          value="{{ old('experience', $candidate->experience) }}">
        </div>
        <div class="mb-3">
          <label for="Last Position" class="form-label">Last Position</label>
          <input type="text" name="last_position" class="form-control" id="last_position" required 
          value="{{ old('last_position', $candidate->last_position) }}">
        </div>
        <div class="mb-3">
          <label for="Applied Position" class="form-label">Applied Position</label>
          <input type="text" name="applied_position" class="form-control" id="applied_position" required 
          value="{{ old('applied_position', $candidate->applied_position) }}">
        </div>
        <div class="mb-3">
          <label for="Skills" class="form-label">Top 5 Skills</label>
          <input type="text" name="skills" class="form-control" id="skills" required 
          value="{{ old('skills', $candidate->skills) }}">
        </div>
        <div class="mb-3">
          <label for="Email" class="form-label">Email</label>
          <input type="text" name="email" class="form-control" id="email" required 
          value="{{ old('email', $candidate->email) }}">
        </div>
        <div class="mb-3">
          <label for="phone" class="form-label">Phone</label>
          <input type="text" name="phone" class="form-control" id="phone" required 
          value="{{ old('phone', $candidate->phone) }}">
        </div>
        <div class="mb-3">
          <label for="Resume" class="form-label">Resume</label>
          <input class="form-control form-control-sm" name="resume" id="formFileSm" type="file" required 
          value="{{ old('resume') }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
  </div>

  <script>
      const name = document.querySelector('#name');
      const slug = document.querySelector('#slug');

    name.addEventListener('change'. function () {
    fetch('/candidate/posts/checkSlug?name=' + name.value')
    .then(response => response.json())
    .then(data => slug.value = data.slug)
});
  </script>
  

  @endsection