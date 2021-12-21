@props(['id' => 'pond'.Str::random(5)])

<div
x-data
x-init="() => {
    document.addEventListener('DOMContentLoaded', () => {

        const {{ $id }} = FilePond.create($refs.{{ $id }});
        {{ $id }}.setOptions({
            allowFileRename: true,
            fileRenameFunction: (file) =>
                new Promise((resolve) => {
                    resolve(window.prompt('Enter new filename', file.name));
                }),
            allowMultiple: {{ $attributes['multiple'] ? 'true' : 'false' }},
            server: {
                url: '{{ route('saving.store') }}',
                process: {
                    ondata: (formData) => {
                        formData.append('for', '{{ $attributes['name'] }}')
                        return formData
                    },
                },
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
            },
            {{-- server: {
                process:(fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                    @this.upload('{{ $attributes['wire:model'] }}', file, load, error, progress)
                },
                revert: (filename, load) => {
                    @this.removeUpload('{{ $attributes['wire:model'] }}', filename, load)
                },
            }, --}}
            locale: 'id',
            {{-- allowImagePreview: {{ $attributes['allowFileTypeValidation'] ? 'true' : 'false' }},
            imagePreviewMaxHeight: {{ $attributes['imagePreviewMaxHeight'] ?: '256' }}, --}}
            allowFileTypeValidation: {{ $attributes['acceptedFileTypes'] ? 'true' : 'false' }},
            acceptedFileTypes: {!! $attributes->get('acceptedFileTypes') ?? 'null' !!},
            allowFileSizeValidation: {{ $attributes['allowFileSizeValidation'] ? 'true' : 'false' }},
            maxFileSize: {!! "'".($attributes['maxFileSize'] ?? 'null')."'" !!}
        });
    })
}"
>
    <input type="file" name="{{ $attributes['name'] }}" x-ref="{{ $id }}" />
</div>