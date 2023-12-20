@extends('layouts.app')

@section('content')
    <div class="container">
        @if(auth()->check())
            <h1>Welcome, {{-- auth()->user()->name --}}</h1>
        @else
            <h1>Welcome, Guest</h1>
        @endif

        <h2>Assigned Projects</h2>

       {{-- @forelse($assignedProjects as $project)--}}
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Title:{{-- $project->name --}}</h5>
                    <p class="card-text">Location{{-- $project->projectLocation --}}</p>
                    <p class="card-text">Marks: {{-- $project->projectMarks --}}</p>
                    <a href="{{-- route('project.show', ['id' => $project->id]) --}}" class="btn btn-primary">View Project</a>
                </div>
            </div>
        {{--@empty--}}
            <p>Projects have not yet been assigned</p>
        {{--@endforelse--}}

        <form method="POST" action="" class="mt-4">
            @csrf

            <div class="mb-3 bg-light">
                <h3>Select Project Category Preference</h3>

                <label for="category1">Select Category Preference 1:</label>
                <select id="category1" name="category1" class="form-select">
                    <option value="naturalLanguageProcessing_pref1">Natural Language Processing</option>
                    <option value="computerVision_pref1">Computer Vision</option>
                    <option value="gameDevelopment_pref1">Game Development</option>
                    <option value="computerArchitecture_pref1">Computer Architecture</option>
                    <option value="dataScience_pref1">Data Science and Big Data</option>
                    <option value="computerNetworks_pref1">Computer Networks</option>
                    <option value="softwareEngineering_pref1">Software Engineering</option>
                    <option value="embeddedSystems_pref1">Embedded Systems and IoT</option>
                    <option value="digitalSignalProcessing_pref1">Digital Signal Processing</option>
                    <option value="cloudComputing_pref1">Cloud Computing</option>
                    <option value="biomedicalEngineering_pref1">Biomedical Engineering</option>
                </select>

                <label for="category2">Select Category Preference 2:</label>
                <select id="category2" name="category2" class="form-select">
                    <option value="naturalLanguageProcessing_pref2">Natural Language Processing</option>
                    <option value="computerVision_pref2">Computer Vision</option>
                    <option value="gameDevelopment_pref2">Game Development</option>
                    <option value="computerArchitecture_pref2">Computer Architecture</option>
                    <option value="dataScience_pref2">Data Science and Big Data</option>
                    <option value="computerNetworks_pref2">Computer Networks</option>
                    <option value="softwareEngineering_pref2">Software Engineering</option>
                    <option value="embeddedSystems_pref2">Embedded Systems and IoT</option>
                    <option value="digitalSignalProcessing_pref2">Digital Signal Processing</option>
                    <option value="cloudComputing_pref2">Cloud Computing</option>
                    <option value="biomedicalEngineering_pref2">Biomedical Engineering</option>
                </select>
            </div>
    
            <div class="mb-3 bg-light">
                <h3>Select Speciality</h3>

                <label for="specialty">Select Specialty:</label>
                <select id="specialty" name="specialty" class="form-select">
                    <option value="electronics_specialty">Electronics</option>
                    <option value="digitalsystems_speciality">Digital Systems</option>
                    <option value="databaseSystems_speciality">Database Systems</option>
                    <option value="dataScience_speciality">Data Science</option>
                    <option value="cybersecurity_speciality">Cybersecurity</option>
                    <option value="computerNetwors_speciality">Computer Networks</option>
                    <option value="softwareEngineering_speciality">Softwaer Engineering</option>
                    <option value="computerVision_speciality">Computer Vision</option>
                    <option value="cloudComputing_speciality">Cloud Computing</option>
                    <option value="webDevelopment_speciality">Web Development</option>
                    <option value="embeddedSystems_speciality">Embedded Systems</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Preferences</button>
        </form>
    </div>
@endsection
