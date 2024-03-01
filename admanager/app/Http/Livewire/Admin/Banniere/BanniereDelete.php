<?php

namespace App\Http\Livewire\Admin\Banniere;

use App\Models\Banniere;
use App\Traits\ToastAlert;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class BanniereDelete extends Component
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
        $user = Banniere::findOrFail($this->itemId);
        $this->authorize('delete', $user);
        $user->forceDelete();
        $this->reset();
        $this->closeDeleteModel();
        $this->emit('refreshParent');
        $this->banner('Campagne supprimée');
        $this->toast(__('Campagne supprimée'));

    }
    public function render()
    {
        return view('livewire.admin.banniere.banniere-delete');
    }
}
