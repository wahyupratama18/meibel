<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-sky-800 leading-tight">
            <a href="{{ route('category.index') }}">
                <i class="fas fa-chevron-left mr-2"></i>
                {{ __('Lihat Materi Jurusan '.$category->name) }}
            </a>
        </h2>
    </x-slot>

    <div class="p-8">
        <div class="flex justify-end mb-4">
            <a href="{{ route('category.material.create', ['category' => $category->id]) }}">
                <x-jet-button>Tambah</x-jet-button>
            </a>
        </div>

        <livewire:material-table :category="$category" />
    </div>
</x-app-layout>