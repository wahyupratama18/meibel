<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-sky-800 leading-tight">
            <a href="{{ route('category.material.index', ['category' => $category]) }}">
                <i class="fas fa-chevron-left mr-2"></i>
                {{ __('Ubah Materi Jurusan '.$category->name) }}
            </a>
        </h2>
    </x-slot>

    <div class="p-8">

        <form action="{{ route('category.material.update', ['category' => $category, 'material' => $material]) }}" method="POST">
            @method('put')
            @csrf
            <div class="mb-4">
                <x-jet-label for="name" value="{{ __('Nama Materi') }}" />
                <x-jet-input id="name" type="text" class="mt-1 block w-full" name="name" value="{{ old('name', $material->name) }}" autofocus />
                <x-jet-input-error for="name" class="mt-2" />
            </div>

            <div class="flex justify-end">
                <x-jet-button>
                    {{ __('Simpan') }}
                </x-jet-button>
            </div>
        </form>
    </div>
</x-app-layout>