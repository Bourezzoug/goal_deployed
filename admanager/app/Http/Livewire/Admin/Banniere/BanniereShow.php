<?php

namespace App\Http\Livewire\Admin\Banniere;

use App\Models\Banniere;
use Livewire\Component;

class BanniereShow extends Component
{
    public $showItemModel = false;
    public $itemId;
    public $item;

    protected $listeners = ['showItemModel'];

    public function showItemModel($itemId){
        $this->itemId = $itemId;
        $this->showItemModel = true;
        $this->item = Banniere::find($this->itemId);

    }
    
    public function closeItemModel(){
        $this->showItemModel = false;
        $this->reset();
    }
    public function render()
    {
        return view('livewire.admin.banniere.banniere-show');
    }
}
