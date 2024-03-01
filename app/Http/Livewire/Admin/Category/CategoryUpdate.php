<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use App\Traits\ToastAlert;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;
use Illuminate\Support\Str;

class CategoryUpdate extends Component
{
    use InteractsWithBanner;
    use ToastAlert;

    public $itemId;

    public $categories;

    public $name, $color, $slug, $order
    ,$parentId;

    protected $listeners = ['showUpdateModel'];

    public bool $showUpdateModel = false;

    protected function rules()
    {
    return [
        'name'          => ['required', 'string', 'max:50', 'min:3', 'unique:categories,name,'.$this->itemId],
        'color'         => ['nullable', 'string', 'min:7', 'max:7' ],
        'parentId'      => ['integer' , 'exists:App\Models\Category,id','nullable'],
    ];
    }

    public function mount($categories){
        $this->categories = Category::where('parent_id',null)->pluck('name','id');
    }

    public function showUpdateModel($itemId){
        $this->itemId = $itemId;
        $this->showUpdateModel = true;

        if (!empty($this->itemId)){
            $item = Category::find($this->itemId);
            $this->name = $item->name;
            $this->slug = $item->slug;

            $this->parentId = $item->parent_id;
            $this->order = $item->order;
            $this->color = $item->color;

        }
    }
    

    public function closeUpdateModel(){
        $this->showUpdateModel = false;
        $this->resetExcept('categories');
        $this->resetValidation();
        $this->resetErrorBag();
    }

    public function edit(){
        $this->validate();

        $data = [
            'name'      =>  $this->name,
            'slug'      =>  Str::slug($this->name),
            'color'     =>  $this->color,
            'parent_id' =>  $this->parentId,
        ];



        Category::where('id',$this->itemId)->update($data);
        $this->closeUpdateModel();
        $this->toast(__('Information de cette categorie ont été mis à jour'));
        $this->banner('Information de cette categorie ont été mis à jour');
        $this->emit('refreshParent');

    }

    public function render()
    {
        return view('livewire.admin.category.category-update');
    }
}
