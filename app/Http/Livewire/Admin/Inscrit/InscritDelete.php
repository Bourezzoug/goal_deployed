<?php

namespace App\Http\Livewire\Admin\Inscrit;

use App\Models\Inscrit;
use App\Traits\ToastAlert;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class InscritDelete extends Component
{
    use ToastAlert;
    use AuthorizesRequests;
    use InteractsWithBanner;

    public $showDeleteModel = false;
    public $showForceDeleteModel = false;
    public $itemId;

    protected $listeners = ['showDeleteModel'];

    public function showDeleteModel($itemId){
        $this->itemId = $itemId;
        $this->showDeleteModel = true;
    }

    public function closeDeleteModel(){
        $this->showDeleteModel = false;
        $this->reset();
    }

    public function delete(){
        $user = Inscrit::findOrFail($this->itemId);
        $this->authorize('delete', $user);
        $user->forceDelete();
        $this->reset();
        $this->closeDeleteModel();
        $this->emit('refreshParent');
        $this->banner('Inscrit supprimée');
        $this->toast(__('Inscrit supprimée'));

    }
    public function render()
    {
        return view('livewire.admin.inscrit.inscrit-delete');
    }
}
