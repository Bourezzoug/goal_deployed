<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use App\Traits\ToastAlert;
use Laravel\Jetstream\InteractsWithBanner;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class UserDelete extends Component
{
    use ToastAlert;
    use InteractsWithBanner;
    use AuthorizesRequests;

    public $showDeleteModel = false;
    public $showRestoreModel = false;
    public $showForceDeleteModel = false;
    public $itemId;

    protected $listeners = ['showDeleteModel','showRestoreModel','showForceDeleteModel'];

    public function showDeleteModel($itemId){
        $this->itemId = $itemId;
        $this->showDeleteModel = true;
    }

    public function closeDeleteModel(){
        $this->showDeleteModel = false;
        $this->reset();
    }

    public function delete(){
        $user = User::findOrFail($this->itemId);
        $this->authorize('delete', $user);
        $user->forceDelete();
        $this->reset();
        $this->closeDeleteModel();
        $this->emit('refreshParent');
        $this->banner('Utilisateur supprimée');
        $this->toast(__('Utilisateur supprimée'));

    }

    public function render()
    {
        return view('livewire.admin.user.user-delete');
    }
}
