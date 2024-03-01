<?php

namespace App\Http\Livewire\Admin\Client;

use App\Models\Client;
use Livewire\Component;
use Livewire\WithPagination;

class ClientIndex extends Component
{
    use WithPagination;

    public ?string $term = null;
    public $selectedClients = [];
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
        Client::query()->whereIn('id',$this->selectedClients)->forceDelete();
        $this->selectedClients = [];
        $this->selecteAll = false;
    }

    public function updatedSelecteAll($value) {
        if($value) {
            $this->selectedClients = $this->getItem()->pluck('id');
        }
        else{
            $this->selectedClients = [];
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
        $clients = Client::query();
        // * Search
        if (!empty($this->term)&& $this->term != null){
            $clients = $clients->search(trim($this->term));
        }




        $clients = $clients->orderBy($this->orderBy, $this->sortBy)->paginate($this->perPage);

        return $clients;

    }

    public function render()
    {
        return view('livewire.admin.client.client-index',[
            'clients'   =>  $this->readyToLoad ? $this->getItem() : [],
        ]);
    }
}
