@props(['job'])

<x-panel class="flex flex-col text-center">
    
    <div class="self-start text-sm">{{ $job->employer->name }}</div>

    <div class="py-8">
        <h3 class="text-xl font-bold group-hover:text-blue-600 transition-colors duration-200">
            <a href="{{ $job->url }}" target="_blank">
                {{ $job->title }}
            </a>
        </h3>
        <p class="text-sm mt-4">{{ $job->schedule }} - {{ $job->salary }}</p>
    </div>

    <div class="flex justify-between items-center mt-auto">
        <div>
            @foreach ($job->tags as $tag)

                <x-tag :tag="$tag" size="small" />

            @endforeach
        </div>

        <x-employer-logo :width="42" />

    </div>
    
</x-panel>