<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banniere extends Model
{
    use HasFactory;
    protected $fillable = ['campagne_id','titre','lien','image','position','plannification'];
    public function campagne() {
        return $this->belongsTo(Campagne::class);
    }
    public function scopeSearch($query, $term){
        $query->where(function ($query) use ($term){
            $query->where('titre','like', "%$term%")
                ->orWhere('position','like', "%$term%")
                ->orWhere('lien','like', "%$term%");
        });
    }
}
