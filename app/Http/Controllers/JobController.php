<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $featuredJobs = Job::latest()
            ->with(['employer', 'tags'])
            ->get()
            ->groupBy('featured')[1];
        $jobs = Job::query()
            ->with(['employer', 'tags'])
            ->get();

        return view('jobs.index', [
            'featuredJobs' => $featuredJobs,
            'jobs' => $jobs,
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
        // Authorize

        // Validate
        $attributes = $request->validate([
            'title' => ['required'],
            'salary' => ['required'],
            'location' => ['required'],
            'schedule' => ['required', Rule::in(['Full time', 'Part time', 'Contract'])],
            'url' => ['required', 'active_url'],
            'tags' => ['nullable'],
        ]);

        // Execute
        $attributes['featured'] = $request->has('featured');

        $job = Auth::user()->employer->jobs()->create(Arr::except($attributes, ['tags']));

        if ($attributes['tags'] ?? false) {
            foreach (explode(',', $attributes['tags']) as $tag) {
                $job->tag($tag);
            }
        }

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //
    }
}

/*
 http://pixel-position.test/jobs?title=Math+teacher&salary=From+%24100%2C000&location=Winter+Park%2C+Florida&schedule=Part+time&url=https%3A%2F%2Fpixel-position%2F&featured=on&tags=math%2C+hybrid%2C+at
 */
