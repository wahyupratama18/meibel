<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-sky-800 leading-tight">
            {{ __('Daftar Kategori') }}
        </h2>
    </x-slot>

    <div class="p-8">
        <div class="flex justify-end mb-4">
            <a href="{{ route('category.create') }}">
                <x-jet-button>Tambah</x-jet-button>
            </a>
        </div>
        <livewire:category-table/>
    </div>
</x-app-layout>