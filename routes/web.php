<?php

Route::get('/',[
    'uses'=>'HomeController@getIndex',
    'as'=>'/'
]);
Route::get('/image/{file_name}',[
    'uses'=>'HomeController@getImage',
    'as'=>'image'
]);
Route::get('/image_file/{image_file}',[
    'uses'=>'HomeController@getFile',
    'as'=>'image_file'
]);
Route::get('/get_by_category/{cat_id}',[
    'uses'=>'HomeController@getCategory',
    'as'=>'get_by_category'
]);
Route::get('/search',[
    'uses'=>'HomeController@getSearch',
    'as'=>'search'
]);

Route::group(['prefix'=>'auth'],function (){
Route::group(['middleware'=>'auth'],function (){


    Route::get('/register',[
        'uses'=>'AuthController@getRegister',
        'as'=>'register'
    ]);
    Route::post('/register',[
        'uses'=>'AuthController@postRegister',
        'as'=>'register'
    ]);
});
    Route::get('/login',[
        'uses'=>'AuthController@getLogin',
        'as'=>'login'
    ]);
    Route::post('/login',[
        'uses'=>'AuthController@postLogin',
        'as'=>'login',
    ]);

});
Route::group(['prefix'=>'admin'],function (){
    Route::group(['middleware'=>'auth'],function (){
        Route::get('/dashboard',[
            'uses'=>'AdminController@getDashboard',
            'as'=>'dashboard',
        ]);
        Route::get('/logout',[
            'uses'=>'AuthController@getLogout',
            'as'=>'logout'
        ]);
        Route::get('/new_cat',[
            'uses'=>'AdminController@getNewCat',
            'as'=>'new_cat',
        ]);
        Route::post('/category',[
            'uses'=>'AdminController@postCategory',
            'as'=>'category'
        ]);
        Route::get('/show_cat',[
            'uses'=>'AdminController@showCat',
            'as'=>'show_cat',
        ]);
        Route::get('/new_book',[
            'uses'=>'AdminController@getNewBook',
            'as'=>'new_book',
        ]);
        Route::post('/new_book',[
            'uses'=>'AdminController@postNewBook',
            'as'=>'new_book'
        ]);
        Route::get('/show_book',[
            'uses'=>'AdminController@showBook',
            'as'=>'show_book'
        ]);
        Route::get('/delete',[
            'uses'=>'AdminController@getDelete',
            'as'=>'delete'
        ]);
        Route::get('/deleteCat/{deleteCat}',[
            'uses'=>'AdminController@getDeleteCat',
            'as'=>'deleteCat'
        ]);
        Route::get('deleteBook',[
            'uses'=>'AdminController@getDeleteBook',
            'as'=>'deleteBook'
        ]);
Route::get('/bookdel/{del}',[
    'uses'=>'AdminController@DeleteBook',
    'as'=>'bookdel'
]);

Route::get('/updateBook',[
    'uses'=>'AdminController@getUpdateBook',
    'as'=>'updateBook'
]);

Route::get('/update/{updateBook}',[
    'uses'=>'AdminController@BookUpdate',
    'as'=>'update'
]);

Route::post('/updateBookName',[
    'uses'=>'AdminController@postUpdate',
    'as'=>'updateBookName'
]);

    });
});
