@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form action="{{route('admin.project.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" placeholder="write the title here" name="title" value="{{old('title', '')}}">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">image</label>
                    {{-- <input type="text" class="form-control" id="image" placeholder="insert your image path here" name="image"> --}}
                    <input type="file" class="form-control" id="image" placeholder="insert your image path here" name="image" value="{{old('image', '')}}">
                </div>
                <div class="mb-3">
                    <label for="descritpion" class="form-label">Description</label>
                    <textarea class="form-control" id="description" rows="5" placeholder="insert description" name="description" value="{{old('desciption', '')}}"></textarea>
                </div>

                <div class="mb-3">
                   <button type="submit">
                        Create new Project
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