<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'description', 'properties', 'category_id', 'main_photo_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the main photo of the product.
     */
    public function mainPhoto()
    {
        return $this->belongsTo(ProductPhoto::class, 'main_photo_id');
    }

    /**
     * Get the photos of the product.
     */
    public function photos()
    {
        return $this->hasMany(ProductPhoto::class);
    }
}
