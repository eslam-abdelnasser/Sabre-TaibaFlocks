<?php

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

// Route::get('routes', function() {

//     // get a collection of routes  
//         $routeCollection = Route::getRoutes();

//         foreach ($routeCollection as $key=>$value) {
//                 echo "<pre>";
//                 echo $value->getName()  ; 
//         }
 
// });


Route::group(['prefix'=>'admin' , 'middleware'=>'auth:admin'],function(){
    Route::get('/','Admin\DashboardController@index')->name('admin.dashboard');
});


Route::group(['prefix' => 'admin'], function () {
    Route::get('/login','Admin\Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('login','Admin\Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::resource('/admin-users', 'Admin\AdminUsersController');

    /**                         
     * Roles and permission part  
     */

    Route::get('roles/{id}/permissions' , 'Admin\RoleController@showPermissions')->name('role.permissions');
    Route::get('roles/{id}/permissions/add' , 'Admin\RoleController@addPermissions')->name('role.permission.add');
    Route::post('roles/{id}/permissions' , 'Admin\RoleController@storePermissions');
    Route::get('roles/{role}/permissions/{permission}/edit' , 'Admin\RoleController@editPermission')->name('role.permission.edit');;
    Route::put('roles/{role}/permissions/{permission}' , 'Admin\RoleController@updatePermission');
    Route::resource('roles' , 'Admin\RoleController');
    Route::resource('permissions' , 'Admin\PermissionsController');
    Route::get('/bank-transfer' , 'Admin\BankTransferController@index')->name('bank-transfer');
    Route::post('/bank-transfer/{id}/bank' , 'Admin\BankTransferController@BankStatus')->name('bank-transfer.post');
    Route::get('/bank-transfer/paid' , 'Admin\BankTransferController@paid')->name('bank-transfer.paid');
    // Route::resource('/users-roles', 'Admin\RolesController');
    // Route::resource('/users-permissions', 'Admin\PermissionsController');
    Route::resource('/languages', 'Admin\LanguagesController');
    Route::resource('/offers', 'Admin\OffersController');
    Route::resource('/categories', 'Admin\CategoryController');
    Route::resource('/packages' , 'Admin\PackageController');
    Route::get('reviews/{id}' , 'Admin\PackageController@showReviews')->name('show.reviews');
    Route::get('reviews-edit/{id}' , 'Admin\PackageController@editReview')->name('edit.review');
    Route::put('reviews-update/{id}' , 'Admin\PackageController@updateReview')->name('update.review');
    Route::resource('/features' , 'Admin\FeatureController');

    Route::resource('/payfort' , 'Admin\TransactionController');

    Route::resource('/options' , 'Admin\OptionController');
    Route::resource('/traveller', 'Admin\TravellerController');
    Route::resource('/blog', 'Admin\BlogController');
    Route::post('/images/{id}','Admin\PackageGalleryController@addImages')->name('post.package.images');
    Route::get('/images/{id}/create' , 'Admin\PackageGalleryController@create')->name('create.package.images');
    Route::get('/images/{id}' , 'Admin\PackageGalleryController@index')->name('package.images');
    Route::delete('/image/{id}/package' , 'Admin\PackageGalleryController@delete')->name('delete.package.images');

    Route::get('users/{id}/group' , 'Admin\UsersController@getGroups')->name('list.groups'); 
    Route::post('users/{id}/group' , 'Admin\UsersController@postGroup')->name('attach.group'); 
    Route::resource('users' , 'Admin\UsersController'); 
 
    Route::get('groups/{id}/users' , 'Admin\GroupsController@groupUsers')->name('list.group.users'); 
    Route::resource('groups' , 'Admin\GroupsController'); 
    Route::resource('tickets' , 'Admin\TicketController');
    Route::post('/ticket-store','Admin\TicketController@storeTicketDetails')->name('ticket.post');
    Route::resource('slider' , 'Admin\SliderController');
    Route::resource('careers' , 'Admin\CareerController');

    Route::get('/about' , 'Admin\AboutUsController@getAboutUs')->name('admin.about.index');
    Route::put('/about/{id}/update' , 'Admin\AboutUsController@updateAboutUs')->name('admin.about.update');
    // Route::get('groups/{id}/users' , 'Admin\GroupsController@groupUsers'); 
    // Route::resource('groups' , 'Admin\GroupsController');

    // social media routes : 
    Route::resource('social','Admin\SocialMediaController'); 

    // general setting routes : 
    Route::get('/general-setting' , 'Admin\GeneralSettingController@index')->name('admin.general.setting'); 
    Route::put('/general-setting/{id}/update' , 'Admin\GeneralSettingController@update')->name('admin.general.setting.update'); 


    // advertisments : 
    Route::get('/advertisment' , 'Admin\AdvertismentController@index')->name('advertisment.index'); 
    Route::get('/advertisment/create' , 'Admin\AdvertismentController@create'); 
    Route::post('/advertisment/store' , 'Admin\AdvertismentController@store'); 
    Route::get('/advertisment/{id}/edit' , 'Admin\AdvertismentController@edit')->name('advertisment.edit'); 
    Route::put('/advertisment/update/{advertisment}' , 'Admin\AdvertismentController@update');


    // gallery and gallery images 
    Route::get('/media' , 'Admin\MediaController@index')->name('admin.media'); 
    Route::get('/media/gallery/create' , 'Admin\MediaController@galleryCreate')->name('admin.gallery.create'); 
    Route::post('/media/gallery' , 'Admin\MediaController@galleryPost')->name('admin.gallery.post');
    Route::get('/media/gallery/{id}/edit','Admin\MediaController@editGallery' )->name('admin.gallery.edit'); 
    Route::put('/media/gallery/{id}/update','Admin\MediaController@updateGallery' )->name('admin.gallery.update'); 
    Route::get('/media/gallery/{id}/attach' , 'Admin\MediaController@getAttach')->name('admin.gallery.attach'); 
    
    Route::post('/media/images' , 'Admin\MediaController@attachImages')->name('admin.gallery.attach_images'); 
    Route::get('/media/gallery/{id}/images' , 'Admin\MediaController@getGalleryImages')->name('admin.gallery.show_images'); 
    Route::delete('/media/gallery/image/{id}' , 'Admin\MediaController@destroyImage')->name('admin.gallery_image.destroy'); 
  

 

});




Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware'=>['localizationRedirect' , 'localeSessionRedirect ,auth:user']] , function (){

});
Route::group(['prefix' => LaravelLocalization::setLocale(),  'middleware'=>['localizationRedirect' , 'localeSessionRedirect']], function()
{

    Auth::routes();
    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
    Route::get('/home', 'HomeController@index');
    Route::get('/filter', 'HomeController@filterData')->name('filter-packages');
    Route::get('/about-us', 'GeneralController@aboutUs')->name('about-us');
    Route::get('/blog', 'BlogController@index')->name('blog');
    Route::get('/blog-details/{slug}', 'BlogController@details')->name('blog-details');
    Route::get('/traveller-experience', 'TravellerController@index')->name('traveller-experience');
    Route::get('/traveller-details/{slug}', 'TravellerController@details')->name('traveller-details');
    Route::get('/career', 'CareerController@index')->name('career');
    Route::get('/contact-us', 'GeneralController@contactUs')->name('contact-us');
    Route::get('/career-details/{slug}', 'CareerController@details')->name('career-details');
    Route::get('/profile','ProfileController@profile')->name('get_profile'); 
    Route::post('/profile','ProfileController@postProfile')->name('post_profile');
    Route::post('/ticket','ProfileController@postTicket')->name('post_ticket');
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/trips/{slug}', 'listPackagesController@index')->name('category-trips');
    Route::get('/Package/{slug}', 'DetailsController@package')->name('package');
    Route::get('/book-now/{slug}','BookNowController@index')->name('book-now.user');
    Route::get('/book-now-guest/{slug}','BookNowController@guest')->name('book-now.guest');
//    Route::get('/payfort', 'BookingController@payfort')->name('payfort');
    Route::get('/payfort-results', 'BookingController@savePaymentResults')->name('payfort-results');
    Route::get('/payfort-feedback', 'BookingController@payfortFeedback')->name('payfort-feedback');
    Route::get('/saber-flights', 'SaberFlightsController@index')->name('saber-flights');
    Route::get('/flights-availability', 'Flights\SearchController@index')->name('saber-integration');
    Route::get('test',function(){
        return View::make('test');
    });
    Route::post('/comment', 'BlogController@comment')->name('comment.post');
    Route::post('/review' ,'GeneralController@review')->name('review.post');
    Route::post('booking' , 'BookingController@index')->name('booking.post');
    Route::post('question' , 'GeneralController@questions')->name('question.post');
});



//Route::get('/admin', 'AdminController@index');