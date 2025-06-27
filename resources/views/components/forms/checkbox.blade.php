@props(['label', 'name', 'chk' => 0])

@php

    if ($chk == 1) {
        $chk = true;
    } else {
        $chk = false;
    }

    $defaults = [
        'type' => 'checkbox',
        'id' => $name,
        'name' => $name,
        'value' => old($name),
        'checked' => $chk
    ];
@endphp

<x-forms.field :$label :$name>
    <div class="rounded-xl bg-white/10 border border-white/10 px-5 py-4 w-full">
        <input {{ $attributes($defaults) }}>
        <span class="pl-1">{{ $label }}</span>
    </div>
</x-forms.field>

