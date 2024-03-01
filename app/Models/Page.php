<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $fillable = ['title','excerpt','body','image','slug','meta_description','meta_keywords','status'];
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function setSlugAttribute($value) {
        $this->attributes['slug'] = strtolower($value);
    }
}
