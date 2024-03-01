<?php

namespace App\Http\Livewire\Admin\Botola;

use App\Models\Botola;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;

class BotolaCreate extends Component
{
    use WithFileUploads;
    public $name,$logo,$win,$draw,$lose,$points;

    protected function rules()
    {

        $rules =  [
            'name'      =>  ['required', 'string'],
            'logo'      =>  'required|image|mimes:jpeg,png,jpg,webp',
            'win'       =>  ['required', 'string'],
            'lose'      =>  ['required', 'string'],
            'draw'      =>  ['required', 'string'],
            'points'    =>  ['required', 'string'],
        ];

        return $rules;
    }

    protected $listeners = ['showCreateModel'];

    public function closeCreateModel(){
        $this->showCreateModel = false;
        $this->resetExcept('roles');
        $this->resetValidation();
        $this->resetErrorBag();
    }

    public bool $showCreateModel = false;

    public function showCreateModel(){
        $this->showCreateModel = true;
    }
    public function create(){
        $this->validate();
        $data = [
            'name'      =>  $this->name ,
            'win'       =>  $this->win ,
            'lose'      =>  $this->lose ,
            'draw'      =>  $this->draw ,
            'points'    =>  $this->points ,
        ];
        // Set the 'ordre' of the new post to 1
        $data['ordre'] = 1;

        // Increment the 'ordre' for all existing posts by 1
        Botola::whereNotNull('ordre')->update(['ordre' => DB::raw('ordre + 1')]);

        if (!empty($this->logo)) {
            $img = Image::make($this->logo);
            $upload_path = public_path('storage/files/1/teams') . DIRECTORY_SEPARATOR;
            $filename = $this->logo->getClientOriginalName();
            $img->save($upload_path . $filename);
            $data['logo'] = '/storage/files/1/teams/' . $filename;
            
        }
        Botola::create($data);

        $this->closeCreateModel();
        // $this->banner('User Created');
        $this->emit('refreshParent');
    }
    public function render()
    {
        return view('livewire.admin.botola.botola-create');
    }
}
