<div class="flex flex-col md:flex-row gap-4">
    <a href="{{ route('category.exercise.file.edit', ['category' => $category, 'exercise' => $exercise, 'file' => $file]) }}">
        <x-jet-button>Edit</x-jet-button>
    </a>

    <form method="POST" action="{{ route('category.exercise.file.destroy', ['category' => $category, 'exercise' => $exercise, 'file' => $file]) }}">
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