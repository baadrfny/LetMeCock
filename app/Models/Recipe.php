<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'category_id',
        'preparation_steps',
        'cook_time',
        'country_origin',
        'video_url',
        'image',
        'suggestion_date',
        
    ];

    protected function casts(): array
    {
        return [
            'suggestion_date' => 'date',
        ];
    }

    /**
     * Get the user who created this recipe.
     */
    /**
     * Get a displayable image URL, handling both local storage paths
     * and absolute (internet) image URLs.
     */
    public function getImageUrlAttribute(): ?string
    {
        if (empty($this->image)) {
            return null;
        }

        if (filter_var($this->image, FILTER_VALIDATE_URL)) {
            return $this->image;
        }

        return asset('storage/' . $this->image);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the category of this recipe.
     */
    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

    /**
     * Get the ingredients for this recipe.
     */
    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'ingredient_recipe')
                    ->withPivot('quantity', 'unit')
                    ->withTimestamps();
    }
}
