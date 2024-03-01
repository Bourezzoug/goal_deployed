<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\FootballApi;
use App\Models\Inscrit;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use MattDaneshvar\Survey\Models\Survey;
use GuzzleHttp\Client;
use Illuminate\Validation\Rule;
use App\Models\Botola;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//     public function incrementBannerClick($id)
// {
//     // Increment the click count in the database
//     DB::connection('second_mysql')
//         ->table('bannieres')
//         ->where('id', $id)
//         ->increment('nb_clicks');

//     return response()->json(['success' => true]);
// }

public function incrementBannerView($id)
{
    // Increment the view count in the database
    DB::connection('second_mysql')
        ->table('bannieres')
        ->where('id', $id)
        ->increment('nb_total_vues');

    return response()->json(['success' => true]);
}

    public function view(Request $request) {
        $bannerId = $request->input('bannerId');
    
        // Increment the banner views in the database
        DB::connection('second_mysql')
          ->table('bannieres')
          ->where('id', $bannerId)
          ->increment('nb_total_vues');
    
        return response()->json(['success' => true]);
      }
    public function index()
    {
        setlocale(LC_TIME, 'fr_FR');
        $category =  Category::where('parent_id',null)
        ->whereNot('id',8)
        ->get();
        $subcategory = Category::where('parent_id',8)->get();
        $footballHero = Post::where('category_id',1)
        ->where('status','publié')
        ->latest()->first();
        $tennisHero = Post::where('category_id',2)
        ->where('status','publié')
        ->latest()->first();
        $basketHero = Post::where('category_id',5)
        ->where('status','publié')
        ->latest()->first();
        $athletismeHero = Post::where('category_id',3)
        ->where('status','publié')
        ->latest()->first();
        $boxeHero = Post::where('category_id',46)
        ->where('status','publié')
        ->latest()->first();
        $peopleHero = Post::where('category_id',7)
        ->where('status','publié')
        ->latest()->first();
        $lastThreeFootball = Post::where('category_id', 1)
        ->where('status','publié')
        ->orderBy('created_at', 'desc')->take(3)->get();
        $actuHome = Post::where('category_id', 66)
        ->where('status','publié')
        ->orderBy('created_at', 'desc')->take(3)->get();
        $tennisHome = Post::where('category_id', 2)
        ->where('status','publié')
        ->orderBy('created_at', 'desc')->take(4)->get();
        $athHome = Post::where('category_id', 3)
        ->where('status','publié')
        ->orderBy('created_at', 'desc')->take(3)->get();
        $boxHome = Post::where('category_id', 46)
        ->where('status','publié')
        ->orderBy('created_at', 'desc')->take(4)->get();
        $basket = Post::where('category_id', 5)
        ->where('status','publié')
        ->orderBy('created_at', 'desc')->take(3)->get();
        $videoTop = Post::where('category_id', 6)
        ->where('status','publié')
        ->orderBy('created_at', 'desc')->first();
        $lastthreevideo = Post::where('category_id', 6)
        ->where('status','publié')
    // ->where('id', '<>', $videoTop->id) 
    ->orderBy('created_at', 'desc')
    ->skip(0) // Skip the first post (which is $videoTop)
    ->take(5) // Get the next three posts
    ->get();
    $peopleTop = Post::where('category_id', 7)
    ->where('status','publié')
    ->orderBy('created_at', 'desc')->first();
    $peopleHome = Post::where('category_id', 7)
    ->where('status','publié')
// Exclude the $videoTop post
    ->orderBy('created_at', 'desc')
    ->skip(0) // Skip the first post (which is $videoTop)
    ->take(6) // Get the next three posts
    ->get();
    $diversTop = Post::whereHas('category', function ($query) {
        $query->where('parent_id', 8);
    })
    ->where('status','publié')
    ->orderBy('created_at', 'desc')
    ->first();
    $diverHome = Post::whereHas('category', function ($query) {
        $query->where('parent_id', 8);
    })
    ->where('status','publié')
    ->whereIn('id', function($query) {
        $query->select(DB::raw('MAX(id)'))
              ->from('posts')
              ->groupBy('category_id');
    })
    ->orderBy('created_at', 'desc')
    ->take(6)
    ->get();
    
    
    // Combat Post for homePage
    $combatHome = Post::whereHas('category', function ($query) {
        $query->where('parent_id', 64);
    })
    ->where('status','publié')
    // ->whereIn('id', function($query) {
    //     $query->select(DB::raw('MAX(id)'))
    //           ->from('posts')
    //           ->groupBy('category_id');
    // })
    ->orderBy('created_at', 'desc')
    ->take(4)
    ->get();
    // Auto Moto
        // Combat Post for homePage
    $autoHome = Post::whereHas('category', function ($query) {
        $query->where('parent_id', 65);
    })
    ->where('status','publié')
    // ->whereIn('id', function($query) {
    //     $query->select(DB::raw('MAX(id)'))
    //           ->from('posts')
    //           ->groupBy('category_id');
    // })
    ->orderBy('created_at', 'desc')
    ->take(6)
    ->get();
    
    $sondages = Survey::latest()->first();

    $matches = FootballApi::orderBy('id','desc')->take(8)->get();

    $recentArticle = Post::where('status','publié')
    ->orderBy('created_at', 'desc')
    ->take(5)
    ->get();

    $heroArticle = Post::where('status','publié')
    ->where('category_id', '<>', 1)
    ->where('category_id', '<>', 2)
    ->where('category_id', '<>', 5)
    ->where('category_id', '<>', 7)
    ->where('category_id', '<>', 8)
    ->orderBy('created_at', 'desc')
    ->take(5)
    ->get();


    $mostViewdArticle = Post::orderBy('total_viewers_count','desc')
    ->where('status','publié')
    ->take(5)
    ->get();

    // Banners

    $bannerTopAcceuil = DB::connection('second_mysql')
    ->table('bannieres')
    // ->join('campagnes', 'bannieres.campagne_id', '=', 'campagnes.id')
    ->where('position', 'Acceuil:top')
    ->where('plannification', 'LIKE', '%'.date('Y-m-d').'%')
    // ->where('campagnes.status', 1)
    ->first();

    $bannerPopup = DB::connection('second_mysql')
    ->table('bannieres')
    ->join('campagnes', 'bannieres.campagne_id', '=', 'campagnes.id')
    ->where('bannieres.position', 'Popup')
    ->where('bannieres.plannification', 'LIKE', '%' . date('Y-m-d') . '%')
    ->where('campagnes.status', '1')
    ->select('bannieres.id', 'bannieres.lien', 'bannieres.image', 'bannieres.nb_total_click')
    ->first();
    
    $bannerHabillageAcceuil = DB::connection('second_mysql')
    ->table('bannieres')
    ->join('campagnes', 'bannieres.campagne_id', '=', 'campagnes.id')
    ->where('position', 'Habillage:top')
    ->where('plannification', 'LIKE', '%'.date('Y-m-d').'%')
    ->where('campagnes.status', '1')
    ->select('bannieres.id', 'bannieres.lien', 'bannieres.image', 'bannieres.nb_total_click')
    ->first();

    $bannerHabillageRight = DB::connection('second_mysql')
    ->table('bannieres')
    ->join('campagnes', 'bannieres.campagne_id', '=', 'campagnes.id')
    ->where('position', 'Habillage:right')
    ->where('plannification', 'LIKE', '%'.date('Y-m-d').'%')
    ->where('campagnes.status', 1)
    ->select('bannieres.id', 'bannieres.lien', 'bannieres.image', 'bannieres.nb_total_click')
    ->first();
    $bannerHabillageLeft = DB::connection('second_mysql')
    ->table('bannieres')
    ->join('campagnes', 'bannieres.campagne_id', '=', 'campagnes.id')
    ->where('position', 'Habillage:left')
    ->where('plannification', 'LIKE', '%'.date('Y-m-d').'%')
    ->where('campagnes.status', 1)
    ->select('bannieres.id', 'bannieres.lien', 'bannieres.image', 'bannieres.nb_total_click')
    ->first();
    $bannerFootball = DB::connection('second_mysql')
    ->table('bannieres')
    ->join('campagnes', 'bannieres.campagne_id', '=', 'campagnes.id')
    ->where('bannieres.position', 'Position:1')
    ->where('bannieres.plannification', 'LIKE', '%' . date('Y-m-d') . '%')
    ->where('campagnes.status', 1)
    ->select('bannieres.id', 'bannieres.lien', 'bannieres.image', 'bannieres.nb_total_click')
    ->first();

    $bannerTennis = DB::connection('second_mysql')
    ->table('bannieres')
    ->join('campagnes', 'bannieres.campagne_id', '=', 'campagnes.id')
    ->where('position', 'Position:2')
    ->where('plannification', 'LIKE', '%'.date('Y-m-d').'%')
    ->where('campagnes.status', 1)
    ->select('bannieres.id', 'bannieres.lien', 'bannieres.image', 'bannieres.nb_total_click')
    ->first();
    $bannerTennisRight = DB::connection('second_mysql')
    ->table('bannieres')
    ->join('campagnes', 'bannieres.campagne_id', '=', 'campagnes.id')
    ->where('position', 'Acceuil:Tennis-right')
    ->where('plannification', 'LIKE', '%'.date('Y-m-d').'%')
    ->where('campagnes.status', 1)
    ->select('bannieres.id', 'bannieres.lien', 'bannieres.image', 'bannieres.nb_total_click')
    ->first();
    $bannerAthletisme = DB::connection('second_mysql')
    ->table('bannieres')
    ->join('campagnes', 'bannieres.campagne_id', '=', 'campagnes.id')
    ->where('position', 'Position:3')
    ->where('plannification', 'LIKE', '%'.date('Y-m-d').'%')
    ->where('campagnes.status', 1)
    ->select('bannieres.id', 'bannieres.lien', 'bannieres.image', 'bannieres.nb_total_click')
    ->first();
    $bannerBoxe = DB::connection('second_mysql')
    ->table('bannieres')
    ->join('campagnes', 'bannieres.campagne_id', '=', 'campagnes.id')
    ->where('position', 'Position:4')
    ->where('plannification', 'LIKE', '%'.date('Y-m-d').'%')
    ->where('campagnes.status', 1)
    ->select('bannieres.id', 'bannieres.lien', 'bannieres.image', 'bannieres.nb_total_click')
    ->first();
    $bannerBoxeRight = DB::connection('second_mysql')
    ->table('bannieres')
    ->join('campagnes', 'bannieres.campagne_id', '=', 'campagnes.id')
    ->where('position', 'Acceuil:Boxe-right')
    ->where('plannification', 'LIKE', '%'.date('Y-m-d').'%')
    ->where('campagnes.status', 1)
    ->select('bannieres.id', 'bannieres.lien', 'bannieres.image', 'bannieres.nb_total_click')
    ->first();
    $bannerBasket = DB::connection('second_mysql')
    ->table('bannieres')
    ->join('campagnes', 'bannieres.campagne_id', '=', 'campagnes.id')
    ->where('position', 'Position:5')
    ->where('plannification', 'LIKE', '%'.date('Y-m-d').'%')
    ->where('campagnes.status', 1)
    ->select('bannieres.id', 'bannieres.lien', 'bannieres.image', 'bannieres.nb_total_click')
    ->first();
    $bannerVideo = DB::connection('second_mysql')
    ->table('bannieres')
    ->join('campagnes', 'bannieres.campagne_id', '=', 'campagnes.id')
    ->where('position', 'Position:6')
    ->where('plannification', 'LIKE', '%'.date('Y-m-d').'%')
    ->where('campagnes.status', 1)
    ->select('bannieres.id', 'bannieres.lien', 'bannieres.image', 'bannieres.nb_total_click')
    ->first();
    $bannerPeopleDivers = DB::connection('second_mysql')
    ->table('bannieres')
    ->join('campagnes', 'bannieres.campagne_id', '=', 'campagnes.id')
    ->where('position', 'Position:7')
    ->where('plannification', 'LIKE', '%'.date('Y-m-d').'%')
    ->where('campagnes.status', 1)
    ->select('bannieres.id', 'bannieres.lien', 'bannieres.image', 'bannieres.nb_total_click')
    ->first();

        $botolaPro = Botola::orderBy('ordre','asc')->get();
        return view('frontend.Home',[
            'categories'                =>  $category,
            'subcategory'               =>  $subcategory,
            'footballHero'              =>  $footballHero,
            'tennisHero'                =>  $tennisHero,
            'basketHero'                =>  $basketHero,
            'athletismeHero'            =>  $athletismeHero,
            'boxeHero'                  =>  $boxeHero,
            'peopleHero'                =>  $peopleHero,
            'lastThreeFootball'         =>  $lastThreeFootball,
            'tennisHome'                =>  $tennisHome,
            'athHome'                   =>  $athHome,
            'boxHome'                   =>  $boxHome,
            'basket'                    =>  $basket,
            'videoTop'                  =>  $videoTop,
            'lastthreevideo'            =>  $lastthreevideo,
            'peopleTop'                 =>  $peopleTop,
            'diversTop'                 =>  $diversTop,
            'peopleHome'                =>  $peopleHome,
            'diverHome'                 =>  $diverHome,
            'sondages'                  =>  $sondages,
            'matches'                   =>  $matches,
            'recentArticle'             =>  $recentArticle,
            'heroArticle'               =>  $heroArticle,
            'mostViewdArticle'          =>  $mostViewdArticle,
            'bannerTopAcceuil'          =>  $bannerTopAcceuil,
            'bannerPopup'               =>  $bannerPopup,
            'bannerHabillageAcceuil'    =>  $bannerHabillageAcceuil,
            'bannerHabillageRight'      =>  $bannerHabillageRight,
            'bannerHabillageLeft'       =>  $bannerHabillageLeft,
            'bannerFootball'            =>  $bannerFootball,
            'bannerTennis'              =>  $bannerTennis,
            'bannerTennisRight'         =>  $bannerTennisRight,
            'bannerAthletisme'          =>  $bannerAthletisme,
            'bannerBoxe'                =>  $bannerBoxe,
            'bannerBoxeRight'           =>  $bannerBoxeRight,
            'bannerBasket'              =>  $bannerBasket,
            'bannerVideo'               =>  $bannerVideo,
            'bannerPeopleDivers'        =>  $bannerPeopleDivers,
            'actuHome'                  =>  $actuHome,
            'combatHome'                =>  $combatHome,
            'autoHome'                  =>  $autoHome,
             'botolaPro'                =>  $botolaPro
        ]);

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
        try {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(Inscrit::class)],
        ]);

        Inscrit::create([
            // 'email'   =>  $request->email,
            'email' => strtolower($request->email),
            'conditions'    =>  $request->conditions
        ]);
        return response()->json(['message' => 'Success!'], 200);
    
    } catch (\Exception $e) {

        return response()->json(['message' => $e->getMessage()], 422);
    }
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
