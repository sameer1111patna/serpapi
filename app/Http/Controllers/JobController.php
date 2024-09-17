<?php

namespace App\Http\Controllers;

use App\Services\GoogleJobsService;
use Illuminate\Http\Request;
use App\Exports\SearchResultsExport;
use Maatwebsite\Excel\Facades\Excel;

class JobController extends Controller
{
    protected $googleJobsService;

    public function __construct(GoogleJobsService $googleJobsService)
    {
        $this->googleJobsService = $googleJobsService;
    }

    public function searchJob()
    {
        return view('jobs.form');
    }
    public function index(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);
        $query = $request->input('title');
        $location = $request->input('location');
        
        $jobs = $this->googleJobsService->searchJobs($query, $location);

        $errorMessage = null;
        $results = [];
        if($jobs['error']) {
            $errorMessage = $jobs['error'];
        }
        foreach($jobs['results'] as $key=>$job)
        {
            $results[]=[$job['title'], $job['company_name'], $job['location']];
        }

        $request->session()->put('search_results', $results);

        
    
        // return view('jobs.index', compact('jobs'));
        return view('jobs.index', [
            'jobs' => $jobs,
            'errorMessage' => $errorMessage
        ]);
    
    }

    public function exportCsv(Request $request)
    {

        $results = $request->session()->get('search_results', []);

        return Excel::download(new SearchResultsExport($results), 'joblist.csv');
    }

}
