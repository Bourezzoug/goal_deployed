<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscrit extends Model
{
    use HasFactory;
    protected $fillable = ['email','nom_complet','telephone','fonction','conditions','newsgoal','newspartenaire','ville','age','civilite'];
    public function scopeSearch($query, $term){
        $query->where(function ($query) use ($term){
            $query->where('nom_complet','like', "%$term%")
                ->orWhere('email','like', "%$term%")
                ->orWhere('fonction','like', "%$term%")
                ->orWhere('civilite','like', "%$term%")
                ->orWhere('ville','like', "%$term%")
                ->orWhere('created_at','between', "%$term%");
        });
    }
}
