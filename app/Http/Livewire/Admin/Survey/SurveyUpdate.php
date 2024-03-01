<?php

namespace App\Http\Livewire\Admin\Survey;

use Livewire\Component;
use MattDaneshvar\Survey\Models\Question;
use MattDaneshvar\Survey\Models\Survey;
use Laravel\Jetstream\InteractsWithBanner;

class SurveyUpdate extends Component
{
    use InteractsWithBanner;

    public $itemId;

    public $name,$content;
    public $options ;
    public $optionValues ;

    protected $listeners = ['showUpdateModel'];

    public bool $showUpdateModel = false;

    protected function rules()
    {
    return [
        'name'      => ['required', 'string', 'max:50', 'min:5'],
        'content'   => ['required', 'string', 'max:50', 'min:5'],
        'options'   => ['required', 'string', 'max:70', 'min:5'],
    ];
    }

    public function showUpdateModel($itemId){
        $this->itemId = $itemId;
        $this->showUpdateModel = true;

        if (!empty($this->itemId)){
            $item = Survey::find($this->itemId);
            $this->name = $item->name;
            $this->content = $item->questions()->first()->content ;
            $this->options =  implode(",",$item->questions()->first()->options) ;
        }
    }

    public function edit(){
        $this->validate();
        $this->optionValues = explode(',',$this->options);

        Survey::where('id', $this->itemId)->update([
            'name' => $this->name,
        ]);
        
        $question = Question::where('survey_id', $this->itemId)->first();
        $question->update([
            'content' => $this->content,
            'options' => $this->optionValues,
        ]);
        
        $this->closeUpdateModel();
        $this->banner(__('Informations du sondage ont été mis à jour'));
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
        return view('livewire.admin.survey.survey-update');
    }
}
