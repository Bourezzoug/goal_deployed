<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory ;

    protected $fillable = ['name' , 'key' , 'color'];

    public function permission()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function hasPermission($key)
    {
        return $this->permission->contains('key', $key);
    }
    public function scopeSearch($query, $term){
        $query->where(function ($query) use ($term){
            $query->where('name','like', "%$term%")
                ->orWhere('key','like', "%$term%");
        });
    }
}
