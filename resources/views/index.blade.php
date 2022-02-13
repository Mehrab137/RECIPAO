@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Today's Recipe</h1>

    <div class="row mt-5" style="margin-bottom: 120px">

        @foreach ($posts as $post)
        <div class="col-4 p-4 bg-dark text-white">
            <h2 class="text-center">{{ $post->title }}</h2>
            <span class="text-center">by <i>{{ $post->user->name }}</i> on {{ date('d M, Y', strtotime($post->updated_at)) }}</span>
            <p class="mt-2 p-2">{{ $post->description }}</p><span><a class="btn btn-secondary" href="">Read More</a></span>
        </div>
        @endforeach

    </div>
</div>

@endsection