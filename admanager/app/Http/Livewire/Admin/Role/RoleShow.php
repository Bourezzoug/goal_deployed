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

    public $selectedBannieresPermission = [];
    public $selecteAllBanniere = false;

    public $selectedRolesPermission = [];
    public $selecteAllRole = false;

    public $selectedUsersPermission = [];
    public $selecteAllUser = false;

    public $selectedClientPermission = [];
    public $selecteAllClient = false;

    public $selectedCampagnesPermission = [];
    public $selecteAllCampagne = false;


    public $selectedMenuPermission = [];


    protected $listeners = ['showItemModel'];

    public function showItemModel($itemId){
        $this->itemId = $itemId;
        $this->showItemModel = true;
        $this->item = Role::find($this->itemId);
        $this->selectedBannieresPermission = UserPermission::where('role_id', $this->itemId)
        ->whereIn('permission_id', [7,8,9,10,11])
        ->pluck('permission_id');

        $this->selectedRolesPermission = UserPermission::where('role_id', $this->itemId)
        ->whereIn('permission_id', [19,20,21,22,23])
        ->pluck('permission_id');
        $this->selectedUsersPermission = UserPermission::where('role_id', $this->itemId)
        ->whereIn('permission_id', [25,26,27,28,29])
        ->pluck('permission_id');
        $this->selectedClientPermission = UserPermission::where('role_id', $this->itemId)
        ->whereIn('permission_id', [1,2,3,4,5])
        ->pluck('permission_id');
        $this->selectedCampagnesPermission = UserPermission::where('role_id', $this->itemId)
        ->whereIn('permission_id', [13,14,15,16,17])
        ->pluck('permission_id');

        $this->selectedMenuPermission = UserPermission::where('role_id', $this->itemId)
        ->whereIn('permission_id', [31])
        ->pluck('permission_id');

        $this->selecteAllBanniere = $this->selectedBannieresPermission->count() === 5;
        $this->selecteAllRole = $this->selectedRolesPermission->count() === 5;
        $this->selecteAllUser = $this->selectedUsersPermission->count() === 5;
        $this->selecteAllClient = $this->selectedClientPermission->count() === 5;
        $this->selecteAllCampagne = $this->selectedCampagnesPermission->count() === 5;
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
            'permissions_client'      => Permission::where('table_name', '=', 'clients')->pluck('key', 'id'),
            'permissions_campagne'      => Permission::where('table_name', '=', 'campagnes')->pluck('key', 'id'),
            'permissions_banniere'   => Permission::where('table_name', '=', 'bannieres')->pluck('key', 'id'),
        ]);
    }
}
