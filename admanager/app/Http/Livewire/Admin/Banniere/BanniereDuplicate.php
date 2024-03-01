<?php

namespace App\Http\Livewire\Admin\Banniere;

use App\Models\Banniere;
use App\Models\Campagne;
use App\Traits\ToastAlert;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class BanniereDuplicate extends Component
{
    use ToastAlert;

    public $existingDates,$itemId,$campagne_id,$campagne,$titre,$lien,$position,$plannification,$image,$image_path,$minDate,$maxDate;

    public bool $showDuplicateModel = false;


    protected $listeners = ['showDuplicateModel'];

    public function mount($campagne){
        $this->campagne = $campagne;
        $this->updateDateRange();

    }
    public function updateDateRange()
    {
        if (!empty($this->campagne_id)) {
            $campagne = Campagne::find($this->campagne_id);
            $this->minDate = $campagne->date_debut; // set minimum date to start of the campaign
            $this->maxDate = $campagne->date_fin; // set maximum date to end of the campaign
    
            // Fetch existing dates for the selected campaign and position
            $existingDates = Banniere::where('position', $this->position)
                // ->where('position', $this->position)
                ->pluck('plannification')
                ->flatMap(function ($dates) {
                    return explode(',', $dates);
                })
                ->unique()
                ->toArray();
    
            // Merge existing dates with selected dates and remove duplicates
            $selectedDates = explode(',', $this->plannification);
            $allDates = array_merge($existingDates, $selectedDates);

    
            // Sort the unique dates in ascending order

    
            // Pass the existing and unique dates to the Blade view
            $this->existingDates = $existingDates;
    
            // If the selected dates are not within the campaign date range, reset the selection to the minimum date
            if (!empty($this->plannification)) {
                $firstSelectedDate = $selectedDates[0];
                if ($firstSelectedDate < $this->minDate || $firstSelectedDate > $this->maxDate) {
                    $this->plannification = $this->minDate;
                }
            }
        }
    }
    
    
    public function updatedCampagneId()
    {
        $this->plannification = '';
        $this->updateDateRange();
    }

    protected function rules()
    {
        return [
            'titre'             => ['required', 'string', 'max:50', 'min:3'],
            'campagne_id'       => 'required|integer|exists:App\Models\Campagne,id',
            'lien'              => 'required|string',
            'image'             => 'nullable|image|mimes:jpeg,png,jpg,webp,gif',
            'position'          => 'required|string',
            'plannification'    => [
                'required',
                function ($attribute, $value, $fail) {
                    $existingDates = DB::table('bannieres')
                        // ->where('campagne_id', $this->campagne_id)
                        ->where('position', $this->position)
                        ->pluck('plannification')
                        ->flatMap(function ($dates) {
                            return explode(',', $dates);
                        })
                        ->unique()
                        ->toArray();
                    $dates = explode(',', $value);
                    foreach ($dates as $date) {
                        if (in_array($date, $existingDates)) {
                            $fail("La date ($date) existe déjà pour cette position dans cette campagne.");
                            return;
                        }
                    }
                }
            ]
        ];
    }
    
    


    public function showDuplicateModel($itemId)
    {
        $this->itemId = $itemId;
        $this->showDuplicateModel = true;
    
        if (!empty($this->itemId)) {
            $item = Banniere::find($this->itemId);
    
            $this->titre = $item->titre;
            $this->lien = $item->lien;
            $this->image_path = $item->image;
            $this->campagne_id = $item->campagne_id;
    
            $campagne = Campagne::find($this->campagne_id);
            $this->minDate = $campagne->date_debut;
            $this->maxDate = $campagne->date_fin;
    
            // Fetch the existing dates
            $this->existingDates = Banniere::where('position', $item->position)
                // ->where('position', $item->position)
                ->pluck('plannification')
                ->flatMap(function ($dates) {
                    return explode(',', $dates);
                })
                ->unique()
                ->toArray();
        } else {
            $this->existingDates = [];
        }
    }
    public function closeDuplicateModel(){
        $this->showDuplicateModel = false;
        $this->resetExcept('campagne');
        $this->resetValidation();
        $this->resetErrorBag();
    }
    public function duplicate(){
        $this->validate();

        $data = [
            'titre' => $this->titre,
            'lien' => $this->lien,
            'campagne_id' => $this->campagne_id,
            'position' => $this->position,
            'plannification' => $this->plannification,
            'image' =>  $this->image_path
        ];
        // if (!empty($this->image)) {
        //     $url = $this->image->store('files/banner', 'public');
        //     $data['image'] = '/storage/' . $url;
        // }


        Banniere::create($data);
        $this->closeDuplicateModel();
        $this->toast(__('Bannière dupliquée'));
        $this->emit('refreshParent');

    }
    public function render()
    {
        return view('livewire.admin.banniere.banniere-duplicate');
    }
}
