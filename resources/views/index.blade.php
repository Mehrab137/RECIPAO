@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Today's Recipes</h1>

    <div class="row mt-5" style="margin-bottom: 120px">

        @foreach ($posts as $post)
        {{-- <div class="col-4 p-4 bg-dark text-white">
            <h2 class="text-center">{{ $post->title }}</h2>
            <span class="text-center">by <i>{{ $post->user->name }}</i> on {{ date('d M, Y', strtotime($post->updated_at)) }}</span>
            <p class="mt-2 p-2">{{ $post->description }}</p><span><a class="btn btn-secondary" href="">Read More</a></span>
        </div> --}}
        <div class="col-lg-4">
            <div class="card bg-dark text-white" style="width: 24rem; height: 18rem">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">by <i>{{ $post->user->name }}</i> on {{ date('d M, Y', strtotime($post->updated_at)) }}</h6>
                    <p class="card-text bg-dark text-white p-3">{{ $post->description }}</p>
                    <span><a href="#" class="btn btn-secondary">Read More</a></span>
                </div>
            </div>
        </div>

         @endforeach 

@endsection