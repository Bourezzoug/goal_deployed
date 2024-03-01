<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use App\Traits\ToastAlert;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserUpdate extends Component
{

    use ToastAlert;
    use WithFileUploads;

    public $roles;

    public $itemId,$name, $username, $email, $roleId, $password, $password_confirmation, $avatar ,$avatar_path;

    protected $listeners = ['showUpdateModel'];

    public bool $showUpdateModel = false;


    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:50', 'min:5'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users,email,'.$this->itemId],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'roleId' => 'required|integer|exists:App\Models\Role,id',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:1024',
        ];
    }


    public function mount($roles){
        $this->roles = $roles;
    }

    public function showUpdateModel($itemId){
        $this->itemId = $itemId;
        $this->showUpdateModel = true;

        if (!empty($this->itemId)){
            $item = User::find($this->itemId);
            $this->name = $item->name;
            $this->email = $item->email;

            $this->roleId = $item->role_id;
            $this->avatar_path = $item->profile_photo_path;

        }
    }

    public function closeUpdateModel(){
        $this->showUpdateModel = false;
        $this->resetExcept('roles');
        $this->resetValidation();
        $this->resetErrorBag();
    }

    public function edit(){
        $this->validate();

        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'role_id' => $this->roleId,
        ];

        if (!empty($this->avatar)) {
            $url = $this->avatar->store('profile-photos', 'public');
            $data['profile_photo_path'] = $url;
        }

        if (!empty($this->password)){
            $data['password'] = Hash::make($this->password);
        }


        User::where('id',$this->itemId)->update($data);
        $this->closeUpdateModel();
        $this->toast(__('Information d\'utilisateurs ont été mis à jour'));
        $this->emit('refreshParent');

    }





    public function updatedavatar()
    {
        $this->validate([
            'avatar' => 'image|mimes:jpeg,png,jpg|max:1024',
        ]);
    }

    public function updatedPassword()
    {
        $this->validate([
            'password' => 'string|min:8|confirmed',
        ]);
    }



    public function render()
    {
        return view('livewire.admin.user.user-update');
    }
}
