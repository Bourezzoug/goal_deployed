<?php

namespace App\Http\Livewire\Admin\Role;

use App\Models\Permission;
use App\Models\Role;
use App\Models\UserPermission;
use App\Traits\ToastAlert;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;
use Illuminate\Validation\Rule;

class RoleCreate extends Component
{
    use InteractsWithBanner;
    use ToastAlert;

    public $name,$key,$color;
    public $selectedPagesPermission = [];
    public $selectedRolesPermission = [];
    public $selectedUsersPermission = [];
    public $selectedCampagnesPermission = [];
    public $selectedClientsPermission = [];
    public $selectedBannieresPermission = [];
    public $selectedMenuPermission = null;
    public $selecteAllPages = false;
    public $selecteAllRole = false;
    public $selecteAllUser = false;
    public $selecteAllCampagne = false;
    public $selecteAllClient = false;
    public $selecteAllBanniere = false;


    protected $listeners = ['showCreateModel'];

    public bool $showCreateModel = false;

    public function showCreateModel(){
        $this->showCreateModel = true;
    }

    public function closeCreateModel(){
        $this->showCreateModel = false;
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    public function mount() {
        $this->selectedRolesPermission = collect();
        $this->selectedUsersPermission = collect();
        $this->selectedCampagnesPermission = collect();
        $this->selectedClientsPermission = collect();
        $this->selectedBannieresPermission = collect();
        
    }

    public function updatedSelecteAllPages($value) {
        if($value) {
            $this->selectedPagesPermission = Permission::pluck('id');
        }
        else{
            $this->selectedPagesPermission = [];
        }
    }
    public function updatedSelecteAllRole($value) {
        if($value) {
            $this->selectedRolesPermission = Permission::where('table_name', 'roles')->pluck('id');
        }
        else{
            $this->selectedRolesPermission = [];
        }
    }
    public function updatedSelecteAllUser($value) {
        if($value) {
            $this->selectedUsersPermission = Permission::where('table_name', 'users')->pluck('id');
        }
        else{
            $this->selectedUsersPermission = [];
        }
    }
    public function updatedselecteAllCampagne($value) {
        if($value) {
            $this->selectedCampagnesPermission = Permission::where('table_name', 'campagnes')->pluck('id');
        }
        else{
            $this->selectedCampagnesPermission = [];
        }
    }
    public function updatedSelecteAllClient($value) {
        if($value) {
            $this->selectedClientsPermission = Permission::where('table_name', 'clients')->pluck('id');
        }
        else{
            $this->selectedClientsPermission = [];
        }
    }
    public function updatedSelecteAllBanniere($value) {
        if($value) {
            $this->selectedBannieresPermission = Permission::where('table_name', 'bannieres')->pluck('id');
        }
        else{
            $this->selectedBannieresPermission = [];
        }
    }

    public function updatedSelectedBannieresPermission($value) {
        if(count($value) <= 5) {
            $this->selecteAllBanniere = false;
        }
    }
    public function updatedSelectedRolesPermission($value) {
        if(count($value) <= 5) {
            $this->selecteAllRole = false;
        }
    }
    public function updatedSelectedUsersPermission($value) {
        if(count($value) <= 5) {
            $this->selecteAllUser = false;
        }
    }
    public function updatedSelectedCampagnesPermission($value) {
        if(count($value) <= 5) {
            $this->selecteAllCampagne = false;
        }
    }
    public function updatedSelectedClientsPermission($value) {
        if(count($value) <= 5) {
            $this->selecteAllClient = false;
        }
    }

    protected function rules()
    {
    return [
        'name'      => ['required', 'string', 'max:50', 'min:5', Rule::unique(Role::class)],
        'key'       => ['required', 'string', 'max:50', 'min:5', Rule::unique(Role::class)],
        'color'     => ['nullable', 'string', 'min:7', 'max:25' ],
    ];
    }

    public function create(){
        $this->validate();

        $data = [
            'name'      =>  $this->name,
            'key'       =>  $this->key,
            'color'     =>  $this->color,
        ];

        $role = Role::create($data);
        // create permissions for posts
        foreach ($this->selectedClientsPermission as $permissionId) {
        UserPermission::create([
                'role_id' => $role->id,
                'permission_id' => $permissionId,
        ]);
        if ($permissionId == 5 && $this->selecteAllClient == false) {
            UserPermission::create([
                'role_id' => $role->id,
                'permission_id' => 6,
            ]);
        }
        }
        foreach ($this->selectedRolesPermission as $roleId) {
        UserPermission::create([
                'role_id' => $role->id,
                'permission_id' => $roleId,
        ]);
        if ($roleId == 23 && $this->selecteAllRole == false) {
            UserPermission::create([
                'role_id' => $role->id,
                'permission_id' => 24,
            ]);
        }
        }
        foreach ($this->selectedUsersPermission as $userId) {
        UserPermission::create([
                'role_id' => $role->id,
                'permission_id' => $userId,
        ]);
        if ($userId == 29 && $this->selecteAllUser == false) {
            UserPermission::create([
                'role_id' => $role->id,
                'permission_id' => 30,
            ]);
        }
        }
        foreach ($this->selectedCampagnesPermission as $campagneId) {
        UserPermission::create([
                'role_id' => $role->id,
                'permission_id' => $campagneId,
        ]);
        if ($campagneId == 17 && $this->selecteAllCampagne == false) {
            UserPermission::create([
                'role_id' => $role->id,
                'permission_id' => 18,
            ]);
        }
        }
        foreach ($this->selectedBannieresPermission as $bannierId) {
        UserPermission::create([
                'role_id' => $role->id,
                'permission_id' => $bannierId,
        ]);
        if ($bannierId == 11 && $this->selecteAllBanniere == false) {
            UserPermission::create([
                'role_id' => $role->id,
                'permission_id' => 12,
            ]);
        }
        }
        if($this->selectedMenuPermission != null) {
            UserPermission::create([
                'role_id' => $role->id,
                'permission_id' => $this->selectedMenuPermission,
            ]);
        }
        $this->closeCreateModel();
        $this->banner('Vous avez créé un nouveau role');
        $this->emit('refreshParent');
    }
    
    public function render()
    {
        return view('livewire.admin.role.role-create',[
            // 'permissions_page'      => Permission::where('table_name', '=', 'pages')->pluck('key', 'id'),
            'permissions_role'      => Permission::where('table_name', '=', 'roles')->pluck('key', 'id'),
            'permissions_users'     => Permission::where('table_name', '=', 'users')->pluck('key', 'id'),
            'permissions_campagnes' => Permission::where('table_name', '=', 'campagnes')->pluck('key', 'id'),
            'permissions_client'    => Permission::where('table_name', '=', 'clients')->pluck('key', 'id'),
            'permissions_banniere'   => Permission::where('table_name', '=', 'bannieres')->pluck('key', 'id'),
            // 'permissions_survey' => Permission::where('table_name', '=', 'surveys')->pluck('key', 'id'),
        ]);
    }
}
