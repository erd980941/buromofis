<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use NodeTrait;
    protected $fillable = ['name','image','parent_id'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
