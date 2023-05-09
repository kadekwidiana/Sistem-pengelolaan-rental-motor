@props(['messages'])

@if ($messages)
    <span {{ $attributes->merge(['class' => 'text-sm space-y-1']) }}>
        @foreach ((array) $messages as $message)
        <strong class="text-danger">{{ $message }}</strong>
        @endforeach
    </span>
@endif
