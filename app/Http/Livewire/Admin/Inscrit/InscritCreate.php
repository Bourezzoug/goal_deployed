<?php

namespace App\Http\Livewire\Admin\Inscrit;

use App\Models\Inscrit;
use Livewire\Component;
use App\Traits\ToastAlert;
use Illuminate\Support\Facades\Hash;
use Laravel\Jetstream\InteractsWithBanner;
use Illuminate\Validation\Rule;
class InscritCreate extends Component
{
    use InteractsWithBanner;
    use ToastAlert;

    public $nom_complet,$email,$telephone,$fonction,$condition,$newsgoal,$newspartenaire,$ville,$age,$civilite;

    protected $listeners = ['showCreateModel'];

    public bool $showCreateModel = false;

    public function showCreateModel(){
        $this->showCreateModel = true;
    }

    public function closeCreateModel(){
        $this->showCreateModel = false;
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    protected function rules()
    {
    return [
        'nom_complet' => ['nullable', 'string', 'max:50', 'min:5'],
        'email' => ['required', 'string', 'email', 'max:255', Rule::unique(Inscrit::class)],
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
    public function create(){
        $this->validate();

        $data = [
            'nom_complet' => $this->nom_complet,
            'email' => strtolower($this->email),
            'telephone' => $this->telephone,
            'ville' => $this->ville,
            'age' => $this->age,
            'civilite' => $this->civilite,
            'fonction'  =>  $this->fonction,
            'newsgoal'  =>  $this->newsgoal,
            'newspartenaire'    =>  $this->newspartenaire,
            'conditions'    =>  $this->condition
        ];


        Inscrit::create($data);
        // $inscrit->save();
        $this->closeCreateModel();
        $this->banner('Un nouveau inscrit a été crée');
        $this->emit('refreshParent');

    }
    public function render()
    {
        return view('livewire.admin.inscrit.inscrit-create');
    }
}
