<x-layout>
    <x-heading>Register</x-heading>
    <x-forms method="POST" action="/register">
        <x-forms.input label="Name" name="name" />
        <x-forms.input label="Email" name="email" type="email" />
        <x-forms.input label="Password" name="password" type="password" />
        <x-forms.input label="Password Confirmation" name="password_confirmation" type="password" />
        <x-forms.button>
            Create Account
        </x-forms.button>
    </x-forms>
</x-layout>
