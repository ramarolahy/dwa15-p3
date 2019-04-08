<?php
    // I will add the home page once we have DB setup so I display any
    // previously created poster from different users
    //Route::get ( '/', 'HomeController@Index')->name('pages.index');
    // The /quotes endpoint will the user profile
    //Route::get ( '/quotes','QuoteController@home')->name('quotes.home');
    Route::get ( '/','QuoteController@create')->name('quotes.create');
    Route::post ( '/','QuoteController@new')->name('quotes.create');

