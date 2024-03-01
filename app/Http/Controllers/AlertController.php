<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlertController extends Controller
{
    public function index()
    {
        $bannerAlert = DB::connection('second_mysql')
        ->table('bannieres')
        ->where('position', 'Alert')
        ->where('plannification', 'LIKE', '%'.date('Y-m-d').'%')
        ->first();
        
        setlocale(LC_TIME, 'fr_FR');
        return view('livewire.admin.alert.alert-view',[
            'alert'         => Post::where('mise_avant', 1)->first(),
            'bannerAlert'   =>  $bannerAlert,
        ]);
    }
}
