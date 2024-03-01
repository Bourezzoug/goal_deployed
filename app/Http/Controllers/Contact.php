<?php

namespace App\Http\Controllers;

use App\Mail\ContactEmail;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class Contact extends Controller
{
    public function index() {
        $category =  Category::where('parent_id',null)
        ->whereNot('id',8)
        ->get();
        $subcategory = Category::where('parent_id',8)->get();
        return view('frontend.contact',[
            'categories'    =>  $category,
            'subcategory'    =>  $subcategory,
        ]);
    }


    public function sendEmail(Request $request) {
        $request->validate([
            'nom_complet' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'telephone' => 'required',
            'body' => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ]);
    
        $data = [
            'nom_complet' => $request->nom_complet,
            'email' => $request->email,
            'subject' => $request->subject,
            'telephone' => $request->telephone,
            'body' => $request->body,
        ];
    
        Mail::to('med.developer00@gmail.com')->send(new ContactEmail($data));
    
        return redirect('/');
    }
    
}
