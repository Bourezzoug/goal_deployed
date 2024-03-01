<?php

namespace App\Http\Livewire\Admin\Client;

use App\Models\Client;
use Livewire\Component;
use App\Traits\ToastAlert;


class ClientUpdate extends Component
{
    use ToastAlert;

    public $itemId,$nom;

    protected $listeners = ['showUpdateModel'];

    public bool $showUpdateModel = false;

    protected function rules()
    {
        return [
            'nom'       => ['required', 'string', 'max:50', 'min:3'],
        ];
    }

    public function showUpdateModel($itemId){
        $this->itemId = $itemId;
        $this->showUpdateModel = true;

        if (!empty($this->itemId)){
            $item = Client::find($this->itemId);
            $this->nom = $item->nom;
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
            'nom' => $this->nom,
        ];


        Client::where('id',$this->itemId)->update($data);
        $this->closeUpdateModel();
        $this->toast(__('Informations du client ont été mis à jour'));
        $this->emit('refreshParent');

    }

    public function render()
    {
        return view('livewire.admin.client.client-update');
    }
}
