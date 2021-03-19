@extends('home')
@section('home-content')
<div class="text-right">
    <h1 class="text-primary">View and manage articles here</h1>
</div>
<div class="separator rounded bg-primary" style="height: 3px;">
</div>
<div class="container">
    <table class="table table-striped table-primary">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Extract</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($articles as $article)
          <tr>
            <th scope="row">{{$article->id}} <span class="text-primary font-weight-bold">{{Auth::user()->role_id == $article->users->id ? '*' : null}}</span></th>
            <td>{{$article->title}}</td>
            <td>{{$article->users->name}}</td>
            <td>{{Str::words($article->content, 10, ' >>>')}}</td>
            <td><a href="/articles/{{$article->id}}" class="btn btn-primary">read</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
</div>
@endsection