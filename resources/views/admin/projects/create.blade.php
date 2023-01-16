@extends('layouts.admin')

@section('content')
<h1>Create a new Project</h1>

@if ($errors->any())

<div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $error )
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>


@endif

<form action="{{route('admin.projects.store')}}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" id="title" class="form-control  @error('title') is-invalid @enderror" placeholder="learn larevel auth" aria-describedby="titleHelper">
        <small id="titleHelper" class="text-muted">Add a title for the current project, max 100 characters, it must be unique!</small>
    </div>
    @error('title')
    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div>
    @enderror

    <div class="mb-3">
        <label for="cover_image" class="form-label">Cover Image</label>
        <input type="file" name="cover_image" id="cover_image" class="form-control  @error('cover_image') is-invalid @enderror" placeholder="" aria-describedby="coverImageHelper">
        <small id="coverImageHelper" class="text-muted">Add your cover image</small>
    </div>
    @error('cover_image')
    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div>
    @enderror

    <div class="mb-3">
        <label for="description" class="form-label"></label>
        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="3"></textarea>
    </div>
    @error('description')
    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div>
    @enderror

    <button type="submit" class="btn btn-primary">Create</button>
</form>

@endsection