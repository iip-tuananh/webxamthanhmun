<?php
Route::group(['namespace' => 'Front'], function () {
    Route::get('/','FrontController@homePage')->name('front.home-page');
    Route::get('/dich-vu/{slug}','FrontController@getServiceDetail')->name('front.getServiceDetail');
    Route::get('/khoa-hoc/{slug}','FrontController@getCourseDetail')->name('front.getCourseDetail');
    Route::get('/san-pham/{slug?}','FrontController@getListProduct')->name('front.getListProduct');
    Route::get('/chi-tiet-san-pham/{slug}','FrontController@getProductDetail')->name('front.getProductDetail');
    Route::get('/ve-chung-toi','FrontController@about_page')->name('front.about_page');
    Route::get('/thanh-vien/{id?}','FrontController@teams')->name('front.teams');
    Route::get('/danh-muc/{slug}','FrontController@blogs')->name('front.blogs');
    Route::get('/post/{slug}','FrontController@blogDetail')->name('front.blogDetail');


    Route::get('/gio-hang','CartController@index')->name('cart.index');
    Route::post('/{productId}/add-product-to-cart','CartController@addItem')->name('cart.add.item');
    Route::get('/remove-product-to-cart','CartController@removeItem')->name('cart.remove.item');
    Route::post('/update-cart','CartController@updateItem')->name('cart.update.item');
    Route::get('/thanh-toan','CartController@checkout')->name('cart.checkout');
    Route::post('/checkout','CartController@checkoutSubmit')->name('cart.post.checkout');
    Route::get('/dat-hang-thanh-cong','CartController@checkoutSuccess')->name('cart.checkout.success');


    Route::get('/rooms/','FrontController@getListRooms')->name('front.getListRooms');
    Route::get('/room/{slug}','FrontController@getRoom')->name('front.getRoom');
    Route::get('/services/{slug?}','FrontController@services')->name('front.services');
    Route::get('/contact','FrontController@contact')->name('front.contact');
    Route::post('/postContact','FrontController@postContact')->name('front.submitContact');



    Route::get('/kien-thuc/{slug?}','FrontController@knowledge')->name('front.knowledge');
    Route::get('/chi-tiet-bai-viet-kien-thuc/{slug}','FrontController@getKnowledgeDetail')->name('front.getKnowledgeDetail');

    Route::get('/du-an/{slug?}','FrontController@projects')->name('front.projects');
    Route::get('/chi-tiet-du-an/{slug}','FrontController@getProjectDetail')->name('front.getProjectDetail');
    Route::get('/tim-kiem','FrontController@searchProducts')->name('front.search-products');



    Route::get('onlyme/clear', 'FrontController@clearData')->name('front.clearData');

    Route::get('/{any}', function () {
        // Laravel tự load view errors/404.blade.php khi abort(404)
        abort(404);
    })
        ->where('any', '.*');

});




