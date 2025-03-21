<x-layout>
    <x-heading>Update</x-heading>
    <x-forms method="POST" action="{{ route('item.update', $items->id) }}">

        @csrf
        @method('POST')

        <x-forms.input label="Name" name="name" value="{{ old('name', $items->name) }}" />
        <x-forms.input label="Description" name="description" value="{{ old('description', $items->description) }}" />
        <x-forms.input label="End Date" name="endDate" type="datetime-local"
            value="{{ old('endDate', $items->endDate) }}" />

        <x-forms.button>
            Update product
        </x-forms.button>
    </x-forms>
</x-layout>
