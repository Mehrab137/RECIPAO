@extends('layouts.app')

@section('content')

<div class="container">
    <h1>My Recipes</h1>
    <button class="btn btn-secondary bg-gradient mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus" aria-hidden="true"></i> ADD NEW RECIPE</button>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Recipe</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row p-4">
                        <form action="{{ route('post.submit.recipe') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="title">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" placeholder="description"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Upload Image</label>
                                <input class="form-control" name="image" type="file" id="formFile">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">POST</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    
                </div>
            </div>
        </div>
    </div>

    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> {{ session()->get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
    @endif

    <div class="row mt-5" style="margin-bottom: 120px">

        @foreach ($posts as $post)
        <div class="card mb-3 border-dark mt-2" style="max-width: 60rem;">
            <div class="row g-0">
                @if ($post == null)
                    <h2 class="text-red">You have not created any recipes yet! Create now!</h2>
                @else
                    <div class="col-md-4">
                        <img src="{{ asset('images/' . $post->image_path) }}" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ $post->description }} <span class="btn btn-sm btn-secondary-outline"><i>Read More</i></span></p>
                            <p class="card-text"><small class="text-muted">Created {{ \Carbon\Carbon::parse($post->updated_at)->diffForHumans() }}</small></p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="d-grid d-md-flex justify-content-md-end">
            <div class="btn-group-vertical" role="group">
                <button type="button" class="btn btn-danger btn-sm">Delete</button>
                <button type="button" class="btn btn-warning btn-sm">Edit</button>
            </div>   
        </div>
        @endforeach
    </div>
</div>


@endsection