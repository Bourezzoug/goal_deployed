<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campagne extends Model
{
    use HasFactory;
    protected $fillable = ['libelle','client_id','date_debut','date_fin','status'];
    public function client() {
        return $this->belongsTo(Client::class);
    }
    public function banniere() {
        return $this->hasMany(Banniere::class);
    }
}
