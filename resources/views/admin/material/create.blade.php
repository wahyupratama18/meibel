<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-sky-800 leading-tight">
            <a href="{{ route('category.material.index', ['category' => $category]) }}">
                <i class="fas fa-chevron-left mr-2"></i>
                {{ __('Tambah Materi Jurusan '.$category->name) }}
            </a>
        </h2>
    </x-slot>

    <div class="p-8">

        <form action="{{ route('category.material.store', ['category' => $category]) }}" method="POST">
            @csrf
            <div class="mb-4">
                <x-jet-label for="name" value="{{ __('Nama Materi') }}" />
                <x-jet-input id="name" type="text" class="mt-1 block w-full" name="name" autofocus />
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