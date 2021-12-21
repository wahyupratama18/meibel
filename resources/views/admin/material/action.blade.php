<div class="flex flex-col md:flex-row gap-4">
    <a href="{{ route('category.material.edit', ['category' => $category, 'material' => $material]) }}">
        <x-jet-button>Edit</x-jet-button>
    </a>

    <a href="{{ route('category.material.file.index', ['category' => $category, 'material' => $material]) }}">
        <x-indigo-button>Lihat File</x-indigo-button>
    </a>

    <form method="POST" action="{{ route('category.material.destroy', ['category' => $category, 'material' => $material]) }}">
        @method('DELETE')
        @csrf
        <x-jet-danger-button
        type="button"
        onclick="
        Swal.fire({
            title: 'Hapus materi beserta seluruh file?',
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