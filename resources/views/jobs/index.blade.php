@extends('layouts.app')
@section('content')
<h1>Job Listings</h1>
@if ($errorMessage)
        <div style="color: red;">
            <strong>Error:</strong> {{ $errorMessage }}
        </div>
@endif
@if (count($jobs['results']) > 0)
<div class="col-2 mb-2 float-right">
        <form action="{{ route('jobs.export') }}" method="POST">
            @csrf
            <button type="submit"class="btn btn-success">Export to CSV</button>
        </form>
</div>
<table id="customers">
  <tr>
    <th>Job Tilte</th>
    <th>Company</th>
    <th>Location</th>
  </tr>
  @foreach($jobs['results'] as $job)
  <tr>
    <td>{{ $job['title'] }}</td>
    <td>{{ $job['company_name'] }}</td>
    <td> {{ $job['location'] }}</td>
  </tr>

    <!-- <li>No jobs found.</li> -->
  @endforeach
  @else
        <p>No results found.</p>
  @endif


</table>
@endsection