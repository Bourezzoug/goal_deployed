<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    use HasFactory;
    protected $fillable = ['role_id','permission_id'];
    protected $table = 'permission_role';
    public $timestamps = false;

    public function roles() {
        return $this->hasMany(Permission::class);
    }
    public function permissions() {
        return $this->hasMany(Role::class);
    }
}
