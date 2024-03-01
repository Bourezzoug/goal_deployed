<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryIndex extends Component
{

    use WithPagination;

    public ?string $term = null;

    public $selectedCategories = [];
    
    public $selecteAll = false;

    protected $listeners = [ 'refreshParent' => '$refresh'];

    public int $perPage = 10;

    public string $orderBy = 'id';
    public string $sortBy = 'asc';

    public $readyToLoad = false;

    public function loadItems()
    {
        $this->readyToLoad = true;
    }

    public function mount() {
        $this->selectedCategories = collect();
    }

    public function deleteSelected() {
        Category::query()->whereIn('id',$this->selectedCategories)->forceDelete();
        $this->selectedCategories = [];
        $this->selecteAll = false;
    }

    public function updatedSelecteAll($value) {
        if($value) {
            $this->selectedCategories = $this->getItem()->pluck('id');
        }
        else{
            $this->selectedCategories = [];
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
        $users = Category::query();
        // * Search
        if (!empty($this->term)&& $this->term != null){
            $users = $users->search(trim($this->term));
        }


        // $users = $users->with(['name,color']); //This is for relationships


        // if (!empty($this->role)){
        //     $users = $users->where('role_id',$this->role);
        // }

        $categories = $users->orderBy($this->orderBy, $this->sortBy)->paginate($this->perPage);

        return $categories;

    }

    public function render()
    {
        return view('livewire.admin.category.category-index',[
        'categories' => $this->readyToLoad ? $this->getItem() : [],
        // 'posts'     =>  Post::where('category_id',1)->get()->toArray()
        ]
    );
    }
}
