<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ trans('lang.home') }}
        </h2>
    </x-slot>
    @livewire('events')
</x-app-layout>
