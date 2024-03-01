<?php

namespace App\Http\Livewire\Admin\Campagne;

use App\Models\Campagne;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;
use Illuminate\Validation\Rule;
class CampagneCreate extends Component
{
    use InteractsWithBanner;
    public $clients,$libelle,$clientId,$date_debut,$date_fin,$status;

    protected $listeners = ['showCreateModel'];

    public function closeCreateModel(){
        $this->showCreateModel = false;
        $this->resetExcept('clients');
        $this->resetValidation();
        $this->resetErrorBag();
    }

    public bool $showCreateModel = false;

    public function showCreateModel(){
        $this->showCreateModel = true;
    }

    public function mount($clients){
        $this->clients = $clients;
        $this->status = true;
    }

    protected function rules()
    {
    return [
        'libelle'       => ['required', 'string', 'max:50', 'min:3',Rule::unique(Campagne::class)],
        'clientId'      => 'required|integer|exists:App\Models\Client,id',
        'date_debut'    => 'required|date',
        'date_fin'      => 'required|date',
        'status'        => 'nullable|boolean',
    ];
    }
    public function create(){
        $this->validate();

        $data = [
            'libelle' => $this->libelle,
            'client_id' => $this->clientId,
            'date_debut' => $this->date_debut,
            'date_fin' => $this->date_fin,
            'status' => $this->status,
        ];

        Campagne::create($data);
        $this->closeCreateModel();
        $this->banner('Campagne Created');
        $this->emit('refreshParent');

    }
    public function render()
    {
        return view('livewire.admin.campagne.campagne-create');
    }
}
