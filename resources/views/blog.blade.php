<x-layout>
    <x-nav> <a href="/blog/create" class="font-bold">New Post</a></x-nav>

    @if (isset($posts))
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-6 p-4">
            @foreach ($posts as $post)
                <x-blog-card :post="$post" :id="$post->id" />
            @endforeach
        </div>
    @endif
</x-layout>
