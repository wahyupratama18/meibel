<?php

namespace App\Observers;

use App\Models\ExerciseFile;
use Illuminate\Support\Str;

class ExerciseFileObserver
{
    /**
     * Handle the ExerciseFile "created" event.
     *
     * @param  \App\Models\ExerciseFile  $exerciseFile
     * @return void
     */
    public function creating(ExerciseFile $exerciseFile)
    {
        $exerciseFile->exercise_slug = rand(1,9).'.'.Str::slug($exerciseFile->exercise_name);
        $exerciseFile->discussion_slug = rand(1,9).'.'.Str::slug($exerciseFile->discussion_name);
    }

    /**
     * Handle the ExerciseFile "updated" event.
     *
     * @param  \App\Models\ExerciseFile  $exerciseFile
     * @return void
     */
    public function updating(ExerciseFile $exerciseFile)
    {
        $exerciseFile->exercise_slug = $exerciseFile->id.'.'.Str::slug($exerciseFile->exercise_name);
        $exerciseFile->discussion_slug = $exerciseFile->id.'.'.Str::slug($exerciseFile->discussion_name);
    }

    /**
     * Handle the ExerciseFile "deleted" event.
     *
     * @param  \App\Models\ExerciseFile  $exerciseFile
     * @return void
     */
    public function deleted(ExerciseFile $exerciseFile)
    {
        //
    }

    /**
     * Handle the ExerciseFile "restored" event.
     *
     * @param  \App\Models\ExerciseFile  $exerciseFile
     * @return void
     */
    public function restored(ExerciseFile $exerciseFile)
    {
        //
    }

    /**
     * Handle the ExerciseFile "force deleted" event.
     *
     * @param  \App\Models\ExerciseFile  $exerciseFile
     * @return void
     */
    public function forceDeleted(ExerciseFile $exerciseFile)
    {
        //
    }
}
