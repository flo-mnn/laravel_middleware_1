<div class="text-right mb-3">
    <h1 class="text-primary">{{$article->title}}</h1>
    <p class="text-muted">written by <span class="text-primary text-capitalize">{{$article->users->name}}</span></p>
        @if (Route::currentRouteName() != 'articles.read')
        <a href="/articles/{{$article->id}}/edit" class="btn btn-warning">edit</a>
        @endif
</div>
<div class="separator rounded bg-primary" style="height: 3px;">
</div>
<div class="container mt-3">
    <p>{{$article->content}}</p>
</div>