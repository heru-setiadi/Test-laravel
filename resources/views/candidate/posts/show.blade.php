@extends('candidate.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Detail Candidate</h1>
  </div>

  <div class="col-lg-6">
    <p class="font-monospace">Name: {{ $candidate->name }}</p>
    <p class="font-monospace">Education: {{ $candidate->education }}</p>
    <p class="font-monospace">birthday: {{ $candidate->birthday }}</p>
    <p class="font-monospace">Experience: {{ $candidate->experience }}</p>
    <p class="font-monospace">Last Position: {{ $candidate->last_position }}</p>
    <p class="font-monospace">Applied Position: {{ $candidate->applied_position }}</p>
    <p class="font-monospace">Top 5 Skills: {{ $candidate->skills }}</p>
    <p class="font-monospace">Email: {{ $candidate->email }}</p>
    <p class="font-monospace">phone: {{ $candidate->phone }}</p>
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