@extends('layouts.app')

@section('content')
    <div class="container">

        <h2>Project Details</h2>

        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Project Name: "$project->name "</h5>
                <p class="card-text">Description: $project->description "</p>
                <p class="card-text">Group Members: " implode(', ', $project->groupMembers->pluck('name')->toArray()) "</p>
                <p class="card-text">Category: " $project->category "</p>
                <p class="card-text">Location: " $project->location "</p>
                <p class="card-text">Status: " $project->status "</p>
            </div>
        </div>

        {{--@if(auth()->check()) 
            @if(auth()->user()->isGuest())--}}
                <h3>Mark Project</h3>

                <form method="POST" action="{{-- route('markProject', ['id' => $project->id]) --}}">
                    @csrf

                    <div class="mb-3 bg-light">
                        <label for="projectMarks">Mark the Project (1 - 10):</label>
                        <input type="number" id="projectMarks" name="projectMarks" class="form-control" min="1" max="10" step="0.5" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit Mark</button>
                </form>
        {{--    @endif
        @endif--}}

    </div>
@endsection
