<?php

namespace App\Http\Livewire\Admin\Client;

use App\Models\Client;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;
use Illuminate\Validation\Rule;

class ClientCreate extends Component
{
    use InteractsWithBanner;

    public $nom;

    protected $listeners = ['showCreateModel'];

    public function closeCreateModel(){
        $this->showCreateModel = false;
        $this->resetExcept('roles');
        $this->resetValidation();
        $this->resetErrorBag();
    }

    public bool $showCreateModel = false;

    public function showCreateModel(){
        $this->showCreateModel = true;
    }
    protected function rules()
    {
    return [
        'nom' => ['required', 'string', 'max:50', 'min:3',Rule::unique(Client::class)],
    ];
    }
    public function create(){
        $this->validate();

        $data = [
            'nom' => $this->nom,
        ];

        $user = Client::create($data);
        $this->closeCreateModel();
        $this->banner('User Created');
        $this->emit('refreshParent');

    }
    public function render()
    {
        return view('livewire.admin.client.client-create');
    }
}
