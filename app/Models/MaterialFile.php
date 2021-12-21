<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class MaterialFile extends Model
{
    use HasFactory;

    protected $fillable = ['material_id'],
    $appends = ['material_url'];

    private const PATH = 'materials'.DIRECTORY_SEPARATOR;

    /**
     * Get the material that owns the MaterialFile
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class);
    }

    public function updateFile(string $path, string $name): void
    {
        tap($this->material_path, function ($previous) use ($path, $name) {
            $this->forceFill([
                'name' => $name,
                'material_path' => $path,
            ])->save();

            if ($previous) {
                Storage::delete($previous);
            }
        });
    }

    public function moveFile(Temporar $temp): void
    {
        $path = self::PATH.$this->id.DIRECTORY_SEPARATOR.$temp->file;

        $tmpFolder = 'tmp'.DIRECTORY_SEPARATOR.$temp->folder;

        Storage::move(
            $tmpFolder.DIRECTORY_SEPARATOR.$temp->file,
            $path
        );

        $this->updateFile($path, $temp->file);

        Storage::deleteDirectory($tmpFolder);
        $temp->delete();
    }

    public function deleteFile(): void
    {
        Storage::deleteDirectory('materials'.DIRECTORY_SEPARATOR.$this->id);;

        $this->delete();
    }

    public function getMaterialUrlAttribute(): string
    {
        return route('download.material', ['files' => $this->slug]);
    }
}
