<?php

namespace App\Http\Livewire\Admin\User;


use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndex extends Component
{
    use WithPagination;

    public ?string $term = null;
    public $selectedUsers = [];
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

    public function mount() {
        $this->selectedUsers = collect();
    }

    public function deleteSelected() {
        User::query()->whereIn('id',$this->selectedUsers)->forceDelete();
        $this->selectedUsers = [];
        $this->selecteAll = false;
    }

    public function updatedSelecteAll($value) {
        if($value) {
            $this->selectedUsers = $this->getItem()->pluck('id');
        }
        else{
            $this->selectedUsers = [];
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
        $users = User::query();
        // * Search
        if (!empty($this->term)&& $this->term != null){
            $users = $users->search(trim($this->term));
        }


        $users = $users->with(['role:id,name,color']);


        if (!empty($this->role)){
            $users = $users->where('role_id',$this->role);
        }

        $users = $users->orderBy($this->orderBy, $this->sortBy)->paginate($this->perPage);

        return $users;

    }

    public function render()
    {
        
        return view('livewire.admin.user.user-index',[
            'users' => $this->readyToLoad ? $this->getItem() : [],
            'roles' => Role::all()->pluck('name', 'id'),
        ]);
    }
}