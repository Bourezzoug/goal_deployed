<?php

namespace App\Http\Livewire\Admin\Inscrit;

use App\Models\Inscrit;
use App\Traits\ToastAlert;
use Illuminate\Validation\Rule;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class InscritUpdate extends Component
{
    use InteractsWithBanner;
    use ToastAlert;

    public $itemId,$nom_complet,$email,$telephone,$fonction,$condition,$newsgoal,$newspartenaire,$ville,$age,$civilite;

    protected $listeners = ['showUpdateModel'];

    public bool $showUpdateModel = false;


    public function closeCreateModel(){
        $this->showUpdateModel = false;
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    protected function rules()
    {
    return [
        'nom_complet' => ['nullable', 'string', 'max:50', 'min:5'],
        'email' => ['required', 'string', 'email', 'max:255','unique:inscrits,email,'.$this->itemId],
        'telephone' => ['nullable', 'string', 'regex:/^[\d\s\(\)\-]+$/', 'min:10','max:15'],
        'fonction' => ['nullable', 'string'],
        'ville' => ['nullable', 'string', 'min:3','max:255'],
        'age' => ['nullable', 'string'],
        'civilite' => ['nullable', 'string', 'min:5','max:25'],
        'newsgoal' => ['nullable', 'boolean'],
        'newspartenaire' => ['nullable', 'boolean'],
        'condition' =>  ['nullable','boolean']
    ];
    }

    public function showUpdateModel($itemId){
        $this->itemId = $itemId;
        $this->showUpdateModel = true;

        if (!empty($this->itemId)){
            $item = Inscrit::find($this->itemId);
            $this->nom_complet = $item->nom_complet;
            $this->age = $item->age;
            $this->ville = $item->ville;
            $this->email = $item->email;
            $this->telephone = $item->telephone;
            $this->fonction = $item->fonction;
            $this->condition = $item->conditions;
            $this->civilite = $item->civilite;
            $this->newsgoal = $item->newsgoal;
            $this->newspartenaire = $item->newspartenaire;
        }
    }
    public function edit(){
        // $this->validate();

        // $data = [
        //     'nom_complet'      =>  $this->nom_complet,
        //     'email'      =>  $this->email,
        //     'telephone'     =>  $this->telephone,
        //     'fonction'     =>  $this->fonction,
        //     'age' =>  $this->age,
        //     'ville'     =>  $this->ville,
        //     'civilite'     =>  $this->civilite,
        //     'conditions'    =>  $this->condition,
        //     'newsgoal'  =>  $this->newsgoal,
        //     'newspartenaire'  =>  $this->newspartenaire,
        // ];



        // Inscrit::where('id',$this->itemId)->update($data);
        // $this->closeUpdateModel();
        // $this->toast(__('Information de l\'inscrit ont été mis à jour'));
        // $this->banner('Information de l\'inscrit ont été mis à jour');
        // $this->emit('refreshParent');
        dd($this->itemId);
    }

    public function closeUpdateModel(){
        $this->showUpdateModel = false;
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    public function render()
    {
        return view('livewire.admin.inscrit.inscrit-update');
    }
}
