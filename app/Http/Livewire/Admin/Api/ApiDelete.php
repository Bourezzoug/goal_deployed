<?php

namespace App\Http\Livewire\Admin\Api;

use App\Models\FootballApi;
use App\Traits\ToastAlert;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class ApiDelete extends Component
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
        $user = FootballApi::findOrFail($this->itemId);

        $image_path = public_path()  ;
        $image = $image_path . $user->logo_equipe_1;
        $image2 = $image_path . $user->logo_equipe_2;
        if(file_exists($image)) {
            @unlink($image);
        }
        if(file_exists($image2)) {
            @unlink($image2);
        }


        // $this->authorize('delete', $user);
        $user->forceDelete();
        $this->reset();
        $this->closeDeleteModel();
        $this->emit('refreshParent');
        $this->banner('Matche supprimé');
        $this->toast(__('Matche supprimé'));

    }
    public function render()
    {
        return view('livewire.admin.api.api-delete');
    }
}
