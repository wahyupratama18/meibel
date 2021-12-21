<?php

namespace App\Observers;

use App\Models\Material;
use Illuminate\Support\Str;

class MaterialObserver
{
    /**
     * Handle the Material "created" event.
     *
     * @param  \App\Models\Material  $material
     * @return void
     */
    public function creating(Material $material)
    {
        $material->slug = Str::slug($material->name).'.'.$material->id;
    }
    
    /**
     * Handle the Material "updated" event.
     *
     * @param  \App\Models\Material  $material
     * @return void
     */
    public function updating(Material $material)
    {
        $material->slug = Str::slug($material->name).'.'.$material->id;
    }

    /**
     * Handle the Material "deleted" event.
     *
     * @param  \App\Models\Material  $material
     * @return void
     */
    public function deleted(Material $material)
    {
        //
    }

    /**
     * Handle the Material "restored" event.
     *
     * @param  \App\Models\Material  $material
     * @return void
     */
    public function restored(Material $material)
    {
        //
    }

    /**
     * Handle the Material "force deleted" event.
     *
     * @param  \App\Models\Material  $material
     * @return void
     */
    public function forceDeleted(Material $material)
    {
        //
    }
}
