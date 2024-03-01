<?php

namespace App\Http\Livewire\Admin\Botola;

use App\Models\Botola;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;

class BotolaUpdate extends Component
{
    use WithFileUploads;

    public $itemId,$name,$logo,$logo_path,$win,$draw,$lose,$points;

    protected $listeners = ['showUpdateModel'];

    public bool $showUpdateModel = false;

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

    public function showUpdateModel($itemId){
        $this->itemId = $itemId;
        $this->showUpdateModel = true;

        if (!empty($this->itemId)){
            $item = Botola::find($this->itemId);
            $this->logo_path    = $item->logo;
            $this->name         = $item->name;
            $this->win          = $item->win;
            $this->draw         = $item->draw;
            $this->lose         = $item->lose;
            $this->points       = $item->points;
        }
    }
    public function edit(){
        $this->validate();

        $data = [
            'name'      =>  $this->name,
            'win'       =>  $this->win,
            'draw'      =>  $this->draw,
            'lose'      =>  $this->lose,
            'points'    =>  $this->points,
        ];

        if (!empty($this->logo)) {
            $img = Image::make($this->logo);
            $upload_path = public_path('storage/files/1/teams') . DIRECTORY_SEPARATOR;
            $filename = $this->logo->getClientOriginalName();
            $img->save($upload_path . $filename);
            $data['logo'] = '/storage/files/1/teams/' . $filename;
            
        }
        Botola::where('id',$this->itemId)->update($data);
        $this->closeUpdateModel();
        $this->emit('refreshParent');
    }

    public function render()
    {
        return view('livewire.admin.botola.botola-update');
    }
}
