<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'Sites\HomeController@index');

Route::get('/about', 'Sites\HomeController@about');

Route::get('/articles', 'Sites\ArticlesController@index');

Route::get('/articles/{id}', 'Sites\ArticlesController@show');

Route::get('/articles/create', 'Sites\ArticlesController@create');



// Route::get('/admina/login', 'Admina\EntryController@login');

// Route::post('/admina/auth', 'Admina\EntryController@auth');
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

// Route::group(['middleware' => ['web']], function () {
//     //
// });


/*-- ----------------------------
  ---- 后台管理
  -- ----------------------------*/


Route::group(['prefix' => 'admina', 'namespace' => 'Auth'], function()
{
	Route::get('logout', 'AuthController@getLogout');
	Route::post('logout', 'AuthController@getLogout');
});

Route::group(['middleware' => 'admin'], function () {
	Route::get('dashboard', function () {
		return view('dashboard');
	});
});


Route::group(['prefix' => 'admina', 'namespace' => 'Admina', 'middleware' => 'admin'], function()
{
	Route::get('index', 'AdminController@index');
	//用户
	Route::get('login', 'AuthController@getAdminLogin');
	Route::post('login', 'AuthController@postAdminLogin');
	Route::get('register', 'AuthController@getAdminRegister');
	Route::post('register', 'AuthController@postAdminRegister');
});


/*
 * operation 模块
 * */
Route::group(['prefix' => 'admina/operation', 'namespace' => 'Admina', 'middleware' => 'admin'], function()
{

	//侧边栏 start
	Route::get('sider', 'SiderController@getList');
	Route::get('elememtSider/{pid}', 'SiderController@getElememtList');

	Route::get('createElememtSider/{pid}', 'SiderController@createElememtSider');
	Route::get('updateElememtSider/{id}', 'SiderController@updateElememtSider');

	Route::post('postElememtSider/{siderType}', 'SiderController@postElememtDetail');

	Route::get('detailElememtSider', 'SiderController@getElememtDetail');

	Route::get('editElememtSider', 'SiderController@postElememtList');
	//侧边栏 end
});

/*
 * operation 模块
 * */
Route::group(['prefix' => 'admina/about', 'namespace' => 'Admina', 'middleware' => 'admin'], function()
{
	//关于大家银 start
	Route::get('aboutMe', 'AboutController@getAboutMe');
	Route::get('updateAboutMe', 'AboutController@postAboutMe');

	//财经日历
	Route::get('calender', 'CalenderController@getList');

	//关于大家银 end
});

// Route::group(['prefix' => 'admina','namespace' => 'Admina','middleware' => 'auth'],function()
// {
// 	//Markdown上传图片
// 	// Route::post('/uploadImage','UploadController@uploadImage');

// 	// Route::get('/','AdminController@index');
// 	Route::get('/login', 'EntryController@login');
// 	// Route::post('/auth', 'EntryController@auth');

// 	// Route::get('article/recycle', 'ArticleController@recycle');
// 	// Route::get('article/destroy/{id}/','ArticleController@destroy');
// 	// Route::get('article/restore/{id}', 'ArticleController@restore');
// 	// Route::get('article/delete/{id}', 'ArticleController@delete');
// 	// Route::resource('article','ArticleController');

// 	// Route::get('category/destroy/{id}/','CategoryController@destroy');
// 	// Route::resource('category','CategoryController');

// 	// Route::get('tags/destroy/{id}/','TagController@destroy');
// 	// Route::resource('tags','TagController');


// });