<?php

namespace App\Http\Livewire\Admin\Client;

use App\Models\Client;
use App\Traits\ToastAlert;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class ClientDelete extends Component
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
        $user = Client::findOrFail($this->itemId);
        $this->authorize('delete', $user);
        $user->forceDelete();
        $this->reset();
        $this->closeDeleteModel();
        $this->emit('refreshParent');
        $this->banner('Client supprimée');
        $this->toast(__('Client supprimée'));

    }
    public function render()
    {
        return view('livewire.admin.client.client-delete');
    }
}
