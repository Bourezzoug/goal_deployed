<?php

namespace App\Http\Livewire\Admin\Banniere;

use App\Models\Banniere;
use App\Models\Campagne;
use App\Traits\ToastAlert;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class BanniereUpdate extends Component
{
    use ToastAlert;
    use WithFileUploads;
    public $existingDates,$itemId,$campagne_id,$campagne,$titre,$lien,$position,$plannification,$image,$image_path,$minDate,$maxDate;
    protected $listeners = ['showUpdateModel'];

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
                ->where('id', '!=', $this->itemId) // exclude the current record being updated
                ->pluck('plannification')
                ->flatMap(function ($dates) {
                    return explode(',', $dates);
                })
                ->unique()
                ->toArray();
    
            // Pass the existing dates to the Blade view
            $this->existingDates = $existingDates;
    
            // If the selected dates are not within the campaign date range, reset the selection to the minimum date
            if (!empty($this->plannification)) {
                $selectedDates = explode(',', $this->plannification);
                $firstSelectedDate = $selectedDates[0];
                if ($firstSelectedDate < $this->minDate || $firstSelectedDate > $this->maxDate || in_array($firstSelectedDate, $existingDates)) {
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
    public bool $showUpdateModel = false;

    public function showUpdateModel($itemId){
        $this->itemId = $itemId;
        $this->showUpdateModel = true;

        if (!empty($this->itemId)){
            $item = Banniere::find($this->itemId);

            $this->titre = $item->titre;
            $this->lien = $item->lien;
            $this->position = $item->position;
            $this->plannification = $item->plannification;
            $this->image_path = $item->image;
            $this->campagne_id = $item->campagne_id;
            $campagne = Campagne::find($this->campagne_id);
            $this->minDate = $campagne->date_debut;
            $this->maxDate = $campagne->date_fin;
                        // Fetch existing dates for the selected campaign and position
                        $existingDates = Banniere::where('position', $this->position)
                        // ->where('position', $this->position)
                        ->where('id', '!=', $this->itemId) 
                        ->pluck('plannification')
                        ->flatMap(function ($dates) {
                            return explode(',', $dates);
                        })
                        ->unique()
                        ->toArray();
            
                    // Pass the existing dates to the Blade view
                    $this->existingDates = $existingDates;

        }
    }
    protected function rules()
    {
    return [
        'titre'             => ['required', 'string', 'max:50', 'min:3'],
        'campagne_id'       => 'required|integer|exists:App\Models\Campagne,id',
        'lien'              => 'required|string',
        'image'             => 'nullable|image|mimes:jpeg,png,jpg,webp,gif',
        'position'          => 'required|string',
        'plannification' => [
            
            function ($attribute, $value, $fail) {
                $existingDates = DB::table('bannieres')
                    ->where('campagne_id', $this->campagne_id)
                    ->where('position', $this->position)
                    ->where('id', '!=', $this->itemId) 
                    ->pluck('plannification')
                    ->flatMap(function ($dates) {
                        return explode(',', $dates);
                    })
                    ->unique()
                    ->toArray();
                $dates = explode(',', $value);
                foreach ($dates as $date) {
                    if (in_array($date, $existingDates)) {
                        $fail("La date ($date) existe déjà dans cette position.");
                        return;
                    }
                }
            }
        ]
    ];
    }
    public function edit(){
        $this->validate();

        $data = [
            'titre' => $this->titre,
            'lien' => $this->lien,
            'campagne_id' => $this->campagne_id,
            'position' => $this->position,
            'plannification' => $this->plannification,
        ];
        if (!empty($this->image)) {
            $url = $this->image->store('files/1/Banners', 'public');
            $data['image'] = '/storage/' . $url;
        }


        Banniere::where('id',$this->itemId)->update($data);
        $this->closeUpdateModel();
        $this->toast(__('Informations du client ont été mis à jour'));
        $this->emit('refreshParent');

    }

    public function closeUpdateModel(){
        $this->showUpdateModel = false;
        $this->resetExcept('campagne');
        $this->resetValidation();
        $this->resetErrorBag();
    }
    public function render()
    {
        return view('livewire.admin.banniere.banniere-update');
    }
}
