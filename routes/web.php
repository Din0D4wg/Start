<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;
use App\Models\Employer;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function ()  {
    return view ('jobs',[ 
        'jobs' => Job::all()
    ]);
});

Route::get('/jobs/{id}', function ($id)  {
    $job = Job::findOrFail($id);
    $employer=$job->employer;
    return view('job', 
    ['job' => $job,
            'employer' => $employer]);
});

Route::get('/contact', function () {
    return view('contact');
});