@extends('home')
@section('home-content')
<div class="text-right">
    <h1 class="text-primary">Edit the article here</h1>
</div>
<div class="separator rounded bg-primary" style="height: 3px;">
</div>
<div class="container mt-5">
    <form class="border border-primary rounded p-3" action="/articles/{{$article->id}}" method="POST">
        @csrf
        @method('PATCH')
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="form-group">
          <input type="text" class="form-control" placeholder="your title" name="title" value="{{old('title')? old('title') : $article->title}}">
        </div>
        @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 4)
        <div class="form-group">
          <label for="authorSelect">Author</label>
          <select class="form-control" id="authorSelect" name="user_id">
              @foreach ($users as $user)
              @if ($user->role_id != 2)
                @if ($article->users->id == $user->id)
                <option value="{{$user->id}}" selected>{{$user->name}} (#{{$user->id}})</option>
                @else
                <option value="{{$user->id}}">{{$user->name}} (#{{$user->id}})</option>
                @endif
              @endif
              @endforeach
          </select>
        </div>
        @endif
        <div class="form-group">
          <textarea class="form-control" id="content" rows="20" placeholder="Your article here" name="content">{{old('content')? old('content') : $article->content}}</textarea>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary mx-3">Update</button>
        </div>
      </form>
</div>
@endsection