<?php

namespace App\Http\Livewire\Admin\Api;

use App\Models\FootballApi;
use Livewire\Component;
use Livewire\WithPagination;

class ApiIndex extends Component
{
    use WithPagination;

    public ?string $term = null;


    protected $listeners = [ 'refreshParent' => '$refresh'];
    
    public $selecteAll = false;
    
    public $selectedApis = [];

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
        $this->selectedApis = collect();
    }
    
    public function deleteSelected() {
        FootballApi::query()->whereIn('id',$this->selectedApis)->forceDelete();
        $this->selectedApis = [];
        $this->selecteAll = false;
    }
    
    public function updatedSelecteAll($value) {
        if($value) {
            $this->selectedApis = $this->getItem()->pluck('id');
        }
        else{
            $this->selectedApis = [];
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
        $matche = FootballApi::query();
        // * Search
        if (!empty($this->term)&& $this->term != null){
            $matche = $matche->search(trim($this->term));
        }

        $matche = $matche->orderBy($this->orderBy, $this->sortBy)->paginate($this->perPage);

        return $matche;

    }


    public function render()
    {
        return view('livewire.admin.api.api-index',[
            'matches' => $this->readyToLoad ? $this->getItem() : [],
        ]);
    }
}
