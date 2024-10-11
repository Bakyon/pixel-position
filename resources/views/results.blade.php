<x-layout>
    <x-page-heading>Search Results</x-page-heading>

    <div class="space-y-5 mt-6">
        @foreach($jobs as $job)
            <x-job-card-wide :$job />
        @endforeach
    </div>
</x-layout>
