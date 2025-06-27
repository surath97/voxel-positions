@props(['job'])

<x-panel class="flex flex-col text-center hover:scale-110 transition-transform">
    
    <div class="self-start text-sm">{{ $job->employer->name }}</div>

    <a href="/jobs/{{ $job->id }}">
        <div class="py-8">
            <h3 class="text-xl font-bold group-hover:text-blue-600 transition-colors duration-200">
                {{ $job->title }}
            </h3>
            <p class="text-sm mt-4">{{ $job->schedule }} - {{ $job->salary }}</p>
        </div>
    </a>

    <div class="flex justify-between items-center mt-auto">
        <div>
            @foreach ($job->tags as $tag)

                <x-tag :tag="$tag" size="small" />

            @endforeach
        </div>

        <x-employer-logo :width="42" :employer="$job->employer" />

    </div>
    
</x-panel>