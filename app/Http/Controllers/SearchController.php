<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // dd($request->q);

        $jobs = Job::query()
                ->with(['employer', 'tags'])
                ->where('title', 'LIKE', '%'. request('q') .'%')
                ->get();

        // return $jobs;

        return view('results', [ 
            'jobs' => $jobs,
            'q' => $request->q,
        ]);
    }
}
