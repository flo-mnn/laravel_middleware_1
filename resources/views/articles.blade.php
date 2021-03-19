@extends('template.main')
@section('content')
    <header class="w-100 bg-primary text-white d-flex justify-content-center align-items-center" style="height: 200px; margin-top: 100px;">
        <h1><em>Browse our articles here</em></h1>
    </header>
    @include('partials.articles_table')
@endsection