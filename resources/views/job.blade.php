<x-layout>
    <x-slot:title>
        Job
    </x-slot:title>
    
    <x-slot:heading>
        Job
    </x-slot:heading>

    <h2 class="font-bold text-3xl text-blue-400">{{$job ['title'] }}</h2>
    <h4 class = "font-semibold text-gray-400 mb-3">Posted By:{{$employer['name']}}</h4>
    <p class="text-xl">
        This job pays {{$job['salary']}} per year.
    </p>
</x-layout>
