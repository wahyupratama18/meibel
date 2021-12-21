<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-sky-800 leading-tight">
            <a href="{{ route('category.material.index', ['category' => $category]) }}">
                <i class="fas fa-chevron-left mr-2"></i>
                {{ __('Lihat '. $material->prefix . ' dalam Jurusan ' . $category->name) }}
            </a>
        </h2>
    </x-slot>

    <div class="p-8">
        <div class="flex justify-end mb-4">
            <a href="{{ route('category.material.file.create', ['category' => $category, 'material' => $material]) }}">
                <x-jet-button>Tambah</x-jet-button>
            </a>
        </div>

        <livewire:material-file-table :category="$category" :material="$material" />
    </div>
</x-app-layout>