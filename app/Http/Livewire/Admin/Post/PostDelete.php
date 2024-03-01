<?php

namespace App\Http\Livewire\Admin\Post;

use App\Models\Post;
use App\Traits\ToastAlert;
use Laravel\Jetstream\InteractsWithBanner;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class PostDelete extends Component
{
    use ToastAlert;
    use InteractsWithBanner;
    use AuthorizesRequests;

    public $showDeleteModel = false;
    public $showRestoreModel = false;
    public $showForceDeleteModel = false;
    public $itemId;

    protected $listeners = ['showDeleteModel','showRestoreModel','showForceDeleteModel'];

    public function showDeleteModel($itemId){
        $this->itemId = $itemId;
        $this->showDeleteModel = true;
    }

    public function closeDeleteModel(){
        $this->showDeleteModel = false;
        $this->reset();
    }

    public function delete(){


        $post = Post::findOrFail($this->itemId);

        $image_path = public_path()  ;
        $image = $image_path . $post->image;
        if(file_exists($image)) {
            @unlink($image);
        }

        
        
        

        $this->authorize('delete', $post);
        $post->forceDelete();
        $this->reset();
        $this->closeDeleteModel();
        $this->emit('refreshParent');
        $this->banner('Article supprimée');
        $this->toast(__('Article supprimée'));


    }

    public function render()
    {
        return view('livewire.admin.post.post-delete');
    }
}
