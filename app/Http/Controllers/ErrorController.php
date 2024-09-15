<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

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