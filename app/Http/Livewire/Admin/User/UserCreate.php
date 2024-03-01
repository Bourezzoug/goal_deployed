<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use App\Models\User_Role;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\WithFileUploads;
use App\Traits\ToastAlert;

class UserCreate extends Component
{
    use InteractsWithBanner;
    use WithFileUploads;
    use ToastAlert;
    public $roles;

    public $name, $username, $email,
        $roleId, $password, $password_confirmation, $avatar;
    


    protected $listeners = ['showCreateModel'];

    public function closeCreateModel(){
        $this->showCreateModel = false;
        $this->resetExcept('roles');
        $this->resetValidation();
        $this->resetErrorBag();
    }

    public bool $showCreateModel = false;

    public function showCreateModel(){
        $this->showCreateModel = true;
    }

    protected function rules()
        {
        return [
            'name' => ['required', 'string', 'max:50', 'min:5'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'roleId' => 'required|integer|exists:App\Models\Role,id',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,webp',
        ];
    }
    public function create(){
        $this->validate();

        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role_id' => $this->roleId,
            'profile_photo_path' => $this->avatar,
        ];

        if (!empty($this->avatar)) {
            $url = $this->avatar->store('profile-photos','public');
            $data['profile_photo_path'] = $url;
        }

        $user = User::create($data);
        $user->save();
        $data2 = [
            'user_id' => $user->id,
            'role_id' => $this->roleId
        ];
        User_Role::create($data2);
        $this->closeCreateModel();
        $this->banner('User Created');
        $this->emit('refreshParent');

    }

    public function mount($roles){
        $this->roles = $roles;
    }

    public function render()
    {
        return view('livewire.admin.user.user-create');
    }
}
