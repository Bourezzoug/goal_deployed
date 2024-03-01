<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use MattDaneshvar\Survey\Models\Survey;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    setlocale(LC_TIME, 'fr_FR');

        $category =  Category::where('parent_id',null)
        ->whereNot('id',8)
        ->get();
        $subcategory = Category::where('parent_id',8)->get();
        $query = $request->input('query');
        $mostViewdArticle = Post::orderBy('total_viewers_count','desc')
        ->take(3)
        ->get();
        $sondages = Survey::latest()->first();


        if ($query) {
            session(['search_query' => $query]); 
            $results = Post::where('title', 'LIKE', "%$query%")->paginate(10);
        } else {
            $query = session('search_query');
            $results = Post::where('title', 'LIKE', "%$query%")->paginate(10);
        }

        return view('frontend.search', [
            'results'           => $results,
            'categories'        => $category,
            'subcategory'       => $subcategory,
            'mostViewdArticle'  =>  $mostViewdArticle,
            'sondages'          =>  $sondages,
            'query'             =>  $query
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
