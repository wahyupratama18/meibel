<div class="flex flex-col md:flex-row gap-4">
    <a href="{{ route('category.edit', ['category' => $category->id]) }}">
        <x-jet-button>Edit</x-jet-button>
    </a>

    <a href="{{ route('category.material.index', ['category' => $category->id]) }}">
        <x-indigo-button>Lihat Materi</x-indigo-button>
    </a>

    <a href="{{ route('category.exercise.index', ['category' => $category->id]) }}">
        <x-emerald-button>Daftar Soal</x-emerald-button>
    </a>

    <form method="POST" action="{{ route('category.destroy', ['category' => $category->id]) }}">
        @method('DELETE')
        @csrf
        <x-jet-danger-button
        type="button"
        onclick="
        Swal.fire({
            title: 'Hapus kategori?',
            showCancelButton: true
        }).then(val => {
            if(val.value) {
                this.closest('form').submit();
            }
        })
        ">
            Hapus
        </x-jet-danger-button>
    </form>
</div>