<?php

namespace App\Observers;

use App\Models\MaterialFile;
use Illuminate\Support\Str;

class MaterialFileObserver
{
    /**
     * Handle the MaterialFile "created" event.
     *
     * @param  \App\Models\MaterialFile  $materialFile
     * @return void
     */
    public function creating(MaterialFile $materialFile)
    {
        $materialFile->slug = $materialFile->id.'.'.Str::slug($materialFile->name);
    }

    /**
     * Handle the MaterialFile "updated" event.
     *
     * @param  \App\Models\MaterialFile  $materialFile
     * @return void
     */
    public function updating(MaterialFile $materialFile)
    {
        $materialFile->slug = $materialFile->id.'.'.Str::slug($materialFile->name);
    }

    /**
     * Handle the MaterialFile "deleted" event.
     *
     * @param  \App\Models\MaterialFile  $materialFile
     * @return void
     */
    public function deleted(MaterialFile $materialFile)
    {
        //
    }

    /**
     * Handle the MaterialFile "restored" event.
     *
     * @param  \App\Models\MaterialFile  $materialFile
     * @return void
     */
    public function restored(MaterialFile $materialFile)
    {
        //
    }

    /**
     * Handle the MaterialFile "force deleted" event.
     *
     * @param  \App\Models\MaterialFile  $materialFile
     * @return void
     */
    public function forceDeleted(MaterialFile $materialFile)
    {
        //
    }
}
