@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Project Details</h2>

        <form method="POST" action="{{-- route('updateProject', ['id' => $project->id]) --}}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="project_name" class="form-label">Project Name:</label>
                <input type="text" id="project_name" name="project_name" class="form-control" value="{{$project->name}}">
            </div>

            <div class="mb-3">
                <label for="project_detail" class="form-label">Project Description:</label>
                <textarea id="project_detail" name="project_detail" class="form-control">{{$project->detail}}</textarea>
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Project Category:</label>
                <select id="category_id" name="category_id" class="form-control">
                    <option value={{$project->category->id}} hidden selected>{{$project->category->name}}</option>
                    @foreach ($categories as $category)    
                        <option value={{$category->id}}>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Project</button>
        </form>
    </div>
@endsection
