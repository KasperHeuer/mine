@props(['item'])

<x-panel class="flex flex-col text-center">
    <div class="py-8">
        <h3 class="group-hover:text-blue-800 text-xl font-bold transition-colors duration-300">
            {{ $item->name }}
        </h3>

        <p class="text-sm mt-4 text-gray-400">{{ $item->description }}</p>

        @php
            $endDate = \Carbon\Carbon::parse($item->endDate);
            $now = \Carbon\Carbon::now();
            $daysLeft = $now->diffInDays($endDate, false);

            $urgencyClass = 'text-green-500';

            if ($daysLeft <= 0) {
                $urgencyClass = 'text-red-600 font-bold'; // Overdue
            } elseif ($daysLeft < 2) {
                $urgencyClass = 'text-red-500'; // Due today or tomorrow
            } elseif ($daysLeft < 4) {
                $urgencyClass = 'text-orange-500'; // Due within 3 days
            } elseif ($daysLeft < 8) {
                $urgencyClass = 'text-yellow-500'; // Due within a week
            }
        @endphp

        <p class="text-sm mt-5 mb-6 {{ $urgencyClass }} transition-colors duration-300">
            {{ $endDate->translatedFormat('d F Y - H:i') }}
            @if ($daysLeft < 0)
                <span class="block mt-1">(Overdue by {{ floor(abs($daysLeft)) }}
                    {{ Str::plural('day', abs($daysLeft)) }})</span>
            @elseif ($daysLeft == 0)
                <span class="block mt-1">(Due today)</span>
            @elseif ($daysLeft == 1)
                <span class="block mt-1">(Due tomorrow)</span>
            @else
                <span class="block mt-1">({{ floor($daysLeft) }} {{ Str::plural('day', $daysLeft) }} left)</span>
            @endif
        </p>

        <div class="flex">
            <x-forms method="POST" action="{{ route('items.done', $item) }}">
                @csrf
                @method('PATCH')
                <x-forms.button>Done</x-forms.button>
            </x-forms>

            <a href="{{ url('/update/' . $item->id) }}">
                <x-forms.button>Update</x-forms.button>
            </a>
        </div>
    </div>
</x-panel>
