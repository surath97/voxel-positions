<x-layout>

    <x-page-heading>Create New Job</x-page-heading>

    <x-forms.form method="POST" action="/jobs">

        <x-forms.input label="Job Title" name="title" placeholder="Manager" />
        <x-forms.input label="Salary" name="salary" placeholder="$90,000" />
        <x-forms.input label="Location" name="location" placeholder="Colombo, Sri Lanka" />

        <x-forms.select label="Schedule" name="schedule">
            <option class="text-black">Part Time</option>
            <option class="text-black">Full Time</option>
        </x-forms.select>

        <x-forms.input label="URL" name="url" placeholder="https://acme.com/ceo-wanted/apply" />

        <x-forms.checkbox label="Featured (cost extra)" name="featured" />

        <x-forms.divider />

        <x-forms.input label="Tags ( comma seperated )" name="tags" placeholder="manager, production, supply" />
        
        <x-forms.button type="submit">Publish</x-forms.button>

    </x-forms.form>

</x-layout>