<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-sky-800 leading-tight">
            <a href="{{ route('category.material.index', ['category' => $category]) }}">
                <i class="fas fa-chevron-left mr-2"></i>
                {{ __('Tambah File '.$material->prefix.' Jurusan '.$category->name) }}
            </a>
        </h2>
    </x-slot>

    <div class="p-8">

        <form action="{{ route('category.material.file.store', ['category' => $category, 'material' => $material]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <x-jet-label for="name" value="{{ __('Unggah File Materi') }}" />
                <x-filepond acceptedFileTypes="['application/pdf']" name="material_file" />
                <x-jet-input-error for="material_file" class="mt-2" />
            </div>

            <div class="flex justify-end">
                <x-jet-button>
                    {{ __('Simpan') }}
                </x-jet-button>
            </div>
        </form>
    </div>
</x-app-layout>