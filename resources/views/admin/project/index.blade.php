@extends('layouts.app')

@section('content')
<div class="w-100 text-center mb-5">

    <a class="btn btn-primary" href="{{route('admin.project.create')}}">Create New Project</a>
</div>

<table class="table">
    <thead>
      <tr>
        <th scope="col">
           <a href="{{route('admin.project.orderby',['id','direction'])}}">#</a>
        </th>
        <th scope="col">Project Name</th>
        <th scope="col">Client Name</th>
        <th scope="col">Type</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($projects as $project)

        <tr>
          <td>{{$project->id}}</td>
          <td>
            {{$project->name}}
            @forelse ($project->technologies as $technology)
                    <span class="badge text-bg-primary">{{$technology->name}}</span>
            @empty

            @endforelse
          </td>
          <td>{{$project->client_name}}</td>
          <td>{{$project->type?->name}}</td>
          <td class="d-flex">
            <a href="{{route('admin.project.show', $project)}}" class="btn btn-primary me-2">
                <i class="fa-solid fa-circle-info"></i>
            </a>
            <a href="{{route('admin.project.edit', $project)}}" class="btn btn-info me-2">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>

            <form onsubmit="return confirm('Confermi l\'eliminazione di: {{$project->name}}?')"
              action="{{route('admin.project.destroy', $project)}}" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger" type="submit" title="delete"><i class="fa-solid fa-delete-left"></i></button>
              </form>
          </td>
        </tr>
        @empty
        <h2>No results were found</h2>
        @endforelse
    </tbody>
  </table>
  {{$projects->links()}}


@endsection
