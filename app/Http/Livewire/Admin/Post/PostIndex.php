<?php

namespace App\Http\Livewire\Admin\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class PostIndex extends Component
{
    use WithPagination;


    public ?string $term = null;

    public ?string $categories = null;

    public $selectedPosts = [];

    public $selecteAll = false;

    protected $listeners = [ 'refreshParent' => '$refresh','updatePostOrder' => 'updatePostOrder'];

    public int $perPage = 10;

    public string $orderBy = 'id';
    public string $sortBy = 'desc';

    public $readyToLoad = false;

    public function loadItems()
    {
        $this->readyToLoad = true;
    }

    public function mount() {
        $this->selectedPosts = collect();
    }

    public function deleteSelected() {
        Post::query()->whereIn('id',$this->selectedPosts)->forceDelete();
        $this->selectedPosts = [];
        $this->selecteAll = false;
    }

    public function updatedSelecteAll($value) {
        if($value) {
            $this->selectedPosts = $this->getItem()->pluck('id');
        }
        else{
            $this->selectedPosts = [];
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
        $posts = Post::query();
        // * Search
        if (!empty($this->term)&& $this->term != null){
            $posts = $posts->search(trim($this->term));
        }


        $posts = $posts->with(['category:id,name','user:id,name']); //This is for relationships

        if (!empty($this->categories)){
            $posts = $posts->where('category_id',$this->categories);
        }

        if (!empty($this->users)){
            $posts = $posts->where('author_id',$this->users);
        }
        if(!empty($this->categories)) {
            $posts = $posts->where('category_id',$this->categories);
        }

        $posts = $posts->orderBy('ordre')->orderBy($this->orderBy, $this->sortBy)->paginate($this->perPage);

        return $posts;

    }

    // Livewire component (PostIndex)

// public function updatePostOrder($postId, $newOrder)
// {
//     $post = Post::findOrFail($postId);
//     $post->update(['ordre' => $newOrder]);

//     // // Refresh the table data
//     // $this->readyToLoad = true;
//     // dd($post);
// }
public function updatePostOrder($postId, $newOrder)
    {
        $post = Post::findOrFail($postId);

        // Get the post at the target position
        $targetPost = Post::where('ordre', $newOrder)->first();

        // If a post exists at the target position, swap their positions
        if ($targetPost) {
            // Temporarily remove the unique constraint from the 'ordre' column
            // DB::statement('ALTER TABLE posts DROP INDEX ordre_unique');

            $tempOrder = $post->ordre;
            $post->update(['ordre' => $newOrder]);
            $targetPost->update(['ordre' => $tempOrder]);

            // Re-add the unique constraint to the 'ordre' column
            // DB::statement('ALTER TABLE posts ADD UNIQUE (ordre)');
        } else {
            // If there is no post at the target position, simply update the position of the dragged post
            $post->update(['ordre' => $newOrder]);
        }
    }


    public function render()
    {
        return view('livewire.admin.post.post-index',[
            'posts' =>  $this->readyToLoad ? $this->getItem() : [],
            'users'  => User::all()->pluck('name', 'id'),
            'categorie'  => Category::all()->pluck('name', 'id'),
        ]);
    }
}
