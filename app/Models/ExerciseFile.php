<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ExerciseFile extends Model
{
    use HasFactory;

    protected $fillable = ['exercise_id'],
    $appends = ['exercise_url', 'discussion_url'];

    private const PATH = 'exercises'.DIRECTORY_SEPARATOR,
    VALID = ['exercise', 'discussion'];

    private $update = [];

    /**
     * Get the exercise that owns the ExerciseFile
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function exercise(): BelongsTo
    {
        return $this->belongsTo(Exercise::class);
    }

    public function moveFile(Temporar $temp, int $fold): ExerciseFile
    {
        $folder = self::VALID[$fold];

        $path = self::PATH.$this->id.DIRECTORY_SEPARATOR.$folder.DIRECTORY_SEPARATOR.$temp->file;

        $tmpFolder = 'tmp'.DIRECTORY_SEPARATOR.$temp->folder;

        Storage::move(
            $tmpFolder.DIRECTORY_SEPARATOR.$temp->file,
            $path
        );

        $this->setUpdate($folder, $temp->file, $path);

        Storage::deleteDirectory($tmpFolder);
        $temp->delete();

        return $this;
    }

    public function setUpdate($key, $file, $path): void
    {
        $this->update[$key.'_name'] = $file;
        $this->update[$key.'_path'] = $path;
    }

    public function finalize()
    {
        $update = $this->update;
        
        tap([
            $this->exercise_path,
            $this->discussion_path
        ], function($old) use ($update) {
            $this->forceFill($update)->save();

            if (isset($update['exercise_path']) && $old[0]) {
                Storage::delete($old[0]);
            }

            if (isset($update['discussion_path']) && $old[1]) {
                Storage::delete($old[1]);
            }
        });
        
        $this->update = [];
    }

    public function deleteFile(): void
    {
        Storage::deleteDirectory(self::PATH.DIRECTORY_SEPARATOR.$this->id);
        $this->delete();
    }

    public function getExerciseUrlAttribute(): string
    {
        return route('download.exercise', ['files' => $this->exercise_slug]);
    }

    public function getDiscussionUrlAttribute(): string
    {
        return route('download.discussion', ['files' => $this->discussion_slug]);
    }
}
