<div {{ $attributes->merge([
        "class" => "p-4 bg-white/5 rounded-xl border-2 border-transparent hover:border-blue-800 group transition-colors duration-300"
    ]) }}>
    {{ $slot }}
</div>