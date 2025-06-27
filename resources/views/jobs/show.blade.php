<x-layout>

    <x-page-heading>Job Description</x-page-heading>

        
    <div class="flex">
        
        <div class="grid grid-cols-4 space-y-8 w-3/5">
            <div class="font-bold text-lg">Job title</div>
            <div class="font-bold text-lg">-</div>
            <div class="font-bold text-lg col-span-2">{{ $job->title }}</div>
            <div class="font-bold text-lg">Salary</div>
            <div class="font-bold text-lg">-</div>
            <div class="font-bold text-lg col-span-2">{{ $job->salary }}</div>
            <div class="font-bold text-lg">Location</div>
            <div class="font-bold text-lg">-</div>
            <div class="font-bold text-lg col-span-2">{{ $job->location }}</div>
            <div class="font-bold text-lg">Work Type</div>
            <div class="font-bold text-lg">-</div>
            <div class="font-bold text-lg col-span-2">{{ $job->schedule }}</div>
            <div class="font-bold text-lg">Job page</div>
            <div class="font-bold text-lg">-</div>
            <div class="font-bold text-lg col-span-2"><a href="{{ $job->url }}" target="_blank" class="text-blue-400 flex items-center gap-x-1.5 hover:underline hover:scale-110 duration-300">Click to visit job page <x-tni-direction class="size-4" /></a></div>
            {{-- <div class="font-bold text-lg">Posted by</div>
            <div class="font-bold text-lg">-</div>
            <div class="font-bold text-lg col-span-2">{{ $job->employer->name }}</div> --}}
            <div class="font-bold text-lg">Tags</div>
            <div class="font-bold text-lg">-</div>
            <div class="font-bold col-span-2">
                @foreach ($job->tags as $tag)

                    <x-tag :tag="$tag" size="small" />

                @endforeach
            </div>
        </div>

        <div class="w-2/5 bg-white dark:bg-gray-800 rounded-lg px-6 py-8 ring shadow-xl ring-gray-900/5">
            <div>
                <span class="inline-flex items-center justify-center rounded-xl bg-indigo-500 p-0.5 shadow-lg">
                    <x-employer-logo :width="120" :employer="$job->employer" />
                </span>
            </div>
            <h3 class="text-gray-900 dark:text-white mt-5 text-base font-medium tracking-tight ">{{ $job->employer->name }}</h3>
            <p class="text-gray-500 dark:text-gray-400 mt-2 text-sm ">The Zero Gravity Pen can be used to write in any orientation, including upside-down. It even works in outer space.</p>

            @can('edit', $job)

                <div class="flex mt-5 justify-between">
                    <form action="/jobs/{{ $job->id }}/edit" method="get">
                        <x-forms.button class="inline-flex items-center gap-x-2">
                            <x-tni-edit-1 class="size-4" /> Edit Job
                        </x-forms.button>
                    </form>

                    <form method="POST" action="/jobs/{{ $job->id }}">
                        @csrf
                        @method('DELETE')
                        <x-forms.button class="inline-flex items-center gap-x-2 bg-red-800 hover:bg-red-900" type="submit">
                            <x-tni-bin class="size-4" /> Delete Job
                        </x-forms.button>
                    </form>
                </div>

            @endcan

        </div>

    </div>

    <x-forms.divider />

    <div class="mt-10">
        <x-section-heading>Other jobs from this employer</x-section-heading>
        <div class="mt-6 space-y-6">
            @foreach ($job->employer->jobs as $job_arr)
                @if ($job_arr->id !== $job->id)
                    <x-job-card-wide :job="$job_arr" />
                @endif
            @endforeach
        </div>
    </div>


</x-layout>