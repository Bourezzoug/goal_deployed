<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\FootballApi;
use App\Models\Post;
use App\Models\UniqueView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use MattDaneshvar\Survey\Models\Survey;
use Jenssegers\Agent\Agent;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    setlocale(LC_TIME, 'fr_FR');

        // Find the post based on the provided slug
        $post = Post::where('slug', $request->slug)
        ->where('status','publié')
        ->firstOrFail();
        
    
// // Generate a cache key based on the post ID and the user's unique identifier
// $cacheKey = "post_view_{$post->id}_" . md5($request->session()->getId());

// if (!Cache::has($cacheKey)) {
//     // If the cache key does not exist, increment the nb_vues column
//     $post->increment('nb_vues');

//     // Set the cache key to true, indicating that the user has viewed the post
//     Cache::put($cacheKey, true, 1440); // Cache for 24 hours
// }
// Find the blog post


// Get the current user's IP address
$ipAddress = request()->ip();
$agent = new Agent();

// Determine the device type
$deviceType = $agent->deviceType();

// Check if a unique view exists for this blog post and IP address
$uniqueView = UniqueView::where('post_id', $post->id)
        ->where('ip_address', $ipAddress)
        ->where('deviceType',$deviceType)
        ->first();

if (!$uniqueView && $deviceType != 'robot') {
    // If a unique view doesn't exist, create a new one
    $uniqueView = new UniqueView();
    $uniqueView->post_id = $post->id;
    $uniqueView->ip_address = $ipAddress;
    $uniqueView->deviceType = $deviceType;
    $uniqueView->save();


    $post->unique_viewers_count++;
}


$post->total_viewers_count++;
$post->save();
    
        // Find related articles based on the post's category
        $relatedArticle = Post::where('category_id', $post->category_id)
        ->where('status','publié')
            ->where('id', '<>', $post->id)
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();
    
        // Get the latest survey
        $sondages = Survey::latest()->first();
        $category =  Category::where('parent_id',null)
        ->whereNot('id',8)
        ->get();
        $subcategory = Category::where('parent_id',8)->get();

            // Banners

            $bannerFootball = DB::connection('second_mysql')
            ->table('bannieres')
            ->join('campagnes', 'bannieres.campagne_id', '=', 'campagnes.id')
            ->where('bannieres.position', 'Position:1')
            ->where('bannieres.plannification', 'LIKE', '%' . date('Y-m-d') . '%')
            ->where('campagnes.status', 1)
            ->first();
        
            $bannerTennis = DB::connection('second_mysql')
            ->table('bannieres')
            ->join('campagnes', 'bannieres.campagne_id', '=', 'campagnes.id')
            ->where('position', 'Position:2')
            ->where('plannification', 'LIKE', '%'.date('Y-m-d').'%')
            ->where('campagnes.status', 1)
            ->first();
            $bannerTennisRight = DB::connection('second_mysql')
            ->table('bannieres')
            ->join('campagnes', 'bannieres.campagne_id', '=', 'campagnes.id')
            ->where('position', 'Acceuil:Tennis-right')
            ->where('plannification', 'LIKE', '%'.date('Y-m-d').'%')
            ->where('campagnes.status', 1)
            ->first();
            $bannerAthletisme = DB::connection('second_mysql')
            ->table('bannieres')
            ->join('campagnes', 'bannieres.campagne_id', '=', 'campagnes.id')
            ->where('position', 'Position:3')
            ->where('plannification', 'LIKE', '%'.date('Y-m-d').'%')
            ->where('campagnes.status', 1)
            ->first();
            $bannerBoxe = DB::connection('second_mysql')
            ->table('bannieres')
            ->join('campagnes', 'bannieres.campagne_id', '=', 'campagnes.id')
            ->where('position', 'Position:4')
            ->where('plannification', 'LIKE', '%'.date('Y-m-d').'%')
            ->where('campagnes.status', 1)
            ->first();
            $bannerBoxeRight = DB::connection('second_mysql')
            ->table('bannieres')
            ->join('campagnes', 'bannieres.campagne_id', '=', 'campagnes.id')
            ->where('position', 'Acceuil:Boxe-right')
            ->where('plannification', 'LIKE', '%'.date('Y-m-d').'%')
            ->where('campagnes.status', 1)
            ->first();
            $bannerBasket = DB::connection('second_mysql')
            ->table('bannieres')
            ->join('campagnes', 'bannieres.campagne_id', '=', 'campagnes.id')
            ->where('position', 'Position:5')
            ->where('plannification', 'LIKE', '%'.date('Y-m-d').'%')
            ->where('campagnes.status', 1)
            ->first();
            $bannerVideo = DB::connection('second_mysql')
            ->table('bannieres')
            ->join('campagnes', 'bannieres.campagne_id', '=', 'campagnes.id')
            ->where('position', 'Position:6')
            ->where('plannification', 'LIKE', '%'.date('Y-m-d').'%')
            ->where('campagnes.status', 1)
            ->first();
            $bannerPeopleDivers = DB::connection('second_mysql')
            ->table('bannieres')
            ->join('campagnes', 'bannieres.campagne_id', '=', 'campagnes.id')
            ->where('position', 'Position:7')
            ->where('plannification', 'LIKE', '%'.date('Y-m-d').'%')
            ->where('campagnes.status', 1)
            ->first();
    $matches = FootballApi::orderBy('id','desc')->take(8)->get();



        return view('frontend.post', [
            'categories'                => $category,
            'subcategory'               => $subcategory,
            'post'                      => $post,
            'relatedArticle'            => $relatedArticle,
            'sondages'                  => $sondages,
            'bannerFootball'            =>  $bannerFootball,
            'bannerTennis'              =>  $bannerTennis,
            'bannerTennisRight'         =>  $bannerTennisRight,
            'bannerAthletisme'          =>  $bannerAthletisme,
            'bannerBoxe'                =>  $bannerBoxe,
            'bannerBoxeRight'           =>  $bannerBoxeRight,
            'bannerBasket'              =>  $bannerBasket,
            'bannerVideo'               =>  $bannerVideo,
            'bannerPeopleDivers'        =>  $bannerPeopleDivers,
            'matches'                   =>  $matches,
        ]);
        // dd(url($post->category->slug . '/' .$post->slug));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
