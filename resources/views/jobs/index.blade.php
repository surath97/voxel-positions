<x-layout>

    <div class="space-y-10">
        {{-- Section 1 --}}
        <section class="text-center pt-6">
            <h1 class="font-bold text-4xl">Let's Find Your Next Job</h1>

            {{-- <form action="" class="mt-6">
                <input type="text" placeholder="Web Developer..." class="rounded-2xl bg-white/5 border-white/10 px-5 py-4 w-full max-w-xl">
            </form> --}}

            <x-forms.form action="/search" class="mt-6">
                <x-forms.input :label="false" name="q" placeholder="Web Developer..." />
            </x-forms.form>


        </section>

        {{-- Section 2 --}}
        <section class="pt-10">
            <x-section-heading>Featured Jobs</x-section-heading>
            <div class="grid lg:grid-cols-3 gap-8 mt-6">
                @foreach ($featuredJobs as $job)

                    <x-job-card :job="$job" />
                    
                @endforeach
            </div>
        </section>

         {{-- Section 3 --}}
        <section>
            <x-section-heading>Tags</x-section-heading>

            <div class="mt-6 flex flex-wrap gap-3">
                @foreach ($tags as $tag)

                    <x-tag :tag="$tag" />

                @endforeach
            </div>
        </section>

         {{-- Section 4 --}}
        <section>
            <x-section-heading>Recent Jobs</x-section-heading>

            <div class="mt-6 space-y-6">
                @foreach ($jobs as $job)

                    <x-job-card-wide :job="$job" />
                    
                @endforeach
            </div>

        </section>
    </div>

</x-layout>