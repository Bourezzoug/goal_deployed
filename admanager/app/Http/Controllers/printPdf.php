<?php

namespace App\Http\Controllers;

use App\Models\Banniere;
use Illuminate\Http\Request;
use PDF;
class printPdf extends Controller
{
    public function printPdf($itemId) {
        $banniere = Banniere::with('campagne')->where('id', $itemId)->firstOrFail();
    
        $data = [
            'banniere' => $banniere,
        ];
    
        $pdf = PDF::loadView('pdf_view', $data);
        return $pdf->download('pdf_file.pdf');
    }
    
}
