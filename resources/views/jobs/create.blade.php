<x-layout>
    <x-page-heading>Make a new Job</x-page-heading>

    <x-forms.form method="POST" action="/jobs">
        <x-forms.input label="Title" name="title" placeholder="Math Teacher..."/>
        <x-forms.input label="Salary" name="salary" placeholder="From $100,000"/>
        <x-forms.input label="Location" name="location" placeholder="Winter Park, Florida"/>

        <x-forms.select label="Schedule" name="schedule">
            <option>Full time</option>
            <option>Part time</option>
            <option>Contract</option>
        </x-forms.select>

        <x-forms.input label="URL" name="url" placeholder="https://acme.com/jobs/teacher-wanted"/>
        <x-forms.checkbox label="Feature (extra cost)" name="featured"/>

        <x-forms.divider/>

        <x-forms.input label="Tags (comma seperated)" name="tags" placeholder="Math, Physics, Hybrid"/>

        <x-forms.divider/>

        <x-forms.button>Publish</x-forms.button>
    </x-forms.form>
</x-layout>
