<?php

    Route::get ( '/', 'HomeController@Index')->name('pages.index');

    Route::get ( '/quotes','QuoteController@home')->name('quotes.home');
    Route::get ( '/quotes/create','QuoteController@create')->name('quotes.create');
    Route::post ( '/quotes/create','QuoteController@new')->name('quotes.create');

