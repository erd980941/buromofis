<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['client', 'description', 'main_photo_id'];

    public function mainPhoto()
    {
        return $this->belongsTo(ProjectPhoto::class, 'main_photo_id');
    }

    public function photos()
    {
        return $this->hasMany(ProjectPhoto::class, 'project_id');
    }
}
