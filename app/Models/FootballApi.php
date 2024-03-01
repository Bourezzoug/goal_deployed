<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FootballApi extends Model
{
    use HasFactory;
    protected $table = 'api_football';
    protected $fillable = ['equipe1_name','equipe2_name','logo_equipe_1','logo_equipe_2','heure_match','resultat_match','date_match'];
    public $timestamps = false;
}
