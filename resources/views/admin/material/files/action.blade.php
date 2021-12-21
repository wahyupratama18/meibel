<div class="flex flex-col md:flex-row gap-4">
    <a href="{{ route('category.material.file.edit', ['category' => $category, 'material' => $material, 'file' => $file]) }}">
        <x-jet-button>Edit</x-jet-button>
    </a>

    <form method="POST" action="{{ route('category.material.file.destroy', ['category' => $category, 'material' => $material, 'file' => $file]) }}">
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