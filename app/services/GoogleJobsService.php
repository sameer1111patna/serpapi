<?php

namespace App\Services;

use GuzzleHttp\Client;

class GoogleJobsService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = config('services.serpapi.api_key');
    }

    public function searchJobs($query, $location)
    {

        try {
            $searchQuery = $query . ' ' . $location;

            $response = $this->client->get('https://serpapi.com/search.json', [
                'query' => [
                    'engine' => 'google_jobs',
                    'q' => $searchQuery, 
                    'hl' => 'en',
                    'api_key' => $this->apiKey
                ]
            ]);
            
            $data = json_decode($response->getBody(), true);
            return ['results' => $data['jobs_results'] ?? [], 'error' => null];
        } catch (\Exception $e) {
            // Log the error message
            \Log::error('ValueSERP API error: ' . $e->getMessage());
            return ['results' => [], 'error' => 'An error occurred while fetching the search results. Please try again later.'];
        }

    }
}
