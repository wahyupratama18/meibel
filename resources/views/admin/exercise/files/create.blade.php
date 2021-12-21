<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-sky-800 leading-tight">
            <a href="{{ route('category.exercise.index', ['category' => $category]) }}">
                <i class="fas fa-chevron-left mr-2"></i>
                {{ __('Tambah File '.$exercise->prefix.' Jurusan '.$category->name) }}
            </a>
        </h2>
    </x-slot>

    <div class="p-8">

        <form action="{{ route('category.exercise.file.store', ['category' => $category, 'exercise' => $exercise]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <x-jet-label for="exercise_file" value="{{ __('Unggah File Soal') }}*" />
                <x-filepond acceptedFileTypes="['application/pdf']" name="exercise_file" />
                <x-jet-input-error for="exercise_file" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-jet-label for="discussion_file" value="{{ __('Unggah File Pembahasan') }}*" />
                <x-filepond acceptedFileTypes="['application/pdf']" name="discussion_file" />
                <x-jet-input-error for="discussion_file" class="mt-2" />
            </div>

            <div class="flex justify-end">
                <x-jet-button>
                    {{ __('Simpan') }}
                </x-jet-button>
            </div>
        </form>
    </div>
</x-app-layout>