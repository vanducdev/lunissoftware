<?php

namespace App\Http\Controllers;

use App\Http\Middleware\SetLocale;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{
    public function switch(Request $request, string $locale): RedirectResponse
    {
        if (in_array($locale, SetLocale::SUPPORTED_LOCALES, true)) {
            App::setLocale($locale);
            Session::put('locale', $locale);
            cookie()->queue(cookie()->forever('locale', $locale));
        }

        return redirect()->back();
    }
}
