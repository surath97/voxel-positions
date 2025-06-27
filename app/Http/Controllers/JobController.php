<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $jobs = Job::latest()->with(['employer', 'tags'])->get()->groupBy('featured');
        // return $jobs;

        return view('jobs.index', [
            'featuredJobs' => $jobs[1],
            'jobs' => $jobs[0],
            'tags' => Tag::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {

            $attributes = $request->validate([

                'title'     => ['required'],
                'salary'    => ['required'],
                'location'  => ['required'],
                'schedule'  => ['required', Rule::in(['Part Time', 'Full Time'])],
                'url'       => ['required', 'url'],
                'tags'      => ['nullable'],

            ]);

            $attributes['featured'] = $request->has('featured');

            $job = Auth::user()->employer->jobs()->create(Arr::except($attributes, 'tags'));

            // Insert tags
            if ($attributes['tags']) {

                // Tag process
                $tagNames = explode(',', $attributes['tags']);
                $tagNames = array_unique(array_map("trim", $tagNames));

                foreach ($tagNames as $tag) {

                    $job->tag($tag);
                }
            }

        });

        return redirect('/')->with('success', 'Job Created Successfully..!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        return view('jobs.edit', ['job' => $job]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        DB::transaction(function () use ($request, $job) {
            
            $attributes = $request->validate([

                'title'     => ['required'],
                'salary'    => ['required'],
                'location'  => ['required'],
                'schedule'  => ['required', Rule::in(['Part Time', 'Full Time'])],
                'url'       => ['required', 'url'],
                'tags'      => ['nullable'],

            ]);

            $attributes['featured'] = $request->has('featured');

            $job->update(Arr::except($attributes, 'tags'));


            // Tag process
            $tagInput = $request->input('tags', '');
            $tagNames = explode(',', $tagInput);
            $tagNames = array_unique(array_map("trim", $tagNames));
            $tagIDs = [];
            
            // Find or create each tag and collect its ID
            foreach ($tagNames as $tagName) {
                if (!empty($tagName)) {
                    
                    $tag = Tag::firstOrCreate(['name' => $tagName]);
                    $tagIDs[] = $tag->id;
                }
            }

            // Sync the tags with the job
            $job->tags()->sync($tagIDs);

            // dd($tagIDs);   
            
        });

        return redirect('/jobs/' . $job->id)->with('success', 'Job Updated Successfully..!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        $job->delete();

        return redirect('/')->with('success', 'Job Deleted Successfully..!');
    }
}
