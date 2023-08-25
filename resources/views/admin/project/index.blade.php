@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table table-bordered border-primary">
                <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Title</th>
                      <th scope="col">slug</th>
                      <th scope="col">Edit</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($projects as $project)
                    <tr>
                      <th>
                        {{$project->id}}
                      </th>
                      <td>
                        {{$project->title}}
                      </td>
                      <td>
                        {{$project->slug}}
                      </td>
                      <td>
                        <a href="" class="btn btn-sm btn-success">View</a>
                        <a href="" class="btn btn-sm btn-warning">Modify</a>
                        <form action="{{route('admin.project.destroy', $project)}}" class="d-inline-block" method="POST">
                          @csrf
                          @method('DELETE')
      
                          <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
            </table>
            {{$projects->links()}}
        </div>
    </div>
</div>
@endsection