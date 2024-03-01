<?php

namespace App\Http\Livewire\Admin\Survey;

use Livewire\Component;
use MattDaneshvar\Survey\Models\Survey;

class SurveyShow extends Component
{
    public $showItemModel = false;
    public $itemId;
    public $item;

    protected $listeners = ['showItemModel'];

    public function showItemModel($itemId){
        $this->itemId = $itemId;
        $this->showItemModel = true;
        $this->item = Survey::find($this->itemId);

    }
    
    public function closeItemModel(){
        $this->showItemModel = false;
        $this->reset();
    }
    public function render()
    {
        return view('livewire.admin.survey.survey-show');
    }
}
