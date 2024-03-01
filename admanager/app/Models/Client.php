<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = ['nom','prenom'];
    public function Campagnes() {
        return $this->hasMany(Campagne::class);
    }
    public function scopeSearch($query, $term){
        $query->where(function ($query) use ($term){
            $query->where('nom','like', "%$term%")
                ->orWhere('prenom','like', "%$term%");
        });
    }
}
