<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'],
    
    $appends = ['material_prefix', 'exercise_prefix'];

    /**
     * Get all of the exercises for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function exercises(): HasMany
    {
        return $this->hasMany(Exercise::class);
    }

    /**
     * Get all of the materials for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materials(): HasMany
    {
        return $this->hasMany(Material::class);
    }

    public function getMaterialPrefixAttribute(): string
    {
        return 'Materi Jurusan '.$this->name;
    }

    public function getExercisePrefixAttribute(): string
    {
        return 'Latihan Soal '.$this->name;
    }
}
