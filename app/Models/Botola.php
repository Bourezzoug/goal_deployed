<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Botola extends Model
{
    protected $fillable = ['name','logo','win','draw','lose','points','ordre'];
    use HasFactory;
}
