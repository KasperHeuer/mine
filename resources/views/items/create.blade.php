<x-layout>
    <x-heading>Create new TODO</x-heading>
    <x-forms method="POST" action="/items">
        <x-forms.input label="Name" name="name" />
        <x-forms.input label="Description" name="description" />
        <x-forms.input label="EndDate" name="enddate" type="datetime-local" />

        <x-forms.button>
            New Todo
        </x-forms.button>
    </x-forms>
</x-layout>
