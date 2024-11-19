<?php

// Jonathan

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{
    public function setLocale(string $locale): RedirectResponse
    {
        Session::put('locale', $locale);

        return redirect()->back();
    }
}
