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
    public $selectedAlertPermission = [];


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
        $this->selectedCategoriesPermission = collect();
        $this->selectedPostsPermission = collect();
        $this->selectedInscritsPermission = collect();
    }

    public function updatedSelecteAllInscrit($value) {
        if($value) {
            $this->selectedInscritsPermission = Permission::where('table_name', 'inscrits')->pluck('id');
        }
        else{
            $this->selectedInscritsPermission = [];
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

    public function updatedSelecteAllCategorie($value) {
        if($value) {
            $this->selectedCategoriesPermission = Permission::where('table_name', 'categories')->pluck('id');
        }
        else{
            $this->selectedCategoriesPermission = [];
        }
    }

    public function updatedSelecteAllPost($value) {
        if($value) {
            $this->selectedPostsPermission = Permission::where('table_name', 'posts')->pluck('id');
        }
        else{
            $this->selectedPostsPermission = [];
        }
    }
    public function updatedSelecteAllSurvey($value) {
        if($value) {
            $this->selectedSurveysPermission = Permission::where('table_name', 'surveys')->pluck('id');
        }
        else{
            $this->selectedSurveysPermission = [];
        }
    }
    public function updatedSelectedInscritsPermission($value) {
        if(count($value) <= 5) {
            $this->selecteAllInscrit = false;
        }
    }
    public function updatedSelectedSurveysPermission($value) {
        if(count($value) <= 5) {
            $this->selecteAllSurvey = false;
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
    public function updatedSelectedCategoriesPermission($value) {
        if(count($value) <= 5) {
            $this->selecteAllCategorie = false;
        }
    }
    public function updatedSelectedPostsPermission($value) {
        if(count($value) <= 5) {
            $this->selecteAllPost = false;
        }
    }

    public function showUpdateModel($itemId){
        $this->itemId = $itemId;
        $this->showUpdateModel = true;
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
        // ->whereIn('permission_id', [11,12,13,14,15])
        ->pluck('permission_id');
        $this->selectedAlertPermission = UserPermission::where('role_id', $this->itemId)
        // ->whereIn('permission_id', [11,12,13,14,15])
        ->pluck('permission_id');

        $this->selecteAllInscrit = $this->selectedInscritsPermission->count() === 5;
        $this->selecteAllRole = $this->selectedRolesPermission->count() === 5;
        $this->selecteAllUser = $this->selectedUsersPermission->count() === 5;
        $this->selecteAllCategorie = $this->selectedCategoriesPermission->count() === 5;
        $this->selecteAllPost = $this->selectedPostsPermission->count() === 5;
        $this->selecteAllSurvey = $this->selectedSurveysPermission->count() === 5;

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
        ->whereIn('permission_id', [6,7,8,9,10,36])
        ->whereNotIn('permission_id', $this->selectedInscritsPermission)
        ->delete();


        foreach ($this->selectedInscritsPermission as $inscritId) {
            UserPermission::where('role_id', $this->itemId)
                ->whereIn('permission_id', [6,7,8,9,10])
                ->updateOrCreate(['permission_id' => $inscritId ],['role_id' => $this->itemId]);
                if ($inscritId == 10 && $this->selecteAllInscrit == false) {
                    UserPermission::where('role_id', $this->itemId)
                    ->updateOrCreate(['permission_id' => 36 ],['role_id' => $this->itemId]);
                }
        }


        UserPermission::where('role_id', $this->itemId)
        ->whereIn('permission_id', [16,17,18,19,20,34])
        ->whereNotIn('permission_id', $this->selectedRolesPermission)
        ->delete();


        foreach ($this->selectedRolesPermission as $roleId) {
            UserPermission::where('role_id', $this->itemId)
                ->whereIn('permission_id', [16,17,18,19,20])
                ->updateOrCreate(['permission_id' => $roleId ],['role_id' => $this->itemId]);
                if ($roleId == 20 && $this->selecteAllRole == false) {
                    UserPermission::where('role_id', $this->itemId)
                    ->updateOrCreate(['permission_id' => 34 ],['role_id' => $this->itemId]);
                }
        }

        UserPermission::where('role_id', $this->itemId)
        ->whereIn('permission_id', [21,22,23,24,25,32])
        ->whereNotIn('permission_id', $this->selectedUsersPermission)
        ->delete();


        foreach ($this->selectedUsersPermission as $userId) {
            UserPermission::where('role_id', $this->itemId)
                ->whereIn('permission_id', [21,22,23,24,25])
                ->updateOrCreate(['permission_id' => $userId ],['role_id' => $this->itemId]);
                if ($userId == 25 && $this->selecteAllUser == false) {
                    UserPermission::where('role_id', $this->itemId)
                    ->updateOrCreate(['permission_id' => 32 ],['role_id' => $this->itemId]);
                }
        }

        UserPermission::where('role_id', $this->itemId)
        ->whereIn('permission_id', [1,2,3,4,5,33])
        ->whereNotIn('permission_id', $this->selectedCategoriesPermission)
        ->delete();


        foreach ($this->selectedCategoriesPermission as $categorieId) {
            UserPermission::where('role_id', $this->itemId)
                ->whereIn('permission_id', [1,2,3,4,5])
                ->updateOrCreate(['permission_id' => $categorieId ],['role_id' => $this->itemId]);
                if ($categorieId == 5 && $this->selecteAllCategorie == false) {
                    UserPermission::where('role_id', $this->itemId)
                    ->updateOrCreate(['permission_id' => 33 ],['role_id' => $this->itemId]);
                }
        }


        UserPermission::where('role_id', $this->itemId)
        ->whereIn('permission_id', [11,12,13,14,15,35])
        ->whereNotIn('permission_id', $this->selectedPostsPermission)
        ->delete();


        foreach ($this->selectedPostsPermission as $postId) {
            UserPermission::where('role_id', $this->itemId)
                ->whereIn('permission_id', [11,12,13,14,15])
                ->updateOrCreate(['permission_id' => $postId ],['role_id' => $this->itemId]);
                if ($postId == 15 && $this->selecteAllPost == false) {
                    UserPermission::where('role_id', $this->itemId)
                    ->updateOrCreate(['permission_id' => 35 ],['role_id' => $this->itemId]);
                }
        }

        UserPermission::where('role_id', $this->itemId)
        ->whereIn('permission_id', [26,28,29,30,31,37])
        ->whereNotIn('permission_id', $this->selectedSurveysPermission)
        ->delete();

        foreach ($this->selectedSurveysPermission as $surveyId) {
            UserPermission::where('role_id', $this->itemId)
                ->whereIn('permission_id', [26,28,29,30,31])
                ->updateOrCreate(['permission_id' => $surveyId ],['role_id' => $this->itemId]);
                if ($surveyId == 31 && $this->selecteAllSurvey == false) {
                    UserPermission::where('role_id', $this->itemId)
                    ->updateOrCreate(['permission_id' => 37 ],['role_id' => $this->itemId]);
                }
        }
        if ($this->selectedMenuPermission) {
            UserPermission::updateOrCreate(
                ['role_id' => $this->itemId, 'permission_id' => 27]
            );


        }
        if(!in_array(27,$this->selectedMenuPermission)) {
            
        
            UserPermission::where('role_id', $this->itemId)
                ->where('permission_id', 27)
                ->delete();


        }
        if ($this->selectedAlertPermission) {
            UserPermission::updateOrCreate(
                ['role_id' => $this->itemId, 'permission_id' => 38]
            );
        // dd($this->selecteAllSurvey);

        }
        if(!in_array(38,$this->selectedAlertPermission)) {
            
        
            UserPermission::where('role_id', $this->itemId)
                ->where('permission_id', 38)
                ->delete();
        // dd($this->selecteAllSurvey);

        }
        
        $this->closeUpdateModel();
        $this->toast(__('Les informations de ce role ont été mis à jour'));
        $this->banner('Les informations de ce role ont été mis à jour');
        $this->emit('refreshParent');

    //     // dd($this->selectedInscritsPermission);
    }

    public function render()
    {
        return view('livewire.admin.role.role-update',[
            'permissions_inscrit'       => Permission::where('table_name', '=', 'inscrits')->pluck('key', 'id'),
            'permissions_role'          => Permission::where('table_name', '=', 'roles')->pluck('key', 'id'),
            'permissions_users'         => Permission::where('table_name', '=', 'users')->pluck('key', 'id'),
            'permissions_cats'          => Permission::where('table_name', '=', 'categories')->pluck('key', 'id'),
            'permissions_post'          => Permission::where('table_name', '=', 'posts')->pluck('key', 'id'),
            'permissions_survey'        => Permission::where('table_name', '=', 'surveys')->pluck('key', 'id'),
        ]);
    }
}
