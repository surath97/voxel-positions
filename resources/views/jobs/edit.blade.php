<x-layout>

    <x-page-heading>Edit your Job</x-page-heading>

    <x-forms.form method="POST" action="/jobs/{{ $job->id }}" >
        @method('PATCH')

        <x-forms.input label="Job Title" name="title" placeholder="Manager" value="{{ $job->title }}" />
        <x-forms.input label="Salary" name="salary" placeholder="$90,000" value="{{ $job->salary }}" />
        <x-forms.input label="Location" name="location" placeholder="Colombo, Sri Lanka" value="{{ $job->location }}" />

        <x-forms.select label="Work Type" name="schedule" value="{{ $job->schedule }}" >
            <option class="text-black">Part Time</option>
            <option class="text-black">Full Time</option>
        </x-forms.select>

        <x-forms.input label="URL" name="url" placeholder="https://acme.com/ceo-wanted/apply" value="{{ $job->url }}" />

        <x-forms.checkbox label="Featured (cost extra)" name="featured" :chk="$job->featured" />

        <x-forms.divider />

        <x-forms.input label="Tags ( comma seperated )" name="tags" placeholder="manager, production, supply" value="{{ implode(' , ', Arr::pluck($job->tags, 'name')) }}" />
        
        <x-forms.button class="inline-flex items-center gap-x-2" type="submit">
            <x-tni-edit-1 class="size-4" /> Update Job
        </x-forms.button>

    </x-forms.form>

</x-layout>