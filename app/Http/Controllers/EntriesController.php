<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MattDaneshvar\Survey\Models\Survey;
use MattDaneshvar\Survey\Models\Entry;
class EntriesController extends Controller
{
    public function create() {
        $survey = Survey::where('name','popularité')->first();
        return view('hello',['survey' => $survey]);
    }
    public function store(Survey $survey, Request $request)
    {
        $survey = $this->survey();
        $ip_address = request()->ip();
        
        // Check if an entry with the same IP address already exists
        if (Entry::where('survey_id', $survey->id)->where('ip_address', $ip_address)->exists()) {
            return back();
        }
        
        $answers = $this->validate($request, $survey->rules);
        
        $entry = (new Entry)->for($survey);
        $entry->ip_address = $ip_address;
        $entry->fromArray($answers)->push();
        
        return back();
        
    }
    protected function survey() {
        return Survey::orderBy('created_at','desc')->first();
    }
}
