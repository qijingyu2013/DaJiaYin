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
/*-- ----------------------------
  ---- 前端
  -- ----------------------------*/
/**
 * about 关于大家银 模块
 */
Route::group(['prefix' => 'about', 'namespace' => 'Sites'], function () {
	Route::get('/',
			['as' => 'aboutMe',
					'uses' => 'AboutController@showAboutMe']
	);
	Route::get('aboutMe',
			['as' => 'aboutMe',
					'uses' => 'AboutController@showAboutMe']
	);

	Route::get('superiority',
			['as' => 'Superiority',
					'uses' => 'AboutController@showSuperiority']
	);
});


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


/**
 * operation 模块
 */
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

/**
 * about 关于大家银 模块
 */
Route::group(['prefix' => 'admina/about', 'namespace' => 'Admina', 'middleware' => 'admin'], function()
{
	//关于大家银
	Route::get('aboutMe', 'AboutController@getAboutMe');
	Route::post('updateAboutMe', 'AboutController@postAboutMe');

	//大家银优势
	Route::get('superiority', 'AboutController@getSuperiority');
	Route::post('updateSuperiority', 'AboutController@postSuperiority');

	//最新公告
	Route::get('notice', 'AboutController@getNoticeList');
	Route::get('createNotice', 'AboutController@createNotice');
	Route::get('getNotice/{id}', 'AboutController@getNotice');
	Route::post('postNotice/{siderType}', 'AboutController@postNotice');
	Route::get('dropNotice/{id}', 'AboutController@dropNotice');

	//财经日历
	Route::get('calender', 'CalenderController@getList');

});