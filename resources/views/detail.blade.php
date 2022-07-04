@extends('layouts.main')
@section('container')
<article>
       <h4>- Name. ex : {{ $posts["Name"] }}</h4>
       <h4>- Education. ex : {{ $posts["Education"] }}</h4>
       <h4>- Top 5 Skills. ex : {{ $posts["Skills"] }}</h4>
</article>

<a href="/Candidate">Back to Candidate</a>
@endsection