<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;
use App\Models\Employer;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function ()  {
    $jobs = Job::with('employer')->latest()->paginate(10);
    return view ('jobs.index',[ 'jobs' => $jobs]);
});

Route::get('/jobs/create', function () {
    return view('jobs.create');
});

Route::post('/jobs', function() {
    //Validation

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1,
    ]);

    return redirect ('/jobs');
});

Route::get('/jobs/{id}', function ($id)  {
    $job = Job::with('employer')->findOrFail($id);
    return view('jobs.show', [
        'job' => $job,
        'employer' => $job->employer,]);
});

Route::get('/contact', function () {
    return view('contact');
});