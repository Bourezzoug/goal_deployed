<?php

namespace App\Http\Livewire\Admin\Survey;

use Livewire\Component;
use App\Traits\ToastAlert;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Laravel\Jetstream\InteractsWithBanner;
use MattDaneshvar\Survey\Models\Answer;
use MattDaneshvar\Survey\Models\Entry;
use MattDaneshvar\Survey\Models\Question;
use MattDaneshvar\Survey\Models\Survey;

class SurveyDelete extends Component
{
    use ToastAlert;
    use AuthorizesRequests;
    use InteractsWithBanner;

    public $showDeleteModel = false;
    public $showForceDeleteModel = false;
    public $itemId;

    protected $listeners = ['showDeleteModel'];

    public function showDeleteModel($itemId){
        $this->itemId = $itemId;
        $this->showDeleteModel = true;
    }

    public function closeDeleteModel(){
        $this->showDeleteModel = false;
        $this->reset();
    }

    public function delete(){
        $survey = Survey::findOrFail($this->itemId);
        $this->authorize('delete', $survey);
        $survey->forceDelete();
        $entry = Entry::where('survey_id', $this->itemId)->get();
        foreach ($entry as $a) {
            $a->forceDelete();
        }
        $question = Question::where('survey_id', $this->itemId)->firstOrFail();
        $question->forceDelete();
        $answer = Answer::where('question_id', $question->id)->get();
        foreach ($answer as $a) {
            $a->forceDelete();
        }

        $this->reset();
        $this->closeDeleteModel();
        $this->emit('refreshParent');
        $this->banner('Sondage supprimée');
        $this->toast(__('Sondage supprimée'));
    }
    public function render()
    {
        return view('livewire.admin.survey.survey-delete');
    }
}
