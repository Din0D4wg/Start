<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;
use App\Models\Employer;

Route::get('/', function () {
    return view('home');
});

//Job View - Retrieves the jobs
Route::get('/jobs', function ()  {
    $jobs = Job::with('employer')->latest()->paginate(10);
    return view ('jobs.index',[ 'jobs' => $jobs]);
});

//Retrieves the file to CREATE a NEW job
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

//STORE or POSTS the newly created job
Route::post('/jobs', function() {
    request()->validate([
        'title' => ['required', 'min: 3'],
        'salary' => ['required', ],
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1,
    ]);

    return redirect ('/jobs');
});

//EDIT the job
Route::get('/jobs/{id}/edit', function ($id)  {
    $job = Job::with('employer')->findOrFail($id);
    return view('jobs.edit', ['job' => $job]);
});

//STORES the UPDATED job
Route::patch('/jobs/{id}', function ($id)  {
    //validate
    request()->validate([
        'title' => ['required', 'min: 3'],
        'salary' => ['required', ],
    ]);

    //authorize

    //update the job
    $job = Job::findOrFail($id);
    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);

    //redirect to job page
    return redirect('/jobs/'. $job->id);

});

//DESTROY the job
Route::delete('/jobs/{id}', function ($id)  {
    //authorize

    //delete the job
    Job::findOrFail($id)->delete();
    
    //redirect  
    return redirect('/jobs');

});

//SHOWS the individual jobs in the Jobs view
Route::get('/jobs/{id}', function ($id)  {
    $job = Job::with('employer')->findOrFail($id);
    return view('jobs.show', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});