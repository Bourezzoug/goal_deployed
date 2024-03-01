<?php

namespace App\Http\Livewire\Admin\Alert;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AlertIndex extends Component
{
    
    public function render()
    {
        $bannerAlert = DB::connection('second_mysql')
        ->table('bannieres')
        ->where('position', 'Alert')
        ->where('plannification', 'LIKE', '%'.date('Y-m-d').'%')
        ->first();
        
        setlocale(LC_TIME, 'fr_FR');
        return view('livewire.admin.alert.alert-index',[
            'alert'         => Post::where('mise_avant', 1)->first(),
            'bannerAlert'   =>  $bannerAlert,
        ]);
    }
}
