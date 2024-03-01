<?php

namespace App\Http\Livewire\Admin\Api;

use App\Models\FootballApi;
use App\Traits\ToastAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class ApiUpdate extends Component
{
    use WithFileUploads;
    use ToastAlert;

    public $itemId,$equipe1_name,$equipe2_name,$equipe1_logo,$equipe1_logo_path,$equipe2_logo,$equipe2_logo_path,$heure,$resultat;

    protected $listeners = ['showUpdateModel'];

    public bool $showUpdateModel = false;

    protected function rules()
    {
    return [
        'equipe1_name'  => ['required', 'string'],
        'equipe2_name'  => ['required', 'string'],
        'equipe1_logo'  => 'nullable|image|mimes:jpeg,png,jpg,webp,gif',
        'equipe2_logo'  => 'nullable|image|mimes:jpeg,png,jpg,webp,gif',
        'heure'         => ['required', 'string', 'min:5'],
        'resultat'      => ['nullable', 'string', 'min:3'],
    ];
    }

    public function showUpdateModel($itemId){
        $this->itemId = $itemId;
        $this->showUpdateModel = true;

        if (!empty($this->itemId)){
            $item = FootballApi::find($this->itemId);
            $this->equipe1_name         = $item->equipe1_name;
            $this->equipe2_name         = $item->equipe2_name;
            $this->equipe1_logo_path    = $item->logo_equipe_1;
            $this->equipe2_logo_path    = $item->logo_equipe_2;
            $this->heure                = $item->heure_match;
            $this->resultat             = $item->resultat_match;
        }
    }

    public function edit(){
        $this->validate();

        $data = [
            'equipe1_name'      =>  $this->equipe1_name,
            'equipe2_name'      =>  $this->equipe2_name,
            'heure_match'       =>  $this->heure,
            'resultat_match'    =>  $this->resultat ?: null,
        ];

        // if (!empty($this->avatar)) {
        //     $url = $this->avatar->store('profile-photos', 'public');
        //     $data['profile_photo_path'] = $url;
        // }

        if (!empty($this->equipe1_logo)) {
            $url = $this->equipe1_logo->store('files/1/teams','public');
            $data['logo_equipe_1'] = '/storage/' . $url;
        }
        if (!empty($this->equipe2_logo)) {
            $url = $this->equipe2_logo->store('files/1/teams','public');
            $data['logo_equipe_2'] = '/storage/' . $url;
        }
        

        FootballApi::where('id',$this->itemId)->update($data);
        $this->closeUpdateModel();
        $this->toast(__('Information d\'utilisateurs ont été mis à jour'));
        $this->emit('refreshParent');

    }
    public function closeUpdateModel(){
        $this->showUpdateModel = false;
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }
    public function render()
    {
        return view('livewire.admin.api.api-update');
    }
}
