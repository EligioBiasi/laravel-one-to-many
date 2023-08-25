@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form action="{{route('admin.project.update', $project->id)}}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" placeholder="write the title here" name="title" value="{{ old('title', $project->title)}}">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">image</label>
                    <input type="text" class="form-control" id="image" placeholder="insert your image path here" name="image" value="{{old('image', $project->image)}}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" rows="5" placeholder="insert description" name="description">
                        {{old('description', $project->description)}}
                    </textarea>
                </div>

                <div class="mb-3">
                   <button type="submit">
                        Update
                   </button>

                   <button type="submit">
                        Reset
                   </button>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection