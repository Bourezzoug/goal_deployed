<?php

namespace App\Http\Livewire\Admin\Post;

use App\Models\Post;
use Livewire\Component;

class PostShow extends Component
{
    public $showItemModel = false;
    public $itemId;
    public $item;

    protected $listeners = ['showItemModel'];

    public function showItemModel($itemId){
        $this->itemId = $itemId;
        $this->showItemModel = true;
        if (!empty($this->users)){
            $this->item = $this->item->where('author_id',$this->users);
        }
        $this->item = Post::find($this->itemId);

    }

    public function closeItemModel(){
        $this->showItemModel = false;
        $this->reset();
    }
    public function render()
    {
        return view('livewire.admin.post.post-show');
    }
}
