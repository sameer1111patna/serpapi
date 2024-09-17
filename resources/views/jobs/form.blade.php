@extends('layouts.app')
@section('content')
<div class="container">
        <h1>Job Search</h1>
        <form action="{{ url('/jobs/list') }}" method="POST">
          @csrf
            <label for="title">Job Title:</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" onkeyup="validateJobTitle()"placeholder="Enter job title">
            <span id="jobMessage">
            @if ($errors->has('title'))
            
                @foreach ($errors->get('title') as $error)
                    <p class="alert alert-danger mt-2">{{ $error }}</p>
                @endforeach
           
            @endif
            </span>
            <label for="location">Location:</label>
            <input type="text" id="location" name="location"onkeyup="validatelocation()" placeholder="Enter location">
            <span id="locationMessage">
           
                @foreach ($errors->get('location') as $error)
                    <p class="alert alert-danger mt-2">{{ $error }}</p>
                @endforeach
           
            </span>
            <button type="submit"class="btn btn-success">Search</button>
        </form>
    </div>
@endsection
