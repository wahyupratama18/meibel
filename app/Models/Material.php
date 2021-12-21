<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

class Material extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'name'],
    
    $appends = ['prefix'];

    /**
     * Get the category that owns the Material
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get all of the files for the Material
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function files(): HasMany
    {
        return $this->hasMany(MaterialFile::class);
    }

    public function getPrefixAttribute(): string
    {
        return 'Materi '.$this->name;
    }
}
