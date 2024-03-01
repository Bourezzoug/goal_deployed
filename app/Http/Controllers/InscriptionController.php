<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Inscrit;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category =  Category::where('parent_id',null)
        ->whereNot('id',8)
        ->get();
        $subcategory = Category::where('parent_id',8)->get();
        return view('frontend.inscription-newsletter',[
            'categories'    =>  $category,
            'subcategory'   =>  $subcategory
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

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
                'nom_complet' => ['required', 'string', 'max:50', 'min:3'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique(Inscrit::class)],
                'telephone' => ['required', 'string', 'regex:/^[\d\s\(\)\-]+$/', 'min:10','max:15',Rule::unique(Inscrit::class)],
                'fonction' => ['required', 'string'],
                'ville' => ['required', 'string', 'min:3','max:255'],
                'age' => ['required', 'string'],
                'civilite' => ['required', 'string', 'min:5','max:25'],
            ]);

            Inscrit::create([
                'nom_complet'   =>  $request->nom_complet,
                // 'email'   =>  $request->email,
                'email' => strtolower($request->email),
                'telephone'   =>  $request->telephone,
                'fonction'   =>  $request->fonction,
                'ville'   =>  $request->ville,
                'age'   =>  $request->age,
                'newsgoal'  =>  $request->newsgoal,
                'newspartenaire'    =>  $request->newspartenaire,
                'conditions'    =>  $request->conditions,
                'civilite'    =>  $request->civilite,
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
