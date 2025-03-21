@props(['item'])

<x-panel class="flex flex-col text-center">
    <div class="py-8">
        <h3 class="text-gray-400 text-xl font-bold transition-colors duration-300 line-through">
            {{ $item->name }}
        </h3>

        <p class="text-sm mt-4 text-gray-500">{{ $item->description }}</p>

        <p class="text-sm mt-5 mb-6 text-gray-500">
            {{ \Carbon\Carbon::parse($item->endDate)->translatedFormat('d F Y - H:i') }}
        </p>

        <div class="flex justify-center">
            <form method="POST" action="{{ route('items.destroy', $item) }}">
                @csrf
                @method('DELETE')
                <x-forms.button type="submit" class="bg-red-600 hover:bg-red-500">Delete</x-forms.button>
            </form>
        </div>
    </div>
</x-panel>
