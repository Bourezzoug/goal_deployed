<?php

namespace App\Http\Livewire\Admin\Api;

use App\Models\FootballApi;
use App\Traits\ToastAlert;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;
use Livewire\WithFileUploads;

class ApiCreate extends Component
{
    use InteractsWithBanner;
    use WithFileUploads;
    use ToastAlert;

    public $equipe1_name,$equipe2_name,$equipe1_logo,$equipe2_logo,$heure,$resultat,$date_match;

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
        'equipe1_name'  => ['required', 'string'],
        'equipe2_name'  => ['required', 'string'],
        'equipe1_logo'  => 'required|image|mimes:jpeg,png,jpg,webp,gif',
        'equipe2_logo'  => 'required|image|mimes:jpeg,png,jpg,webp,gif',
        'heure'         => ['required', 'string', 'min:5'],
        'date_match'    => ['required', 'string', 'min:5']  
    ];
    }
    public function create(){
        $this->validate();

        $data = [
            'equipe1_name'  => $this->equipe1_name,
            'equipe2_name'  => $this->equipe2_name,
            'heure_match'   => $this->heure,
            'logo_equipe_1' => $this->equipe1_logo,
            'logo_equipe_2' => $this->equipe2_logo,
            'date_match'    => $this->date_match
        ];

        if (!empty($this->equipe1_logo)) {
            $url = $this->equipe1_logo->store('files/1/teams','public');
            $data['logo_equipe_1'] = '/storage/' . $url;
        }

        if (!empty($this->equipe2_logo)) {
            $url = $this->equipe2_logo->store('files/1/teams','public');
            $data['logo_equipe_2'] = '/storage/' . $url;
        }


        FootballApi::create($data);

        $this->closeCreateModel();
        $this->banner('User Created');
        $this->emit('refreshParent');
        
        return redirect()->to('/admin/api-football');

    }

    public function render()
    {
        return view('livewire.admin.api.api-create');
    }
}
