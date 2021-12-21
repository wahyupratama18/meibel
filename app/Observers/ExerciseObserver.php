<?php

namespace App\Observers;

use App\Models\Exercise;
use Illuminate\Support\Str;

class ExerciseObserver
{
    /**
     * Handle the Exercise "created" event.
     *
     * @param  \App\Models\Exercise  $exercise
     * @return void
     */
    public function creating(Exercise $exercise)
    {
        $exercise->slug = Str::slug($exercise->name).'.'.$exercise->id;
    }
    
    /**
     * Handle the Exercise "updated" event.
     *
     * @param  \App\Models\Exercise  $exercise
     * @return void
     */
    public function updating(Exercise $exercise)
    {
        $exercise->slug = Str::slug($exercise->name).'.'.$exercise->id;
    }

    /**
     * Handle the Exercise "deleted" event.
     *
     * @param  \App\Models\Exercise  $exercise
     * @return void
     */
    public function deleted(Exercise $exercise)
    {
        //
    }

    /**
     * Handle the Exercise "restored" event.
     *
     * @param  \App\Models\Exercise  $exercise
     * @return void
     */
    public function restored(Exercise $exercise)
    {
        //
    }

    /**
     * Handle the Exercise "force deleted" event.
     *
     * @param  \App\Models\Exercise  $exercise
     * @return void
     */
    public function forceDeleted(Exercise $exercise)
    {
        //
    }
}
