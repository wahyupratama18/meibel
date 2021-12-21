<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class University extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'about'];

    /**
     * Get all of the users for the University
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    /**
     * Get all of the faculties for the University
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function faculties(): HasMany
    {
        return $this->hasMany(Faculty::class);
    }
}
