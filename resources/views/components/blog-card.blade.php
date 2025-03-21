@props(['post', 'id'])

<x-panel class="flex flex-col text-center items-center mb-10">
    <x-forms.image :image="$post['image']"></x-forms.image>

    <div class="py-8 w-full">
        <h3 class="text-xl font-bold transition-colors duration-300">
            {{ $post->head }}
        </h3>

        {{-- Post Text --}}
        <p class="text-sm mt-4">{{ $post->text }}</p>

        {{-- Post Date --}}
        <p class="text-sm mt-5 mb-6">
            {{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('d F Y - H:i') }}
        </p>

        {{-- Delete Button (Commented Out) --}}
        @auth
            @if (auth()->id() === $post->user_id)
                <div class="flex justify-center">
                    <form method="POST" action="{{ route('items.destroy', $post) }}">
                        @csrf
                        @method('DELETE')
                        <x-forms.button type="submit" class="bg-red-600 hover:bg-red-500">Delete</x-forms.button>
                    </form>
                </div>
            @endif
        @endauth
    </div>
</x-panel>
