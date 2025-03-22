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
    <div class="flex bg-white/10 p-4 rounded-lg shadow">
        @if ($post->comments->count() > 0)
            <div class="space-y-4">
                @foreach ($post->comments as $comment)
                    <div class="border border-gray-600 bg-gray-800 text-gray-200 rounded-lg p-4 shadow-md">
                        <p class="font-bold">{{ $post->user->name }} Posted:</p>
                        <p class="mt-2">{{ $comment->comment }}</p>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-400">No comments yet.</p>
        @endif

    </div>

</x-panel>
