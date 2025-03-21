@props(['image' => null, 'width' => 90])

@if ($image)
    <img src="{{ asset($image) }}" alt="employer" class="rounded" width="{{ $width }}">
@else
    <img src="https://picsum.photos/seed/{{ mt_rand(0, 100000) }}/{{ $width }}/{{ $width }}" class="rounded"
        width="{{ $width }}">
@endif
