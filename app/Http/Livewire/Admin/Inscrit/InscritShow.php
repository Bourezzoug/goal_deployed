<?php

namespace App\Http\Livewire\Admin\Inscrit;

use App\Models\Inscrit;
use Livewire\Component;

class InscritShow extends Component
{
    public $showItemModel = false;
    public $itemId;
    public $item;

    protected $listeners = ['showItemModel'];

    public function showItemModel($itemId){
        $this->itemId = $itemId;
        $this->showItemModel = true;
        $this->item = Inscrit::find($this->itemId);

    }
    public function closeItemModel(){
        $this->showItemModel = false;
        $this->reset();
    }
    public function render()
    {
        return view('livewire.admin.inscrit.inscrit-show');
    }
}
