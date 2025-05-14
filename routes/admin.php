<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentryController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\PublicController;
use App\Http\Controllers\ChildcategoryController;
Route::get('/admin-login', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin'])->name(
    'admin.login');

Route::group(['namespace'=>'App\Http\Controllers\Admin','middleware'=>'is_admin'],function(){
    Route::get('/admin/home','AdminController@admin')->name('admin.home');
    Route::get('/admin/logout','AdminController@logout')->name('admin.logout');

    // Category route
    Route::group(['prefix'=>'matchh'],function(){
        Route::get('/','MatchhController@index')->name('matchh.index');
        Route::post('/store','MatchhController@store')->name('matchh.store');
        Route::get('/delete/{id}','MatchhController@destroy')->name('matchh.delete');
        Route::get('/edit/{id}','MatchhController@edit');
        Route::post('/update','MatchhController@update')->name('matchh.update');
    });

    // Category route
    Route::group(['prefix'=>'teams'],function(){
        Route::get('/','TeamController@index')->name('teams.index');
        Route::post('/store','TeamController@store')->name('teams.store');
        Route::get('/delete/{id}','TeamController@destroy')->name('teams.delete');
        Route::get('/edit/{id}','TeamController@edit');
        Route::post('/update','TeamController@update')->name('teams.update');
    });

    // subcategory route
    Route::group(['prefix'=>'player'],function(){
        Route::get('/','PlayerController@index')->name('player.index');
        Route::post('/store','PlayerController@store')->name('player.store');
        Route::get('/delete/{id}','PlayerController@destroy')->name('player.delete');
        Route::get('/edit/{id}','PlayerController@edit');
        Route::post('/update','PlayerController@update')->name('player.update');
    });

    // score route
    Route::group(['prefix'=>'score'],function(){
        Route::get('/','ScoreController@index')->name('score.index');
        Route::post('/store','ScoreController@store')->name('score.store');
        Route::get('/delete/{id}','ScoreController@destroy')->name('score.delete');
        Route::get('/edit/{id}','ScoreController@edit');
        Route::post('/update','ScoreController@update')->name('score.update');
    });
    // score route
    Route::group(['prefix'=>'scorebowlerfirst'],function(){
        Route::get('/','ScorebowlerfirstController@index')->name('scorebowlerfirst.index');
        Route::post('/store','ScorebowlerfirstController@store')->name('scorebowlerfirst.store');
        Route::get('/delete/{id}','ScorebowlerfirstController@destroy')->name('scorebowlerfirst.delete');
        Route::get('/edit/{id}','ScorebowlerfirstController@edit');
        Route::post('/update','ScorebowlerfirstController@update')->name('scorebowlerfirst.update');
    });

     // score batter second route
     Route::group(['prefix'=>'scorebattersecond'],function(){
        Route::get('/','ScorebattersecondController@index')->name('scorebattersecond.index');
        Route::post('/store','ScorebattersecondController@store')->name('scorebattersecond.store');
        Route::get('/delete/{id}','ScorebattersecondController@destroy')->name('scorebattersecond.delete');
        Route::get('/edit/{id}','ScorebattersecondController@edit');
        Route::post('/update','ScorebattersecondController@update')->name('scorebattersecond.update');
    });

    // score bowler second route
    Route::group(['prefix'=>'scorebowlersecond'],function(){
        Route::get('/','ScorebowlersecondController@index')->name('scorebowlersecond.index');
        Route::post('/store','ScorebowlersecondController@store')->name('scorebowlersecond.store');
        Route::get('/delete/{id}','ScorebowlersecondController@destroy')->name('scorebowlersecond.delete');
        Route::get('/edit/{id}','ScorebowlersecondController@edit');
        Route::post('/update','ScorebowlersecondController@update')->name('scorebowlersecond.update');
    });

    // news route
    Route::group(['prefix'=>'news'],function(){
        Route::get('/','NewsController@index')->name('news.index');
        Route::post('/store','NewsController@store')->name('news.store');
        // Route::get('/delete/{id}','ChildcategoryController@destroy')->name('childcategory.delete');
        // Route::get('/edit/{id}','ChildcategoryController@edit');
        // Route::post('/update','ChildcategoryController@update')->name('childcategory.update');
    });

    // scoreupdates route
    Route::group(['prefix'=>'scoreupdates'],function(){
        Route::get('/','ScoreupdateController@index')->name('scoreupdates.index');
        Route::post('/store','ScoreupdateController@store')->name('scoreupdates.store');
        Route::get('/delete/{id}','ScoreupdateController@destroy')->name('scoreupdates.delete');
        Route::get('/edit/{id}','ScoreupdateController@edit');
        Route::post('/update','ScoreupdateController@update')->name('scoreupdates.update');
    });

    // subcategory route
    Route::group(['prefix'=>'updatebowler'],function(){
        Route::get('/','UpdatebowlerController@index')->name('updatebowler.index');
        Route::post('/store','UpdatebowlerController@store')->name('updatebowler.store');
        Route::get('/delete/{id}','UpdatebowlerController@destroy')->name('updatebowler.delete');
        Route::get('/edit/{id}','UpdatebowlerController@edit');
        Route::post('/update','UpdatebowlerController@update')->name('updatebowler.update');
    });

    // Route::get('public_scores', [PublicController::class, 'view'])->name('dropdownView');
    // Route::get('get-states', [PublicController::class, 'getStates'])->name('getStates');

    // curve route
    Route::group(['prefix'=>'curve'],function(){
        Route::get('/','CurveController@index')->name('curve.index');
        Route::post('/store','CurveController@store')->name('curve.store');
        Route::get('/delete/{id}','CurveController@destroy')->name('curve.delete');
        Route::get('/edit/{id}','CurveController@edit');
        Route::post('/update','CurveController@update')->name('curve.update');
    });

    // commentry route
    Route::group(['prefix'=>'commentry'],function(){
        Route::get('/','CommentryController@index')->name('commentry.index');
        Route::post('/store','CommentryController@store')->name('commentry.store');
        Route::get('/delete/{id}','CommentryController@destroy')->name('commentry.delete');
        Route::get('/edit/{id}','CommentryController@edit');
        Route::post('/update','CommentryController@update')->name('commentry.update');
    });

    // commentry route
    Route::group(['prefix'=>'commentrycreate'],function(){
        Route::get('/','CommentryCreateController@index')->name('commentrycreate.index');
        Route::post('/store','CommentryCreateController@store')->name('commentrycreate.store');
        Route::get('/delete/{id}','CommentryCreateController@destroy')->name('commentrycreate.delete');
        Route::get('/edit/{id}','CommentryCreateController@edit');
        Route::post('/update','CommentryCreateController@update')->name('commentrycreate.update');
    });
});

