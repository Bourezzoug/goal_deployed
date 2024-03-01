<?php

namespace App\Http\Livewire\Admin\Role;

use App\Models\Role;
use Livewire\Component;
use App\Models\Permission;
use App\Models\UserPermission;

class RoleShow extends Component
{
    public $showItemModel = false;
    public $itemId;
    public $item;

    public $selectedInscritsPermission = [];
    public $selecteAllInscrit = false;

    public $selectedRolesPermission = [];
    public $selecteAllRole = false;

    public $selectedUsersPermission = [];
    public $selecteAllUser = false;

    public $selectedCategoriesPermission = [];
    public $selecteAllCategorie = false;

    public $selectedPostsPermission = [];
    public $selecteAllPost = false;

    public $selectedSurveysPermission = [];
    public $selecteAllSurvey = false;

    public $selectedMenuPermission = [];


    protected $listeners = ['showItemModel'];

    public function showItemModel($itemId){
        $this->itemId = $itemId;
        $this->showItemModel = true;
        $this->item = Role::find($this->itemId);
        $this->selectedInscritsPermission = UserPermission::where('role_id', $this->itemId)
        ->whereIn('permission_id', [6,7,8,9,10])
        ->pluck('permission_id');

        $this->selectedRolesPermission = UserPermission::where('role_id', $this->itemId)
        ->whereIn('permission_id', [16,17,18,19,20])
        ->pluck('permission_id');
        $this->selectedUsersPermission = UserPermission::where('role_id', $this->itemId)
        ->whereIn('permission_id', [21,22,23,24,25])
        ->pluck('permission_id');
        $this->selectedCategoriesPermission = UserPermission::where('role_id', $this->itemId)
        ->whereIn('permission_id', [1,2,3,4,5])
        ->pluck('permission_id');
        $this->selectedPostsPermission = UserPermission::where('role_id', $this->itemId)
        ->whereIn('permission_id', [11,12,13,14,15])
        ->pluck('permission_id');
        $this->selectedSurveysPermission = UserPermission::where('role_id', $this->itemId)
        ->whereIn('permission_id', [26,28,29,30,31])
        ->pluck('permission_id');
        $this->selectedMenuPermission = UserPermission::where('role_id', $this->itemId)
        ->whereIn('permission_id', [27])
        ->pluck('permission_id');

        $this->selecteAllInscrit = $this->selectedInscritsPermission->count() === 5;
        $this->selecteAllRole = $this->selectedRolesPermission->count() === 5;
        $this->selecteAllUser = $this->selectedUsersPermission->count() === 5;
        $this->selecteAllCategorie = $this->selectedCategoriesPermission->count() === 5;
        $this->selecteAllPost = $this->selectedPostsPermission->count() === 5;
        $this->selecteAllSurvey = $this->selectedSurveysPermission->count() === 5;
    }

    public function closeItemModel(){
        $this->showItemModel = false;
        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.role.role-show',[
            'permissions_page'      => Permission::where('table_name', '=', 'pages')->pluck('key', 'id'),
            'permissions_role'      => Permission::where('table_name', '=', 'roles')->pluck('key', 'id'),
            'permissions_users'     => Permission::where('table_name', '=', 'users')->pluck('key', 'id'),
            'permissions_cats'      => Permission::where('table_name', '=', 'categories')->pluck('key', 'id'),
            'permissions_post'      => Permission::where('table_name', '=', 'posts')->pluck('key', 'id'),
            'permissions_inscrit'   => Permission::where('table_name', '=', 'inscrits')->pluck('key', 'id'),
            'permissions_survey'    => Permission::where('table_name', '=', 'surveys')->pluck('key', 'id'),
        ]);
    }
}
