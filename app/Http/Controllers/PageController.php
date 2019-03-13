<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // Get index page
    public function getIndex() {
        return view ('pages.index');
    }

    public function getQuote() {
        return view ('pages.quote');
    }
}
