<?php

namespace App\Http\Livewire\Admin\Banniere;

use App\Models\Banniere;
use App\Models\Campagne;
use Livewire\Component;
use Livewire\WithPagination;
// use Barryvdh\DomPDF\Facade;
use PDF;
class BanniereIndex extends Component
{
    use WithPagination;

    public ?string $term = null;
    public $selectedBannieres = [];
    public $selecteAll = false;
    public int $perPage = 10;
    public string $orderBy = 'id';
    public string $sortBy = 'desc';
    public ?string $sortby_position = null;
    protected $listeners = [ 'refreshParent' => '$refresh'];

    public $readyToLoad = false;

    public function loadItems()
    {
        $this->readyToLoad = true;
    }

    public function deleteSelected() {
        Banniere::query()->whereIn('id',$this->selectedBannieres)->forceDelete();
        $this->selectedBannieres = [];
        $this->selecteAll = false;
    }

    public function updatedSelecteAll($value) {
        if($value) {
            $this->selectedBannieres = $this->getItem()->pluck('id');
        }
        else{
            $this->selectedBannieres = [];
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
        }elseif ($action == 'duplicate'){
            $this->emit('showDuplicateModel', $itemId);
        }
    }


    public function getItem(){
        $bannieres = Banniere::query();
        // * Search

        $bannieres = $bannieres->with(['campagne:id,Libelle']);


        if (!empty($this->term)&& $this->term != null){
            $bannieres = $bannieres->search(trim($this->term));
        }

        if (!empty($this->sortby_position)&& $this->sortby_position != null){
            $bannieres = $bannieres->search(trim($this->sortby_position));
        }




        $bannieres = $bannieres->orderBy($this->orderBy, $this->sortBy)->paginate($this->perPage);

        return $bannieres;

    }
    public function render()
    {
        return view('livewire.admin.banniere.banniere-index',[
            'bannieres' =>  $this->readyToLoad ? $this->getItem() : [],
            'campagne'  =>  Campagne::where('status',1)->pluck('Libelle','id','date_debut','date_fin')
        ]);
    }
}
