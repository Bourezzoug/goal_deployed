<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function post() {
        return $this->hasMany(Post::class);
    }
    protected $fillable = ['order','name','slug','color','parent_id'];
    public function setSlugAttribute($value) {
        $this->attributes['slug'] = strtolower($value);
    }
    public function scopeSearch($query, $term){
        $query->where(function ($query) use ($term){
            $query->where('name','like', "%$term%")
                ->orWhere('slug','like', "%$term%");
        });
    }
}
