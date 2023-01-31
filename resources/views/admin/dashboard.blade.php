@extends('layouts.app')


@section('content')

<div class="jumbotron p-5 mb-4 bg-light rounded-3 text-center">

        <h2 class="display-7 fw-bold">
            Hello {{Auth::user()->name}}!
        </h2>
        <p>Welcome to The New Projects</p>

        <a href="{{route('admin.project.index')}}">Lists of Projects</a>


</div>

<div class="row">

    @forelse ($projects as $project)

    <div class="card mb-3 mx-auto" style="width: 18rem;">
        @if (!$project['image_original_name'])
        <img src="{{$project->cover_image= asset($project->cover_image)}}" class="card-img-top" alt="{{$project->name}}">
        @else
        <img src="{{asset('storage/'. $project['cover_image'])}}" class="card-img-top" alt="{{$project->name}}">
        @endif
        <div class="card-body overflow-y-scroll ">
          <h5 class="card-title">{{$project->name}}</h5>
          <p>
              <span class="badge text-bg-danger mb-3">{{$project->type?->name}}</span>
            @foreach ($project->technologies as $technology)
            <span class="badge text-bg-primary">{{$technology->name}}</span>

            @endforeach
          </p>
          <p class="card-title">{{$project->client_name}}</p>
          <p class="card-title">{{$project->type?->name}}</p>
          <a href="{{route('admin.project.show', $project)}}" class="btn btn-primary mb-2">More Info</a>
          <a href="{{route('admin.project.edit', $project)}}" class="btn btn-warning me-2">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>
          <a href="{{route('admin.types.index')}}" class="btn btn-info mb-2">Go To Group List</a>

          <form onsubmit="return confirm('Confermi l\'eliminazione di: {{$project->name}}?')"
          action="{{route('admin.project.destroy', $project)}}" method="POST">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger" type="submit" title="delete">Delete</button>
          </form>

        </div>
      </div>
    @empty

    @endforelse
    {{$projects->links()}}
</div>

@endsection
