@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Welcome, Admin</h1>

        <h2>All Projects</h2>

        @forelse($projects as $project)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $project->projectName }}</h5>
                    <p class="card-text">{{ $project->projectLocation }}</p>
                    <p class="card-text">{{ $project->projectStatus }}</p>
                    <a href="{{ route('admin.projectDetails', ['id' => $project->id]) }}" class="btn btn-primary">View Details</a>
                </div>
            </div>
        @empty
            <p>No projects available.</p>
        @endforelse

        <div class="mt-4">
            <h2>Map</h2>
            <img src="{{ asset('images/map.png') }}" alt="Map Image" class="img-fluid">
        </div>
    </div>
@endsection
