<x-layout>
    <x-slot:title>
        Job Listing
    </x-slot:title>
    
    <x-slot:heading>
        Job Listing Page
    </x-slot:heading>

    <h1 class=" text-4xl font-bold text-red-600">Welcome to the Job Listing Page.</h1>

    <ul>
        @foreach($jobs as $job)
            <li>
                <a href="/jobs/{{$job['id']}}" class="hover:underline">
                    <strong>{{$job ['title']}}</strong>: Pays {{$job ['salary']}} per year.
                </a>
            </li>  
        @endforeach
    </ul>

</x-layout>
