<?php

namespace App\Http\Livewire\Admin\Campagne;

use App\Models\Campagne;
use App\Traits\ToastAlert;
use Livewire\Component;

class CampagneUpdate extends Component
{
    use ToastAlert;

    public $itemId,$libelle,$date_debut,$date_fin,$status,$clientId,$clients;

    protected $listeners = ['showUpdateModel'];

    public bool $showUpdateModel = false;

    public function mount($clients){
        $this->clients = $clients;
    }

    protected function rules()
    {
    return [
        'libelle'       => ['required', 'string', 'max:50', 'min:3'],
        'clientId'      => 'required|integer|exists:App\Models\Client,id',
        'date_debut'    => 'required|date',
        'date_fin'      => 'required|date',
        'status'        => 'nullable|boolean',
    ];
    }

    public function showUpdateModel($itemId){
        $this->itemId = $itemId;
        $this->showUpdateModel = true;

        if (!empty($this->itemId)){
            $item = Campagne::find($this->itemId);
            $this->libelle = $item->Libelle;
            $this->date_debut = $item->date_debut;
            $this->date_fin = $item->date_fin;
            $this->status = $item->status;
            $this->clientId = $item->client_id;
        }
    }

    public function edit(){
        $this->validate();

        $data = [
            'Libelle' => $this->libelle,
            'date_debut' => $this->date_debut,
            'date_fin' => $this->date_fin,
            'status' => $this->status,
            'client_id' => $this->clientId,
        ];


        Campagne::where('id',$this->itemId)->update($data);
        $this->closeUpdateModel();
        $this->toast(__('Informations du client ont été mis à jour'));
        $this->emit('refreshParent');

    }

    public function closeUpdateModel(){
        $this->showUpdateModel = false;
        $this->resetExcept('clients');
        $this->resetValidation();
        $this->resetErrorBag();
    }
    public function render()
    {
        return view('livewire.admin.campagne.campagne-update');
    }
}
