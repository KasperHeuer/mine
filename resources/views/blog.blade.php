<x-layout>
    <x-nav> <a href="/blog/create">New Post</a></x-nav>
    @if (isset($posts))
        @foreach ($posts as $post)
            <x-blog-card :post="$post" :id="$post->id" />
        @endforeach
    @endif
</x-layout>