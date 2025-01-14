<?php

Route::group([
    'namespace' => 'Profile',
], function() {



    Route::group([ 'prefix' => 'profile',  'as' => 'profile.'], function() {

        Route::get('/index', 'ProfileController@index')->name('index');
        Route::get('/packages', 'ProfileController@packages')->name('packages');


        Route::get('/create_candidate', 'ProfileController@createCandidate')->name('create_candidate');
        Route::get('/edit_candidate/{candidate}', 'ProfileController@editCandidate')->name('edit_candidate');
        Route::post('/update_candidate/{candidate}', 'ProfileController@updateCandidate')->name('update_candidate');




        Route::post('/store_candidate', 'ProfileController@storeCandidate')->name('store_candidate');

        Route::get('/personal_info', 'ProfileController@personalInformation')->name('personal_info');
        Route::get('/personal_info/edit/{user}', 'ProfileController@editPersonalInformation')->name('edit_personal_info');
        Route::post('/personal_info/update/{user}', 'ProfileController@updatePersonalInformation')->name('update_personal_info');

        Route::get('/candidate_info', 'ProfileController@candidateInformation')->name('candidate_info');





    });
});

