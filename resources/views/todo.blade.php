<x-layout>
    <x-nav>
        <a href="/items/create">New todo item</a>
    </x-nav>
    <x-heading>TODO list</x-heading>

    <div class="space-y-10">
        <section class="pt-10">
            <x-heading>TODO</x-heading>

            <div class="grid lg:grid-cols-3 gap-8 mt-6">
                @if (isset($items) && count($items) > 0)
                    @foreach ($items as $item)
                        <x-item-card :item="$item" />
                    @endforeach
                @else
                    <div class="col-span-3 text-center">Er is nog niets toegevoegd</div>
                @endif
            </div>
        </section>

        <section>
            <x-heading>Done</x-heading>
            <div class="grid lg:grid-cols-3 gap-8 mt-6">
                @if (isset($itemsDone) && count($itemsDone) > 0)
                    @foreach ($itemsDone as $itemDone)
                        <x-item-card-done :item="$itemDone" />
                    @endforeach
                @else
                    <div class="col-span-3 text-center">Geen voltooide items</div>
                @endif
            </div>
        </section>
    </div>
</x-layout>
