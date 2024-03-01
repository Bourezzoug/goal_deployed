<?php

namespace App\Http\Livewire\Admin\Banniere;

use App\Models\Banniere;
use App\Models\Campagne;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;
use Livewire\WithFileUploads;

class BanniereCreate extends Component
{
    use WithFileUploads;
    use InteractsWithBanner;
    public $plannificationDates = [];
    public $campagne,$campagne_id,$titre,$lien,$position,$plannification,$image,$minDate,$maxDate,$existingDates;
    protected $listeners = ['showCreateModel'];

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
    
            // Pass the existing dates to the Blade view
            $this->existingDates = $existingDates;
    
            // If the selected dates are not within the campaign date range, reset the selection to the minimum date
            if (!empty($this->plannification)) {
                $selectedDates = explode(',', $this->plannification);
                $firstSelectedDate = $selectedDates[0];
                if ($firstSelectedDate < $this->minDate || $firstSelectedDate > $this->maxDate) {
                    $this->plannification = $this->minDate;
                }
            }
        }
    }
    
    
    public function updatedCampagneId()
    {
        $this->updateDateRange();
    }
    public bool $showCreateModel = false;

    public function showCreateModel(){
        $this->showCreateModel = true;
    }


    protected function rules()
    {
    return [
        'titre'             => ['required', 'string', 'max:50', 'min:3'],
        'campagne_id'       => 'required|integer|exists:App\Models\Campagne,id',
        'lien'              => 'required|string',
        'image'             => 'required|image|mimes:jpeg,png,jpg,webp,gif',
        'position'          => 'required|string',

        'plannification' => [
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
                        $fail("La date ($date) existe déjà dans cette position.");
                        return;
                    }
                }
            }
        ]
        
        
        
    ];
    }



    public function create(){
        $this->validate();

        $data = [
            'titre'             =>  $this->titre,
            'campagne_id'       =>  $this->campagne_id,
            'lien'              =>  $this->lien,
            'position'          =>  $this->position,
            'plannification'    =>  $this->plannification,
            'image'             =>  $this->image
        ];

        if (!empty($this->image)) {
            $url = $this->image->store('files/1/Banners','public');
            $data['image'] = '/storage/' . $url;
        }

        Banniere::create($data);
        $this->closeCreateModel();
        $this->banner('Banniere Created');
        $this->emit('refreshParent');
    }

    public function closeCreateModel(){
        $this->showCreateModel = false;
        $this->resetExcept('campagne');
        $this->resetValidation();
        $this->resetErrorBag();
    }


    public function render()
    {
        return view('livewire.admin.banniere.banniere-create');
    }
}
