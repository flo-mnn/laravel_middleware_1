@extends('home')
@section('home-content')
<div class="text-right">
    <h1 class="text-primary">View and manage articles here</h1>
</div>
<div class="separator rounded bg-primary" style="height: 3px;">
</div>
@include('partials.articles_table')
@endsection