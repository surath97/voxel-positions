@props(['job'])

<x-panel class="flex gap-x-6">

    <div>
        <x-employer-logo :employer="$job->employer" />
    </div>
    
    <div class="flex-1 flex flex-col">
        <a href="/jobs/{{ $job->id }}" target="_blank">
            <p class="self-start text-sm text-gray-400">{{ $job->employer->name }}</p>
        
            <h3 class="font-bold text-xl mt-3 group-hover:text-blue-600 transition-colors duration-300">
                {{ $job->title }}
            </h3>
            <p class="text-sm text-gray-400 mt-auto">{{ $job->schedule }} - from {{ $job->salary }}</p>
        </a>
    </div>
    

    <div>
        @foreach ($job->tags as $tag)

            <x-tag :tag="$tag" />

        @endforeach
    </div>
    
</x-panel>