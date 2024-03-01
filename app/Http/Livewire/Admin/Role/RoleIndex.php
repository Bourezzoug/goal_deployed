<?php

namespace App\Http\Livewire\Admin\Role;

use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;

class RoleIndex extends Component
{

    use WithPagination;

    public ?string $term = null;

    protected $listeners = [ 'refreshParent' => '$refresh'];

    public int $perPage = 10;
    public $selectedRoles = [];
    public $selecteAll = false;

    public string $orderBy = 'id';
    public string $sortBy = 'asc';

    public $readyToLoad = false;

    public function mount() {
        $this->selectedRoles = collect();
    }

    public function deleteSelected() {
        Role::query()->whereIn('id',$this->selectedRoles)->forceDelete();
        $this->selectedRoles = [];
        $this->selecteAll = false;
    }

    public function updatedSelecteAll($value) {
        if($value) {
            $this->selectedRoles = $this->getItem()->pluck('id');
        }
        else{
            $this->selectedRoles = [];
        }
    }

    public function loadItems()
    {
        $this->readyToLoad = true;
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
        $roles = Role::query();
        // * Search
        if (!empty($this->term)&& $this->term != null){
            $roles = $roles->search(trim($this->term));
        }

        $roles = $roles->orderBy($this->orderBy, $this->sortBy)->paginate($this->perPage);

        return $roles;

    }

    public function render()
    {
        return view('livewire.admin.role.role-index',[
            'roles' =>  $this->readyToLoad ? $this->getItem() : [],
        ]);
    }
}
