@extends('layouts.admin')

@section('content')

<div class="container mb-5">
    <h1 class="py-5">Update Comic: {{$project->title}}</h1>

    @if ($errors->any())

    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error )
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>


    @endif

    <form action="{{route('admin.projects.update', $project->slug)}}" method="post" class="card p-3" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control @error('cover_image') is-invalid @enderror" placeholder="" aria-describedby="titleHlper" value="{{old('title', $project->title)}}">
            <small id="titleHlper" class="text-muted">Add the comic title here</small>
        </div>
        @error('title')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror

        <div class="mb-3 d-flex gap-4">
            <img width="140" src="{{ asset('storage/' . $project->cover_image)}}" alt="">
            <div>
                <label for="cover_image" class="form-label">Replace Cover Image</label>
                <input type="file" name="cover_image" id="cover_image" class="form-control  @error('cover_image') is-invalid @enderror" placeholder="" aria-describedby="coverImageHelper">
                <small id="coverImageHelper" class="text-muted">Replace the post cover image</small>
            </div>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="4">{{old('description'), $project->description}}</textarea>
        </div>
        @error('description')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection