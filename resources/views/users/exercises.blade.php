<x-general-layout :title="$category->exercise_prefix">
    <section class="bg-gradient-to-br from-sky-600 to-sky-400 p-8">
        <h1 class="text-white font-bold">Daftar {{ $category->exercise_prefix }}</h1>

        <x-breadcrumb :navs="[
            (object) ['route' => 'categories.exercises.index', 'params' => ['category' => $category], 'text' => 'Kategori']
        ]" />

    </section>

    <div class="p-8">
        <x-accordion>
            @foreach ($category->exercises as $exercise)
            <x-accordion-head :show="$exercise->slug" :title="$exercise->prefix.' ('.$exercise->files->count().' materi) '" />
            <x-accordion-body :show="$exercise->slug">
                @foreach ($exercise->files as $file)
                    <div class="my-4">
                        <div class="mb-2">
                            <a href="{{ $file->exercise_url }}" class="text-sky-500">
                                <i class="fas fa-download"></i> {{ $file->exercise_name }}
                            </a>
                        </div>
                        <a href="{{ $file->discussion_url }}" class="text-sky-500">
                            <i class="fas fa-download"></i> {{ $file->discussion_name }}
                        </a>
                    </div>
                @endforeach
            </x-accordion-body>

            @endforeach
        </x-accordion>

    </div>
</x-general-layout>