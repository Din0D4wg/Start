<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;
use App\Models\Employer;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function ()  {
    $jobs = Job::with('employer')->get();

    return view ('jobs',[
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/{id}', function ($id)  {
    $job = Job::with('employer')->findOrFail($id);

    return view('job', [
        'job' => $job,
        'employer' => $job->employer,
    ]);

});

Route::get('/contact', function () {
    return view('contact');
});