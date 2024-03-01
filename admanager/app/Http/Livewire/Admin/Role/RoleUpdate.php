<?php

namespace App\Http\Livewire\Admin\Role;

use App\Models\Permission;
use App\Models\Role;
use App\Models\UserPermission;
use Livewire\Component;
use App\Traits\ToastAlert;
use Laravel\Jetstream\InteractsWithBanner;

class RoleUpdate extends Component
{
    use InteractsWithBanner;
    use ToastAlert;

    public $itemId;

    public $selectedBannieresPermission = [];
    public $selecteAllBanniere = false;

    public $selectedRolesPermission = [];
    public $selecteAllRole = false;

    public $selectedUsersPermission = [];
    public $selecteAllUser = false;

    public $selectedClientsPermission = [];
    public $selecteAllClient = false;

    public $selectedCampagnesPermission = [];
    public $selecteAllCampagne = false;

    
    public $selectedMenuPermission = [];


    public $name, $color, $key;

    protected $listeners = ['showUpdateModel'];
    


    public bool $showUpdateModel = false;

    protected function rules()
    {
    return [
        'name'      => ['required', 'string', 'max:50', 'min:5', 'unique:roles,name,'.$this->itemId],
        'key'       => ['required', 'string', 'max:50', 'min:5', 'unique:roles,key,'.$this->itemId],
        'color'     => ['nullable', 'string', 'min:7', 'max:20' ],
    ];
    }

    public function mount() {
        $this->selectedRolesPermission = collect();
        $this->selectedUsersPermission = collect();
        $this->selectedClientsPermission = collect();
        $this->selectedCampagnesPermission = collect();
        $this->selectedBannieresPermission = collect();
    }

    public function updatedSelecteAllBanniere($value) {
        if($value) {
            $this->selectedBannieresPermission = Permission::where('table_name', 'bannieres')->pluck('id');
        }
        else{
            $this->selectedBannieresPermission = [];
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

    public function updatedSelecteAllClient($value) {
        if($value) {
            $this->selectedClientsPermission = Permission::where('table_name', 'clients')->pluck('id');
        }
        else{
            $this->selectedClientsPermission = [];
        }
    }

    public function updatedSelecteAllCampagne($value) {
        if($value) {
            $this->selectedCampagnesPermission = Permission::where('table_name', 'campagnes')->pluck('id');
        }
        else{
            $this->selectedCampagnesPermission = [];
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
    public function updatedSelectedClientsPermission($value) {
        if(count($value) <= 5) {
            $this->selecteAllClient = false;
        }
    }
    public function updatedSelectedCampagnesPermission($value) {
        if(count($value) <= 5) {
            $this->selecteAllCampagne = false;
        }
    }

    public function showUpdateModel($itemId){
        $this->itemId = $itemId;
        $this->showUpdateModel = true;
        $this->selectedBannieresPermission = UserPermission::where('role_id', $this->itemId)
        ->whereIn('permission_id', [7,8,9,10,11])
        ->pluck('permission_id');

        $this->selectedRolesPermission = UserPermission::where('role_id', $this->itemId)
        ->whereIn('permission_id', [19,20,21,22,23])
        ->pluck('permission_id');
        $this->selectedUsersPermission = UserPermission::where('role_id', $this->itemId)
        ->whereIn('permission_id', [25,26,27,28,29])
        ->pluck('permission_id');
        $this->selectedClientsPermission = UserPermission::where('role_id', $this->itemId)
        ->whereIn('permission_id', [1,2,3,4,5])
        ->pluck('permission_id');
        $this->selectedCampagnesPermission = UserPermission::where('role_id', $this->itemId)
        ->whereIn('permission_id', [13,14,15,16,17])
        ->pluck('permission_id');


        $this->selectedMenuPermission = UserPermission::where('role_id', $this->itemId)
        // ->whereIn('permission_id', [11,12,13,14,15])
        ->pluck('permission_id');

        $this->selecteAllBanniere = $this->selectedBannieresPermission->count() === 5;
        $this->selecteAllRole = $this->selectedRolesPermission->count() === 5;
        $this->selecteAllUser = $this->selectedUsersPermission->count() === 5;
        $this->selecteAllClient = $this->selectedClientsPermission->count() === 5;
        $this->selecteAllCampagne = $this->selectedCampagnesPermission->count() === 5;

        if (!empty($this->itemId)){
            $item = Role::find($this->itemId);

            $this->name = $item->name;
            $this->key = $item->key;
            $this->color = $item->color;

        }

    }

    public function closeUpdateModel(){
        $this->showUpdateModel = false;
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    public function edit(){
        $this->validate();

        $data = [
            'name'      =>  $this->name,
            'key'      =>  $this->key,
            'color'     =>  $this->color,
        ];



        Role::where('id',$this->itemId)->update($data);


        UserPermission::where('role_id', $this->itemId)
        ->whereIn('permission_id', [7,8,9,10,11,12])
        ->whereNotIn('permission_id', $this->selectedBannieresPermission)
        ->delete();


        foreach ($this->selectedBannieresPermission as $banniereId) {
            UserPermission::where('role_id', $this->itemId)
                ->whereIn('permission_id', [7,8,9,10,11])
                ->updateOrCreate(['permission_id' => $banniereId ],['role_id' => $this->itemId]);
                if ($banniereId == 11 && $this->selecteAllBanniere == false) {
                    UserPermission::where('role_id', $this->itemId)
                    ->updateOrCreate(['permission_id' => 12 ],['role_id' => $this->itemId]);
                }
        }


        UserPermission::where('role_id', $this->itemId)
        ->whereIn('permission_id', [19,20,21,22,23,24])
        ->whereNotIn('permission_id', $this->selectedRolesPermission)
        ->delete();


        foreach ($this->selectedRolesPermission as $roleId) {
            UserPermission::where('role_id', $this->itemId)
                ->whereIn('permission_id', [19,20,21,22,23])
                ->updateOrCreate(['permission_id' => $roleId ],['role_id' => $this->itemId]);
                if ($roleId == 23 && $this->selecteAllRole == false) {
                    UserPermission::where('role_id', $this->itemId)
                    ->updateOrCreate(['permission_id' => 24 ],['role_id' => $this->itemId]);
                }
        }

        UserPermission::where('role_id', $this->itemId)
        ->whereIn('permission_id', [25,26,27,28,29,30])
        ->whereNotIn('permission_id', $this->selectedUsersPermission)
        ->delete();


        foreach ($this->selectedUsersPermission as $userId) {
            UserPermission::where('role_id', $this->itemId)
                ->whereIn('permission_id', [25,26,27,28,29])
                ->updateOrCreate(['permission_id' => $userId ],['role_id' => $this->itemId]);
                if ($userId == 29 && $this->selecteAllUser == false) {
                    UserPermission::where('role_id', $this->itemId)
                    ->updateOrCreate(['permission_id' => 30 ],['role_id' => $this->itemId]);
                }
        }

        UserPermission::where('role_id', $this->itemId)
        ->whereIn('permission_id', [1,2,3,4,5,6])
        ->whereNotIn('permission_id', $this->selectedClientsPermission)
        ->delete();


        foreach ($this->selectedClientsPermission as $categorieId) {
            UserPermission::where('role_id', $this->itemId)
                ->whereIn('permission_id', [1,2,3,4,5])
                ->updateOrCreate(['permission_id' => $categorieId ],['role_id' => $this->itemId]);
                if ($categorieId == 5 && $this->selecteAllClient == false) {
                    UserPermission::where('role_id', $this->itemId)
                    ->updateOrCreate(['permission_id' => 6 ],['role_id' => $this->itemId]);
                }
        }


        UserPermission::where('role_id', $this->itemId)
        ->whereIn('permission_id', [13,14,15,16,17,18])
        ->whereNotIn('permission_id', $this->selectedCampagnesPermission)
        ->delete();


        foreach ($this->selectedCampagnesPermission as $postId) {
            UserPermission::where('role_id', $this->itemId)
                ->whereIn('permission_id', [13,14,15,16,17])
                ->updateOrCreate(['permission_id' => $postId ],['role_id' => $this->itemId]);
                if ($postId == 17 && $this->selecteAllCampagne == false) {
                    UserPermission::where('role_id', $this->itemId)
                    ->updateOrCreate(['permission_id' => 18 ],['role_id' => $this->itemId]);
                }
        }

        if ($this->selectedMenuPermission) {
            UserPermission::updateOrCreate(
                ['role_id' => $this->itemId, 'permission_id' => 31]
            );
        // dd($this->selecteAllSurvey);

        }
        if(!in_array(31,$this->selectedMenuPermission)) {
            
        
            UserPermission::where('role_id', $this->itemId)
                ->where('permission_id', 31)
                ->delete();
        // dd($this->selecteAllSurvey);

        }
        
        $this->closeUpdateModel();
        $this->toast(__('Les informations de ce role ont été mis à jour'));
        $this->banner('Les informations de ce role ont été mis à jour');
        $this->emit('refreshParent');

    //     // dd($this->selectedBannieresPermission);
    }

    public function render()
    {
        return view('livewire.admin.role.role-update',[
            'permissions_banniere'  => Permission::where('table_name', '=', 'bannieres')->pluck('key', 'id'),
            'permissions_role'      => Permission::where('table_name', '=', 'roles')->pluck('key', 'id'),
            'permissions_users'     => Permission::where('table_name', '=', 'users')->pluck('key', 'id'),
            'permissions_clients'   => Permission::where('table_name', '=', 'clients')->pluck('key', 'id'),
            'permissions_campagne'  => Permission::where('table_name', '=', 'campagnes')->pluck('key', 'id'),
        ]);
    }
}
