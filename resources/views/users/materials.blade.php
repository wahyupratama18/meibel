<x-general-layout :title="$category->material_prefix">
    <section class="bg-gradient-to-br from-sky-600 to-sky-400 p-8">
        <h1 class="text-white font-bold">Daftar {{ $category->material_prefix }}</h1>

        <x-breadcrumb :navs="[
            (object) ['route' => 'categories.materials.index', 'params' => ['category' => $category], 'text' => 'Kategori']
        ]" />

    </section>

    <div class="p-8">
        <x-accordion>
            @foreach ($category->materials as $material)
            <x-accordion-head :show="$material->slug" :title="$material->prefix.' ('.$material->files->count().' materi) '" />
            <x-accordion-body :show="$material->slug">
                @foreach ($material->files as $file)
                    <div class="my-2">
                        <a href="{{ $file->material_url }}" class="text-sky-500">
                            <i class="fas fa-download"></i> {{ $file->name }}
                        </a>
                    </div>
                @endforeach
            </x-accordion-body>

            @endforeach
        </x-accordion>

    </div>
</x-general-layout>