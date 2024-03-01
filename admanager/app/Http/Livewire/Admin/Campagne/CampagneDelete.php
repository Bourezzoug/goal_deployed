<?php

namespace App\Http\Livewire\Admin\Campagne;

use App\Models\Campagne;
use Livewire\Component;
use App\Traits\ToastAlert;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Laravel\Jetstream\InteractsWithBanner;
class CampagneDelete extends Component
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
        $user = Campagne::findOrFail($this->itemId);
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
        return view('livewire.admin.campagne.campagne-delete');
    }
}
