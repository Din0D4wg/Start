<x-layout>
    <x-slot:title>
        Job Listing
    </x-slot:title>
    
    <x-slot:heading>
        Job Listing Page
    </x-slot:heading>

    <h1 class=" text-4xl font-bold text-red-600">Welcome to the Job Listing Page.</h1>

    <div class="space-y-4">
        @foreach($jobs as $job)
            <a>
                <a href="/jobs/{{$job['id']}}" class=" block px-4 py-6 border border-gray-300 rounded-lg">
                    <div class="font-bold text-blue-500 text-sm">{{$job->employer->name}}</div>
                    <div>
                        <strong>{{$job ['title']}}</strong>: Pays {{$job ['salary']}} per year.
                    </div>
                </a>
            </a>  
        @endforeach
    </div>

</x-layout>
