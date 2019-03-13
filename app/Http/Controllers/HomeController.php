<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // Get index page
    public function Index() {
        return view ('pages.index');
    }

    public function QuotesHome() {
        return view ('pages.quotes.QuotesHome');
    }

    public function QuotesCreate() {
        return view ('pages.quotes.QuotesCreate');
    }
}
