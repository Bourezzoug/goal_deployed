<?php

namespace App\Http\Livewire\Admin\Survey;

use Livewire\Component;
use MattDaneshvar\Survey\Models\Answer;
use MattDaneshvar\Survey\Models\Entry;
use MattDaneshvar\Survey\Models\Question;
use MattDaneshvar\Survey\Models\Survey;

class SurveyIndex extends Component
{
    protected $listeners = [ 'refreshParent' => '$refresh'];

    public ?string $term = null;

    public int $perPage = 10;
    public $selectedSurveys = [];
    public $selecteAll = false;

    public string $orderBy = 'id';
    public string $sortBy = 'asc';

    public $readyToLoad = false;
    public function selectedItem($action ,$itemId = null){
        if ($action == 'create'){
            $this->emit('showCreateModel');
        }elseif ($action == 'update'){
            $this->emit('showUpdateModel', $itemId);
        }elseif ($action == 'show'){
            $this->emit('showItemModel', $itemId);
        }elseif ($action == 'delete'){
            $this->emit('showDeleteModel', $itemId);
        }elseif ($action == 'restore'){
            $this->emit('showRestoreModel', $itemId);
        }
    }
    public function deleteSelected() {
        Survey::query()->whereIn('id',$this->selectedSurveys)->forceDelete();
        $question = Question::query()->whereIn('survey_id',$this->selectedSurveys);
        $question->forceDelete();

        $questions = Question::query()->whereIn('survey_id',$this->selectedSurveys)->get();

        $entry = Entry::where('survey_id', $this->selectedSurveys)->get();
        $answers = Answer::all();
        foreach ($entry as $entry) {
            $answers = Answer::where('entry_id', $entry->id)->get();
            foreach ($answers as $answer) {
                $answer->forceDelete();
            }
            $entry->forceDelete();
        }
        

        $this->selectedSurveys = [];
        $this->selecteAll = false;
    }

    public function updatedSelecteAll($value) {
        if($value) {
            $this->selectedSurveys = $this->getItem()->pluck('id');
        }
        else{
            $this->selectedSurveys = [];
        }
    }
    public function getItem(){
        $surveys = Survey::query();
        // $question = Question::query();
        // * Search

        
        if (!empty($this->term)&& $this->term != null){
            $surveys = $surveys->search(trim($this->term));
            // $question = $question->where('content', 'like', '%' . $this->term . '%');
        }

        $surveys = $surveys->orderBy($this->orderBy, $this->sortBy)->paginate($this->perPage);

        return $surveys;

    }
    public function loadItems()
    {
        $this->readyToLoad = true;
    }
    public function render()
    {
        return view('livewire.admin.survey.survey-index',[
            'surveys' => $this->readyToLoad ? $this->getItem() : [],
        ]);
    }
}
