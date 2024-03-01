<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use MattDaneshvar\Survey\Models\Survey;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function index(Request $request)
{
    setlocale(LC_TIME, 'fr_FR');

    // Get the category by name
    $categories = Category::where('slug', $request->segment(1))
    ->firstOrFail();
    
    $category =  Category::where('parent_id',null)
        ->whereNot('id',8)
        ->get();
        $subcategory = Category::where('parent_id',8)->get();

    // Get the posts for the category

    $categoryPost = Post::where('category_id', $categories->id)
    ->where('status','publié')
    ->orderBy('created_at', 'desc')->paginate(8);
    if($request->getRequestUri() == '/divers') {
        $categoryPost = Post::whereHas('category', function ($query) use ($categories) {
            $query->where('parent_id', $categories->id);
        })
        ->where('status','publié')
        ->orderBy('created_at', 'desc')
        ->paginate(8);
    }
    $subcategories = Post::whereHas('category', function ($query) use ($categories) {
        $query->where('parent_id', $categories->id);
    })
    ->where('status','publié')
    ->orderBy('created_at', 'desc')
    ->paginate(8);

    $mostViewdArticle = Post::orderBy('total_viewers_count','desc')
    ->take(3)
    ->get();


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
        $sondages = Survey::latest()->first();

    return view('frontend.category', [
        'categories'                => $category,
        'subcategory'               => $subcategory, // the subcategory of navbar
        'categoryPost'              => $categoryPost,
        'subcategories'             => $subcategories, // the subcategory post where its parent id equals  8 (Divers)
        'categoryName'              =>  $categories->name,
        'mostViewdArticle'          =>  $mostViewdArticle,
        'bannerFootball'            =>  $bannerFootball,
        'bannerTennis'              =>  $bannerTennis,
        'bannerTennisRight'         =>  $bannerTennisRight,
        'bannerAthletisme'          =>  $bannerAthletisme,
        'bannerBoxe'                =>  $bannerBoxe,
        'bannerBoxeRight'           =>  $bannerBoxeRight,
        'bannerBasket'              =>  $bannerBasket,
        'bannerVideo'               =>  $bannerVideo,
        'bannerPeopleDivers'        =>  $bannerPeopleDivers,
        'sondages'                  =>  $sondages,
        'cat'                       =>  $categories
    ]);
    // dd($request->getRequestUri());
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
