<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;

class SearchResultsExport implements FromArray
{
    protected $results;

    public function __construct($results)
    {
        $this->results = $results;
    }

    public function array(): array
    {
        return array_merge(
            [['Job Title', 'Company', 'Location']], // Header row
            $this->results
        );
    }
}
