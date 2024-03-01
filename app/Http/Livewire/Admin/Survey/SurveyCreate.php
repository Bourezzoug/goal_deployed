<?php

namespace App\Http\Livewire\Admin\Survey;

use Livewire\Component;
use MattDaneshvar\Survey\Models\Survey;
use Laravel\Jetstream\InteractsWithBanner;

class SurveyCreate extends Component
{

    use InteractsWithBanner;


    protected $listeners = ['showCreateModel'];

    public $name,$content;
    public $options ;
    public $optionValues ;

    public bool $showCreateModel = false;

    public function showCreateModel(){
        $this->showCreateModel = true;
    }


    protected function rules()
    {
    return [
        'name' => ['required', 'string', 'max:50', 'min:5'],
        'content' => ['required', 'string', 'max:50', 'min:5'],
        'options' => ['required', 'string', 'max:70', 'min:5'],
    ];
    }
    public function create(){
        $this->validate();
        $this->optionValues = explode(',',$this->options);
        $data = [
            'name' => $this->name,
            'settings' => ['accept-guest-entries' => true]
        ];


        $survey = Survey::create($data);
        $one = $survey->sections()->create(['name' => 'Part One']);

        $one->questions()->create([
            'content' => $this->content,
            'type' => 'radio',
            'options' =>$this->optionValues
        ]);

        $this->closeCreateModel();
        $this->banner('Vous avez créé un nouveau sondage');
        $this->emit('refreshParent');
    }

    public function closeCreateModel(){
        $this->showCreateModel = false;
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }
    public function render()
    {
        return view('livewire.admin.survey.survey-create');
    }
}
