<?php

namespace App\Http\Livewire\Admin\Botola;

use App\Models\Botola;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

class BotolaIndex extends Component
{
    use WithPagination;

    public ?string $term = null;


    protected $listeners = [ 'refreshParent' => '$refresh','updateItemOrdre' => 'updateItemOrdre'];

    public int $perPage = 16;

    public string $orderBy = 'id';
    public string $sortBy = 'asc';
    public string $ageRange = '';

    public $readyToLoad = false;

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
        $botola = Botola::query();
        // * Search
        if (!empty($this->term)&& $this->term != null){
            $botola = $botola->search(trim($this->term));
        }

        $botola = $botola->orderBy('ordre', $this->sortBy)->paginate($this->perPage);

        return $botola;

    }

    public function updateItemOrdre($itemId, $newOrder)
    {
        $item = Botola::findOrFail($itemId);

        $targetItem = Botola::where('ordre', $newOrder)->first();

        if ($targetItem) {
            $tempOrder = $item->ordre;
            $item->update(['ordre' => $newOrder]);
            $targetItem->update(['ordre' => $tempOrder]);
        } else {
            $item->update(['ordre' => $newOrder]);
        }
    }


    public function render()
    {
        return view('livewire.admin.botola.botola-index',[
            'botola' => $this->readyToLoad ? $this->getItem() : [],
        ]);
    }
}
