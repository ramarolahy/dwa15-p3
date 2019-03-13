<?php

    Route::get ( '/', 'PageController@getIndex')->name('pages.index');

    Route::get ( '/quote','PageController@getQuote')->name('pages.quote');
