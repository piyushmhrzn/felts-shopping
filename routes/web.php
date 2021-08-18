<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/clear-cache-config', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('storage:link');
    dd("ok");
});

//Website
Route::get('/', 'App\Http\Controllers\WebsiteController@index')->name('index');
Route::get('/about-us', 'App\Http\Controllers\WebsiteController@about')->name('about-us');
Route::get('/contact-us', 'App\Http\Controllers\WebsiteController@contact')->name('contact-us');
Route::get('/our-products', 'App\Http\Controllers\WebsiteController@ourProducts')->name('our-products');
Route::get('/product/{slug}', 'App\Http\Controllers\WebsiteController@singleProduct')->name('single-product-view');

// Subscription-Contact Forms
Route::post('/emailSubscription', 'App\Http\Controllers\WebsiteController@emailSubscription')->name('emailSubscription');
Route::get('/unsubscribe/{id}', 'App\Http\Controllers\WebsiteController@unsubscribe')->name('unsubscribe')->middleware('signed');
Route::post('/storeContactMessage', 'App\Http\Controllers\WebsiteController@storeContactMessage')->name('storeContactMessage');

//User Login-Resgiter Formss
Route::get('/user-login', 'App\Http\Controllers\WebsiteController@userLogin')->name('user-login');
Route::post('/userRegister', 'App\Http\Controllers\WebsiteController@userRegister')->name('userRegister');
Route::post('/verifyUser', 'App\Http\Controllers\WebsiteController@verifyUser')->name('verifyUser');

Route::group(['middleware' => 'guest'], function () {
    route::get('/adminLogin', 'App\Http\Controllers\AdminController@adminLogin')->name('adminLogin');
    route::post('/verifyAdmin', 'App\Http\Controllers\AdminController@verifyAdmin')->name('verifyAdmin');
    route::get('/forgotPassword', 'App\Http\Controllers\AdminController@forgotPassword')->name('forgotPassword');
    route::post('/passwordResetMail', 'App\Http\Controllers\AdminController@passwordResetMail')->name('passwordResetMail');
    route::get('/resetForgotPassword/{id}', 'App\Http\Controllers\AdminController@resetForgotPassword')->name('resetForgotPassword')->middleware('signed');
    route::post('/resetPassword/{id}', 'App\Http\Controllers\AdminController@resetPassword')->name('resetPassword');
});

Route::group(['middleware' => ['auth', 'user']], function () {
    route::get('/my-account', 'App\Http\Controllers\WebsiteController@myAccount')->name('my-account');
    route::post('/updateUserInformation', 'App\Http\Controllers\WebsiteController@updateUserInformation')->name('updateUserInformation');
    route::post('/updateUserPassword', 'App\Http\Controllers\WebsiteController@updateUserPassword')->name('updateUserPassword');

    //Wishlist
    route::get('/my-wishlist', 'App\Http\Controllers\WebsiteController@myWishlist')->name('my-wishlist');
    route::get('/add-to-wishlist/{id}', 'App\Http\Controllers\WebsiteController@addToWishlist')->name('add-to-wishlist');
    route::get('/delete-wishlist-item/{id}', 'App\Http\Controllers\WebsiteController@deleteWishlistItem')->name('delete-wishlist-item');

    //Cart
    route::get('/my-cart', 'App\Http\Controllers\WebsiteController@myCart')->name('my-cart');
    route::get('/add-to-cart/{id}', 'App\Http\Controllers\WebsiteController@addToCart')->name('add-to-cart');
    route::get('/delete-cart-item/{id}', 'App\Http\Controllers\WebsiteController@deleteCartItem')->name('delete-cart-item');
    route::get('/add-to-cart-from-wishlist/{id}', 'App\Http\Controllers\WebsiteController@addToCartFromWishlist')->name('add-to-cart-from-wishlist');

    //Checkout
    route::get('/my-checkout', 'App\Http\Controllers\WebsiteController@myCheckout')->name('my-checkout');

    //Order-Complete
    route::get('/order-complete', 'App\Http\Controllers\WebsiteController@orderComplete')->name('order-complete');

    //Logout
    route::get('/user-logout', 'App\Http\Controllers\WebsiteController@logout')->name('userLogout');
});

Route::group(['middleware' => ['auth', 'admin']], function () {
    route::get('/dashboard', 'App\Http\Controllers\AdminController@index')->name('dashboard');

    //Admin Profile
    route::get('/adminProfile', 'App\Http\Controllers\AdminController@adminProfile')->name('adminProfile');
    route::post('/updateAdminProfile', 'App\Http\Controllers\AdminController@updateAdminProfile')->name('updateAdminProfile');
    route::post('/changeAdminImage', 'App\Http\Controllers\AdminController@changeAdminImage')->name('changeAdminImage');

    //Admin Password
    route::get('/adminProfile/enterPassword', 'App\Http\Controllers\AdminController@enterPassword')->name('adminProfile.enterPassword');
    route::post('/checkPassword', 'App\Http\Controllers\AdminController@checkPassword')->name('checkPassword');
    route::get('/adminProfile/enterOTP', 'App\Http\Controllers\AdminController@enterOTP')->name('adminProfile.enterOTP')->middleware('signed');
    route::post('/checkOTP', 'App\Http\Controllers\AdminController@checkOTP')->name('checkOTP');
    route::get('/adminProfile/changePassword', 'App\Http\Controllers\AdminController@changePassword')->name('adminProfile.changePassword')->middleware('signed');
    route::post('/updatePassword', 'App\Http\Controllers\AdminController@updatePassword')->name('updatePassword');
    route::get('/adminProfile/resendOTP', 'App\Http\Controllers\AdminController@resendOTP')->name('resendOTP');

    //Super Admin
    route::get('/superAdmin', 'App\Http\Controllers\AdminController@superAdmin')->name('superAdmin');
    route::get('/superAdmin/addAdmin', 'App\Http\Controllers\AdminController@addAdmin')->name('superAdmin.addAdmin');
    route::post('/storeAdmin', 'App\Http\Controllers\AdminController@storeAdmin')->name('storeAdmin');
    route::get('/superAdmin/editAdmin/{id}', 'App\Http\Controllers\AdminController@editAdmin')->name('superAdmin.editAdmin');
    route::post('/updateAdmin/{id}', 'App\Http\Controllers\AdminController@updateAdmin')->name('updateAdmin');
    route::get('/superAdmin/deleteAdmin/{id}', 'App\Http\Controllers\AdminController@deleteAdmin')->name('deleteAdmin');

    //About Us
    route::get('/aboutUs', 'App\Http\Controllers\AboutUsController@index')->name('aboutUs');
    route::post('/storeAboutUs', 'App\Http\Controllers\AboutUsController@storeAboutUs')->name('storeAboutUs');
    route::post('/updateAboutUs', 'App\Http\Controllers\AboutUsController@updateAboutUs')->name('updateAboutUs');
    route::post('/aboutUsGallery', 'App\Http\Controllers\AboutUsController@aboutUsGallery')->name('aboutUsGallery');
    route::post('/updateImageName/{id}', 'App\Http\Controllers\AboutUsController@updateImageName')->name('updateImageName');
    route::get('/aboutUs/deleteAboutUsGallery/{id}', 'App\Http\Controllers\AboutUsController@deleteImage')->name('deleteAboutUsGallery');
    route::get('/aboutUsImageStatus', 'App\Http\Controllers\AboutUsController@aboutUsImageStatus')->name('aboutUsImageStatus');

    //Our Team
    route::get('/team', 'App\Http\Controllers\TeamController@index')->name('team');
    route::get('/team/addMember', 'App\Http\Controllers\TeamController@create')->name('team.addMember');
    route::post('/storeMember', 'App\Http\Controllers\TeamController@store')->name('storeMember');
    route::get('/team/editMember/{id}', 'App\Http\Controllers\TeamController@edit')->name('team.editMember');
    route::post('/updateMember/{id}', 'App\Http\Controllers\TeamController@update')->name('updateMember');
    route::get('/team/deleteMember/{id}', 'App\Http\Controllers\TeamController@destroy')->name('deleteMember');
    route::get('/memberStatus', 'App\Http\Controllers\TeamController@memberStatus')->name('memberStatus');

    //Our Partners
    route::get('/partners', 'App\Http\Controllers\PartnerController@index')->name('partners');
    route::get('/partners/addPartner', 'App\Http\Controllers\PartnerController@create')->name('partners.addPartner');
    route::post('/storePartner', 'App\Http\Controllers\PartnerController@store')->name('storePartner');
    route::get('/partners/editPartner/{id}', 'App\Http\Controllers\PartnerController@edit')->name('partners.editPartner');
    route::post('/updatePartner/{id}', 'App\Http\Controllers\PartnerController@update')->name('updatePartner');
    route::get('/partners/deletePartner/{id}', 'App\Http\Controllers\PartnerController@destroy')->name('deletePartner');
    route::get('/partnerStatus', 'App\Http\Controllers\PartnerController@partnerStatus')->name('partnerStatus');

    //Products
    route::get('/products', 'App\Http\Controllers\ProductController@index')->name('products');
    route::get('/products/addProduct', 'App\Http\Controllers\ProductController@create')->name('products.addProduct');
    route::post('/storeProduct', 'App\Http\Controllers\ProductController@store')->name('storeProduct');
    route::get('/products/editProduct/{id}', 'App\Http\Controllers\ProductController@edit')->name('products.editProduct');
    route::post('/updateProduct/{id}', 'App\Http\Controllers\ProductController@update')->name('updateProduct');
    route::get('/products/deleteProduct/{id}', 'App\Http\Controllers\ProductController@destroy')->name('deleteProduct');
    route::get('/sortProduct', 'App\Http\Controllers\ProductController@sortProduct')->name('sortProduct');
    route::post('/updateProductsOrder', 'App\Http\Controllers\ProductController@updateProductsOrder')->name('updateProductsOrder');
    route::get('/productStatus', 'App\Http\Controllers\ProductController@productStatus')->name('productStatus');
    route::get('/products/productGallery/{id}', 'App\Http\Controllers\ProductController@productGallery')->name('products.productGallery');
    route::get('/products/deleteProductGallery/{id}', 'App\Http\Controllers\ProductController@deleteProductGallery')->name('deleteProductGallery');
    route::get('/productGalleryImageStatus', 'App\Http\Controllers\ProductController@productGalleryImageStatus')->name('productGalleryImageStatus');

    //Notifications --> Contact
    route::get('/contacts', 'App\Http\Controllers\ContactController@notification')->name('contacts');
    route::get('/contacts/viewContactMessage/{id}', 'App\Http\Controllers\ContactController@viewContactMessage')->name('contacts.viewContactMessage');
    route::get('/contactMessageJobDone', 'App\Http\Controllers\ContactController@contactMessageJobDone')->name('contactMessageJobDone');
    route::get('/deleteContactMessage/{id}', 'App\Http\Controllers\ContactController@deleteContactMessage')->name('deleteContactMessage');

    //Notifications --> Subscriber
    route::get('/deleteSubscriber/{id}', 'App\Http\Controllers\ContactController@deleteSubscriber')->name('deleteSubscriber');
    route::get('/contacts/createSubscriberContent', 'App\Http\Controllers\ContactController@createSubscriberContent')->name('contacts.createSubscriberContent');
    route::post('/subscriberContent', 'App\Http\Controllers\ContactController@subscriberContent')->name('subscriberContent');
    route::get('/contacts/previousSubscriberContents', 'App\Http\Controllers\ContactController@previousSubscriberContents')->name('contacts.previousSubscriberContents');
    route::get('/contacts/previousSubscriberContents/contentDetail/{id}', 'App\Http\Controllers\ContactController@previousContentDetail')->name('contacts.previousContentDetail');
    route::get('/resendPreviousContent/{id}', 'App\Http\Controllers\ContactController@resendPreviousContent')->name('resendPreviousContent');
    route::get('/contacts/deleteSubscriberContent/{id}', 'App\Http\Controllers\ContactController@deleteSubscriberContent')->name('deleteSubscriberContent');

    //Website Settings
    route::get('/settings', 'App\Http\Controllers\SettingController@index')->name('settings');
    route::get('/settings/companySetting', 'App\Http\Controllers\SettingController@companySetting')->name('settings.companySetting');
    route::post('/storeCompanySetting', 'App\Http\Controllers\SettingController@storeCompanySetting')->name('storeCompanySetting');
    route::post('/updateCompanySetting', 'App\Http\Controllers\SettingController@updateCompanySetting')->name('updateCompanySetting');
    route::get('/settings/companyInformation', 'App\Http\Controllers\SettingController@companyInformation')->name('settings.companyInformation');
    route::post('/updateCompanyInformation', 'App\Http\Controllers\SettingController@updateCompanyInformation')->name('updateCompanyInformation');
    route::get('/settings/companySocialMedia', 'App\Http\Controllers\SettingController@companySocialMedia')->name('settings.companySocialMedia');
    route::post('/updateCompanySocialMedia', 'App\Http\Controllers\SettingController@updateCompanySocialMedia')->name('updateCompanySocialMedia');
    route::get('/settings/companyImages', 'App\Http\Controllers\SettingController@companyImages')->name('settings.companyImages');
    route::post('/updateCompanyImages', 'App\Http\Controllers\SettingController@updateCompanyImages')->name('updateCompanyImages');
    route::post('/updateFirstBanner', 'App\Http\Controllers\SettingController@updateFirstBanner')->name('updateFirstBanner');
    route::post('/updateSecondBanner', 'App\Http\Controllers\SettingController@updateSecondBanner')->name('updateSecondBanner');

    route::get('/logout', 'App\Http\Controllers\AdminController@logout')->name('logout');
});
