<x-layout>

    <x-page-heading>Search Results : {{ $q }}</x-page-heading>

    <div class="space-y-6">
        @foreach ($jobs as $job)

            <x-job-card-wide :job="$job" />
            
        @endforeach
    </div>

</x-layout>