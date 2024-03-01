<?php

namespace App\Http\Livewire\Admin\Campagne;

use App\Models\Campagne;
use App\Models\Client;
use Livewire\Component;
use Livewire\WithPagination;


class CapmagneIndex extends Component
{
    use WithPagination;

    public ?string $term = null;
    public $selectedCampagnes = [];
    public $selecteAll = false;
    public int $perPage = 10;
    public string $orderBy = 'id';
    public string $sortBy = 'desc';
    protected $listeners = [ 'refreshParent' => '$refresh'];

    public $readyToLoad = false;

    public function loadItems()
    {
        $this->readyToLoad = true;
    }

    public function deleteSelected() {
        Campagne::query()->whereIn('id',$this->selectedCampagnes)->forceDelete();
        $this->selectedCampagnes = [];
        $this->selecteAll = false;
    }

    public function updatedSelecteAll($value) {
        if($value) {
            $this->selectedCampagnes = $this->getItem()->pluck('id');
        }
        else{
            $this->selectedCampagnes = [];
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
        $campagnes = Campagne::query();
        // * Search

        $campagnes = $campagnes->with(['client:id,nom']);


        if (!empty($this->term)&& $this->term != null){
            $campagnes = $campagnes->search(trim($this->term));
        }




        $campagnes = $campagnes->orderBy($this->orderBy, $this->sortBy)->paginate($this->perPage);

        return $campagnes;

    }
    public function render()
    {
        return view('livewire.admin.campagne.capmagne-index',[
            'campagnes' =>  $this->readyToLoad ? $this->getItem() : [],
            'clients' => Client::all()->pluck('nom','id')
        ]);
    }
}
