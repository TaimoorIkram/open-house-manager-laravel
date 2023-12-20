@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Welcome, {{-- auth()->user()->name --}}</h1>

        <h2>Project Details</h2>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Project Name: {{$project->name}}</h5>
                <p class="card-text">Description: {{$project->detail}}</p>
                <p class="card-text">Group Member 1: {{$project->member1->name}}</p>
                <p class="card-text">Group Member 2: {{$project->member2 ? $project->member2->name : ''}}</p>
                <p class="card-text">Group Member 3: {{$project->member3 ? $project->member3->name : ''}}</p>
                <p class="card-text">Category: {{$project->category ? $project->category->name : ''}}</p>
                <p class="card-text">Location: {{$project->location ? $project->location->name : ''}}</p>
                <p class="card-text">Status: {{$project->status}}</p>--
                <a href={{route('student.edit.project.detail', ['id' => $project->id])}} class="btn btn-primary">Edit Project</a>
            </div>
        </div>

        <h2>Evaluation Status</h2>

        <div class="card">
            <div class="card-body">
                <p>Total Evaluators: 3</p>
                <p>Evaluators Marked: {{$project->evaluators}}</p>
                <p>Total Marks: {{$project->marks}}</p>
            </div>
        </div>
    </div>
@endsection
