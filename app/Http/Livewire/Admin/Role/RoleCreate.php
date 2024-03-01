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
    public $selectedCategoriesPermission = [];
    public $selectedPostsPermission = [];
    public $selectedInscritsPermission = [];
    public $selectedSurveysPermission = [];
    
    public $selectedMenuPermission = null;
    public $selectedAlertPermission = null;
    public $selecteAllPages = false;
    public $selecteAllRole = false;
    public $selecteAllUser = false;
    public $selecteAllCategorie = false;
    public $selecteAllPost = false;
    public $selecteAllInscrit = false;
    public $selecteAllSurvey = false;


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
        $this->selectedCategoriesPermission = collect();
        $this->selectedPostsPermission = collect();
        $this->selectedInscritsPermission = collect();
        
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
    public function updatedSelecteAllInscrit($value) {
        if($value) {
            $this->selectedInscritsPermission = Permission::where('table_name', 'inscrits')->pluck('id');
        }
        else{
            $this->selectedInscritsPermission = [];
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
    public function updatedSelectedSurveysPermission($value) {
        if(count($value) <= 5) {
            $this->selecteAllSurvey = false;
        }
    }

    protected function rules()
    {
    return [
        'name'      => ['required', 'string', 'max:50', 'min:5', Rule::unique(Role::class)],
        'key'       => ['nullable', 'string', 'max:50', 'min:5', Rule::unique(Role::class)],
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
        foreach ($this->selectedPostsPermission as $permissionId) {
        UserPermission::create([
                'role_id' => $role->id,
                'permission_id' => $permissionId,
        ]);
        if ($permissionId == 10 && $this->selecteAllPost == false) {
            UserPermission::create([
                'role_id' => $role->id,
                'permission_id' => 35,
            ]);
        }
        }
        foreach ($this->selectedRolesPermission as $roleId) {
        UserPermission::create([
                'role_id' => $role->id,
                'permission_id' => $roleId,
        ]);
        if ($roleId == 10 && $this->selecteAllRole == false) {
            UserPermission::create([
                'role_id' => $role->id,
                'permission_id' => 34,
            ]);
        }
        }
        foreach ($this->selectedUsersPermission as $userId) {
        UserPermission::create([
                'role_id' => $role->id,
                'permission_id' => $userId,
        ]);
        if ($userId == 10 && $this->selecteAllUser == false) {
            UserPermission::create([
                'role_id' => $role->id,
                'permission_id' => 32,
            ]);
        }
        }
        foreach ($this->selectedCategoriesPermission as $categorieId) {
        UserPermission::create([
                'role_id' => $role->id,
                'permission_id' => $categorieId,
        ]);
        if ($categorieId == 10 && $this->selecteAllCategorie == false) {
            UserPermission::create([
                'role_id' => $role->id,
                'permission_id' => 33,
            ]);
        }
        }
        foreach ($this->selectedInscritsPermission as $inscritId) {
        UserPermission::create([
                'role_id' => $role->id,
                'permission_id' => $inscritId,
        ]);
        if ($inscritId == 10 && $this->selecteAllInscrit == false) {
            UserPermission::create([
                'role_id' => $role->id,
                'permission_id' => 36,
            ]);
        }
        }
        foreach ($this->selectedSurveysPermission as $surveyId) {
        UserPermission::create([
                'role_id' => $role->id,
                'permission_id' => $surveyId,
        ]);
        if ($surveyId == 10 && $this->selecteAllSurvey == false) {
            UserPermission::create([
                'role_id' => $role->id,
                'permission_id' => 37,
            ]);
        }
        }
        if($this->selectedMenuPermission != null) {
            UserPermission::create([
                'role_id' => $role->id,
                'permission_id' => $this->selectedMenuPermission,
            ]);
        }
        if($this->selectedAlertPermission != null) {
            UserPermission::create([
                'role_id' => $role->id,
                'permission_id' => $this->selectedAlertPermission,
            ]);
        }
        $this->closeCreateModel();
        $this->banner('Vous avez créé un nouveau role');
        $this->emit('refreshParent');
    }
    
    public function render()
    {
        return view('livewire.admin.role.role-create',[
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
