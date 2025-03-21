<x-layout>
    <x-nav>
        <a href="/blog/create" class="font-bold">New Post</a>
    </x-nav>
    <x-forms method="POST" action="/blog" enctype="multipart/form-data">
        <x-forms.input label="Title" name='title' />
        <x-forms.textarea label="Description" name="description" spellcheck="true" />
        <x-forms.input label="Image(optional)" name='image' type='file' />

        <x-forms.button>
            Post your blog
        </x-forms.button>
    </x-forms>
</x-layout
