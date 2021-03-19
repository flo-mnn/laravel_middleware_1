@extends('layouts.app')

@section('content')
<div class="p-5">
    <div class="row justify-content-center">
        <div class="col-md-3 bg-primary text-light font-weight-bold" style="height: 100vh; position: fixed; top: 0; left: 0; padding-top: 100px;">
            @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h5 class="text-right mx-3">Welcome <span class="text-capitalize">{{Auth::user()->name}}</span></h5>
                    <div class="px-3">
                        <a href="{{route('articles.create')}}" class="btn btn-light text-primary font-weight-bold my-2">Add an article +</a><br>
                        <a href="{{route('articles.index')}}" class="btn btn-primary  font-weight-bold my-2">Articles</a><br>
                        <a href="{{route('users.index')}}" class="btn btn-primary font-weight-bold my-2">Users</a><br>
                    </div>
        </div>
        {{-- col intermediaire pour repousser l'autre --}}
        <div class="col-md-3" style="z-index: -2"></div>
        <div class="col-md-9">
            @if (Route::getCurrentRoute()->uri() == "home")
            <h1 class="text-primary">Welcome to your back office <span class="text-capitalize">{{Auth::user()->name}}</span>!</h1>
            <p>Please navigate here on the left to manage your website</p>
            @else
            @yield('home-content')
            @endif
        </div>
    </div>
</div>

@endsection
