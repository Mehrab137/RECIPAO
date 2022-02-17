@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Today's Recipes</h1>

    <div class="row mt-5">

        @foreach ($posts as $post)

        <div class="col-lg-4">
            <div class="card text-center" style="width: 18rem;">
                <img src="{{ asset('images/' . $post->image_path) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">by <i>{{ $post->user->name }}</i> on {{ date('d M, Y', strtotime($post->updated_at)) }}</h6>
                    <p class="card-text p-2">{{ Str::limit($post->description, 150) }}</p>
                    <a href="#" class="btn btn-secondary">Read More</a>
                </div>
            </div>
        </div>

         @endforeach 

    </div>
</div>

@endsection