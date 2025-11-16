<x-layouts.app.sidebar :title="$title ?? null">
    <flux:main>
        {{ $slot }}
    </flux:main>
     <x-mary-toast />
</x-layouts.app.sidebar>
