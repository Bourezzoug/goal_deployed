<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Role extends Model
{
    protected $fillable = ['user_id','role_id'];
    protected $table = 'user_role';
    public $timestamps = false;
    public function users() {
        return $this->belongsTo(Role::class);
    }
    public function roles() {
        return $this->hasMany(User::class);
    }
    use HasFactory;
}
