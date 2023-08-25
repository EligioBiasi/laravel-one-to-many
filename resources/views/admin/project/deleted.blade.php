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
                    @foreach ($project as $singleProject)
                    <tr>
                      <th>
                        {{$singleProject->id}}
                      </th>
                      <td>
                        {{$singleProject->title}}
                      </td>
                      <td>
                        {{$singleProject->slug}}
                      </td>
                      <td>
                        <form class="d-inline-block me-2" action="{{ route('admin.project.restore', $singleProject->id) }}" method="POST">
                          @csrf
                          @method('POST')

                          <button type="submit" class="btn btn-sm btn-warning">
                              Restore
                          </button>
                      </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
            </table>
            {{$project->links()}}
        </div>
    </div>
</div>
@endsection