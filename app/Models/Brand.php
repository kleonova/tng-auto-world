<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Brand extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description'
    ];

    /**
     * Get the comments for the blog post.
     */
    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }
}
