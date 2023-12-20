@extends('layouts.app')

@section('content')
    <div class="container">

        <h2>Project Details</h2>

        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Project Name: {{-- $project->projectName --}}</h5>
                <p class="card-text">Location: {{-- $project->projectLocation --}}</p>
                <p class="card-text">Status: {{-- $project->projectStatus --}}</p>
            </div>
        </div>

        <h3>Evaluators</h3>

       {{-- @if ($project->evaluators->isEmpty())--}}
            <p>No evaluators assigned.</p>
            <a href="{{-- route('assignEvaluator', ['projectId' => $project->id]) --}}" class="btn btn-primary">Assign Evaluator</a>
       {{-- @else--}}
            <ul>
                {{--@foreach ($project->evaluators as $evaluator)
                    <li>{{ $evaluator->name }}</li>
                @endforeach--}}
            </ul>
       {{-- @endif--}}

        <h3>Location</h3>

        <form method="POST" action="{{-- route('updateProjectLocation', ['id' => $project->id]) --}}">
            @csrf
            @method('PUT')

            <div class="mb-3 bg-light">
                <label for="projectLocation">Select Project Location:</label>
                <select id="projectLocation" name="projectLocation" class="form-select" required>
                   {{-- @foreach ($availableLocations as $location)--}}
                        <option value="{{-- $location --}}">{{-- $location --}}</option>
                {{--    @endforeach--}}
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Location</button>
        </form>

        <div class="mt-4">
            <img src="{{ asset('images/map.png') }}" alt="Map Image" class="img-fluid">
        </div>

    </div>
@endsection
