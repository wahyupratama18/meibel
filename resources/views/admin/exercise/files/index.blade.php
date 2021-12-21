<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-sky-800 leading-tight">
            <a href="{{ route('category.exercise.index', ['category' => $category]) }}">
                <i class="fas fa-chevron-left mr-2"></i>
                {{ __('Lihat '. $exercise->prefix . ' dalam Jurusan ' . $category->name) }}
            </a>
        </h2>
    </x-slot>

    <div class="p-8">
        <div class="flex justify-end mb-4">
            <a href="{{ route('category.exercise.file.create', ['category' => $category, 'exercise' => $exercise]) }}">
                <x-jet-button>Tambah</x-jet-button>
            </a>
        </div>

        <livewire:exercise-file-table :category="$category" :exercise="$exercise" />
    </div>
</x-app-layout>