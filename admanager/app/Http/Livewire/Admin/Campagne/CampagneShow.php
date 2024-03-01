<?php

namespace App\Http\Livewire\Admin\Campagne;

use App\Models\Campagne;
use Livewire\Component;

class CampagneShow extends Component
{
    public $showItemModel = false;
    public $itemId;
    public $item;

    protected $listeners = ['showItemModel'];

    public function showItemModel($itemId){
        $this->itemId = $itemId;
        $this->showItemModel = true;
        $this->item = Campagne::find($this->itemId);

    }
    
    public function closeItemModel(){
        $this->showItemModel = false;
        $this->reset();
    }
    public function render()
    {
        return view('livewire.admin.campagne.campagne-show');
    }
}
