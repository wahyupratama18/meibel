<div class="flex flex-col md:flex-row gap-4">
    <a href="{{ route('category.exercise.edit', ['category' => $category, 'exercise' => $exercise]) }}">
        <x-jet-button>Edit</x-jet-button>
    </a>

    <a href="{{ route('category.exercise.file.index', ['category' => $category, 'exercise' => $exercise]) }}">
        <x-indigo-button>Lihat File</x-indigo-button>
    </a>

    <form method="POST" action="{{ route('category.exercise.destroy', ['category' => $category, 'exercise' => $exercise]) }}">
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