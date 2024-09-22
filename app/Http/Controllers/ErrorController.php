<?php

// Esteban

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ErrorController extends Controller
{
    public function nonexistent(Request $request): View
    {
        $viewData = $request->session()->get('viewData', []);
        $viewData['title'] = 'Nonexistent - PIXEL PLAZA';
        $viewData['subtitle'] = 'Nonexistent - Object not found';

        return view('error.nonexistent')->with('viewData', $viewData);
    }
}
