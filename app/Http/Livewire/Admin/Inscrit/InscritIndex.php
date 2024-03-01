<?php

namespace App\Http\Livewire\Admin\Inscrit;

use App\Models\Inscrit;
use Livewire\Component;
use Livewire\WithPagination;

class InscritIndex extends Component
{
    use WithPagination;

    public ?string $term = null;

    public $selectedInscrits = [];

    public $selecteAll = false;

    public $startDate,$endDate;

    protected $listeners = [ 'refreshParent' => '$refresh'];

    public int $perPage = 10;

    public string $orderBy = 'id';
    public string $sortBy = 'desc';
    public string $ageRange = '';

    public $readyToLoad = false;

    public function loadItems()
    {
        $this->readyToLoad = true;
    }

    public function mount() {
        $this->selectedInscrits = collect();
    }

    public function deleteSelected() {
        Inscrit::query()->whereIn('id',$this->selectedInscrits)->forceDelete();
        $this->selectedInscrits = [];
        $this->selecteAll = false;
    }

    public function updatedSelecteAll($value) {
        if($value) {
            $this->selectedInscrits = $this->getItem()->pluck('id');
        }
        else{
            $this->selectedInscrits = [];
        }
    }

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

    public function getItem(){
        $inscrits = Inscrit::query();
        // * Search
        if (!empty($this->term)&& $this->term != null){
            $inscrits = $inscrits->search(trim($this->term));
        }
    
        // * Age range filtering
        if (!empty($this->ageRange) && $this->ageRange != null) {
            $ages = explode("-", $this->ageRange);
            $minAge = $ages[0];
            $maxAge = (count($ages) == 2) ? $ages[1] : null;
            if ($maxAge === null) {
                $inscrits = $inscrits->where('age', '>=', $minAge);
            } else {
                $inscrits = $inscrits->where('age', '>=', $minAge)->where('age', '<=', $maxAge);
            }
        }
        // * Between Two Date Filtering
        if (!empty($this->startDate) && !empty($this->endDate)) {
            $inscrits = $inscrits->whereBetween('created_at', [$this->startDate, $this->endDate]);
        } elseif (!empty($this->startDate)) {
            $inscrits = $inscrits->where('created_at', '>=', $this->startDate);
        } elseif (!empty($this->endDate)) {
            $inscrits = $inscrits->where('created_at', '<=', $this->endDate);
        }
        
    
        $inscrits = $inscrits->orderBy($this->orderBy, $this->sortBy)->paginate($this->perPage);
    
        return $inscrits;
    
    }
    
    
    

    public function render()
    {
        return view('livewire.admin.inscrit.inscrit-index',[
            'inscrits'  =>  $this->readyToLoad ? $this->getItem() : [],
        ]);
    }
}
