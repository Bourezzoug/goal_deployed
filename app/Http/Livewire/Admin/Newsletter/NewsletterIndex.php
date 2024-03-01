<?php

namespace App\Http\Livewire\Admin\Newsletter;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class NewsletterIndex extends Component
{
    
    public function render()
    {
        $firstBanner = DB::connection('second_mysql')
        ->table('bannieres')
        ->join('campagnes', 'bannieres.campagne_id', '=', 'campagnes.id')
        ->where('position', 'zone_1')
        ->where('plannification', 'LIKE', '%'.date('Y-m-d').'%')
        ->where('campagnes.status', 1)
        ->first();

        $secondBanner = DB::connection('second_mysql')
        ->table('bannieres')
        ->join('campagnes', 'bannieres.campagne_id', '=', 'campagnes.id')
        ->where('position', 'zone_2')
        ->where('plannification', 'LIKE', '%'.date('Y-m-d').'%')
        ->where('campagnes.status', 1)
        ->first();

        $thirdBanner = DB::connection('second_mysql')
        ->table('bannieres')
        ->join('campagnes', 'bannieres.campagne_id', '=', 'campagnes.id')
        ->where('position', 'zone_3')
        ->where('plannification', 'LIKE', '%'.date('Y-m-d').'%')
        ->where('campagnes.status', 1)
        ->first();

        $fourthBanner = DB::connection('second_mysql')
        ->table('bannieres')
        ->join('campagnes', 'bannieres.campagne_id', '=', 'campagnes.id')
        ->where('position', 'zone_4')
        ->where('plannification', 'LIKE', '%'.date('Y-m-d').'%')
        ->where('campagnes.status', 1)
        ->first();

        $fifthBanner = DB::connection('second_mysql')
        ->table('bannieres')
        ->join('campagnes', 'bannieres.campagne_id', '=', 'campagnes.id')
        ->where('position', 'zone_5')
        ->where('plannification', 'LIKE', '%'.date('Y-m-d').'%')
        ->where('campagnes.status', 1)
        ->first();
        return view('livewire.admin.newsletter.newsletter-index',[
            'firstArticles'     =>  Post::where('ordre','<','3')->orderBy('ordre')->get(),
            'secondArticles'    =>  Post::whereBetween('ordre', [3, 4])->orderBy('ordre')->get(),
            'thirdArticles'     =>  Post::whereBetween('ordre', [5, 6])->orderBy('ordre')->get(),
            'fourthArticles'    =>  Post::whereBetween('ordre', [7, 8])->orderBy('ordre')->get(),
            'fifthArticles'     =>  Post::whereBetween('ordre', [9, 10])->orderBy('ordre')->get(),
            'firstBanner'       =>  $firstBanner,
            'secondBanner'      =>  $secondBanner,
            'thirdBanner'      =>  $thirdBanner,
            'fourthBanner'      =>  $fourthBanner,
            'fifthBanner'      =>  $fifthBanner,
        ]);
    }
}
