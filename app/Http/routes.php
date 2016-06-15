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
Route::get('/home', 'Sites\HomeController@index');
Route::get('/Home', 'Sites\HomeController@index');
Route::get('/index', 'Sites\HomeController@index');

Route::get('/activeData', 'Sites\HomeController@getActiveDataToJson');

Route::get('/about', 'Sites\HomeController@about');

Route::get('/articles', 'Sites\ArticlesController@index');

Route::get('/articles/{id}', 'Sites\ArticlesController@show');

Route::get('/articles/create', 'Sites\ArticlesController@create');



// Route::get('/admina/login', 'Admina\EntryController@login');

// Route::post('/admina/auth', 'Admina\EntryController@auth');
/*
|--------------------------------------------------------------------------
| DaJiaYinlication Routes
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
	Route::get('notice',
			['as' => 'notice',
					'uses' => 'AboutController@showNotice']
	);

	Route::get('notice/{id}', 'AboutController@showNoticeDetail');

	Route::get('award', 'AboutController@showAward');
	Route::get('award/{id}', 'AboutController@showAwardDetail');

	Route::get('media', 'AboutController@showMedia');
	Route::get('media/{id}', 'AboutController@showMediaDetail');

	Route::get('team', 'AboutController@showTeam');
//	Route::get('team/{id}', 'AboutController@showTeamDetail');

	Route::get('contact', 'AboutController@showContact');

	Route::get('active', 'AboutController@showActive');
	Route::get('active/{id}', 'AboutController@showActiveDetail');

});

/**
 * product 产品中心 模块
 */
Route::group(['prefix' => 'product', 'namespace' => 'Sites'], function () {
	Route::get('jme', 'ProductController@showJmeliqing');
	Route::get('jmeliqing', 'ProductController@showJmeliqing');
	Route::get('jmepuer', 'ProductController@showJmepuer');
	Route::get('jmeyin', 'ProductController@showJmeyin');

	Route::get('xssp', 'ProductController@showXsspehaving');
	Route::get('xsspehaving', 'ProductController@showXsspehaving');
	Route::get('xsspbulk', 'ProductController@showXsspbulk');
	Route::get('hnxsscp', 'ProductController@showHnxsscp');

	Route::get('jsgy', 'ProductController@showJsgyCloud');
	Route::get('jsgyCloud', 'ProductController@showJsgyCloud');
});

/**
 * asterisk 市场动态 模块
 */
Route::group(['prefix' => 'asterisk', 'namespace' => 'Sites'], function () {
	//大家银日刊
	Route::get('journal', 'AsteriskController@showJournal');
	//每日点评
	Route::get('daycomments', 'AsteriskController@showDaycomments');
	Route::get('daycomment/{id}', 'AsteriskController@showDaycommentDetail');
	//市场资讯
	Route::get('marketinformation', 'AsteriskController@showMarketinformation');
	Route::get('marketinformation/{id}', 'AsteriskController@showMarketinformationDetail');


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


Route::group(['prefix' => 'admina', 'namespace' => 'Admina'], function ()
{

	//用户
	Route::get('login', 'AuthController@getAdminLogin');
	Route::post('login', 'AuthController@postAdminLogin');
	Route::get('register', 'AuthController@getAdminRegister');
	Route::post('register', 'AuthController@postAdminRegister');
});

Route::group(['prefix' => 'admina', 'namespace' => 'Admina', 'middleware' => 'admin'], function () {
	Route::get('/', 'AdminController@index');
	Route::get('index', 'AdminController@index');
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

	//奖项
	Route::get('award', 'AboutController@getAwardList');
	Route::get('createAward', 'AboutController@createAward');
	Route::get('getAward/{id}', 'AboutController@getAward');
	Route::post('postAward/{siderType}', 'AboutController@postAward');
	Route::get('dropAward/{id}', 'AboutController@dropAward');

	//最新媒体报道
	Route::get('media', 'AboutController@getMediaList');
	Route::get('createMedia', 'AboutController@createMedia');
	Route::get('getMedia/{id}', 'AboutController@getMedia');
	Route::post('postMedia/{siderType}', 'AboutController@postMedia');
	Route::get('dropMedia/{id}', 'AboutController@dropMedia');

	//研发团队
	Route::get('team', 'AboutController@getTeamList');
	Route::get('createTeam', 'AboutController@createTeam');
	Route::get('getTeam/{id}', 'AboutController@getTeam');
	Route::post('postTeam/{siderType}', 'AboutController@postTeam');
	Route::get('dropTeam/{id}', 'AboutController@dropTeam');

	//联系我们
	Route::get('contact', 'AboutController@getContact');
	Route::post('updateContact', 'AboutController@postContact');

	//财经日历
	Route::get('calender', 'CalenderController@getList');

	//奖项
	Route::get('active', 'AboutController@getActiveList');
	Route::get('createActive', 'AboutController@createActive');
	Route::get('getActive/{id}', 'AboutController@getActive');
	Route::post('postActive/{siderType}', 'AboutController@postActive');
	Route::get('dropActive/{id}', 'AboutController@dropActive');

});


/**
 * about 关于大家银 模块
 */
Route::group(['prefix' => 'admina/product', 'namespace' => 'Admina', 'middleware' => 'admin'], function () {
	//大圆沥青
	Route::get('jmeliqing', 'ProductController@getJmeliqing');
	Route::post('updateJmeliqing', 'ProductController@postJmeliqing');

	//大圆普洱
	Route::get('jmepuer', 'ProductController@getJmepuer');
	Route::post('updateJmepuer', 'ProductController@postJmepuer');

	//大圆普洱
	Route::get('jmeyin', 'ProductController@getJmeyin');
	Route::post('updateJmeyin', 'ProductController@postJmeyin');

	//湘商E得网
	Route::get('xsspehaving', 'ProductController@getXsspehaving');
	Route::post('updateXsspehaving', 'ProductController@postXsspehaving');

	//湘商大宗
	Route::get('xsspbulk', 'ProductController@getXsspbulk');
	Route::post('updateXsspbulk', 'ProductController@postXsspbulk');

	//湘商收藏品
	Route::get('hnxsscp', 'ProductController@getHnxsscp');
	Route::post('updateHnxsscp', 'ProductController@postHnxsscp');

	//金山云微盘
	Route::get('jsgyCloud', 'ProductController@getJsgyCloud');
	Route::post('updateJsgyCloud', 'ProductController@postJsgyCloud');


});
/**
 * product 产品中心 模块
 */
Route::group(['prefix' => 'admina/product', 'namespace' => 'Admina', 'middleware' => 'admin'], function () {
	Route::get('jme', 'ProductController@getJmeliqing');

	Route::get('xssp', 'ProductController@getXsspehaving');

	Route::get('jsgy', 'ProductController@getJsgy');

});

/**
 * asterisk Asterisk 模块
 */
Route::group(['prefix' => 'admina/asterisk', 'namespace' => 'Admina', 'middleware' => 'admin'], function () {
	//财经日历
	http://www.djy.dev/admina/asterisk/economiccalendar
	Route::get('economiccalendar', 'AsteriskController@getAboutMe');
	Route::post('updateAboutMe', 'AsteriskController@postAboutMe');

	//大家银日刊
//	http://www.djy.dev/admina/asterisk/journal
	Route::get('journal', 'AsteriskController@getJournalList');
	Route::get('createJournal', 'AsteriskController@createJournal');
	Route::get('getJournal/{id}', 'AsteriskController@getJournal');
	Route::post('postJournal/{siderType}', 'AsteriskController@postJournal');
	Route::get('dropJournal/{id}', 'AsteriskController@dropJournal');

	//当日点评
	Route::get('daycomments', 'AsteriskController@getDaycommentsList');
	Route::get('createDaycomment', 'AsteriskController@createDaycomment');
	Route::get('getDaycomment/{id}', 'AsteriskController@getDaycomment');
	Route::post('postDaycomment/{siderType}', 'AsteriskController@postDaycomment');
	Route::get('dropDaycomment/{id}', 'AsteriskController@dropDaycomment');


	//市场最新资讯
	Route::get('marketinformation', 'AsteriskController@getMarketinformationsList');
	Route::get('createMarketinformation', 'AsteriskController@createMarketinformation');
	Route::get('getMarketinformation/{id}', 'AsteriskController@getMarketinformation');
	Route::post('postMarketinformation/{siderType}', 'AsteriskController@postMarketinformation');
	Route::get('dropMarketinformation/{id}', 'AsteriskController@dropMarketinformation');

//	//最新公告
//	Route::get('notice', 'AboutController@getNoticeList');
//	Route::get('createNotice', 'AboutController@createNotice');
//	Route::get('getNotice/{id}', 'AboutController@getNotice');
//	Route::post('postNotice/{siderType}', 'AboutController@postNotice');
//	Route::get('dropNotice/{id}', 'AboutController@dropNotice');
//
//	//奖项
//	Route::get('award', 'AboutController@getAwardList');
//	Route::get('createAward', 'AboutController@createAward');
//	Route::get('getAward/{id}', 'AboutController@getAward');
//	Route::post('postAward/{siderType}', 'AboutController@postAward');
//	Route::get('dropAward/{id}', 'AboutController@dropAward');
//
//	//最新媒体报道
//	Route::get('media', 'AboutController@getMediaList');
//	Route::get('createMedia', 'AboutController@createMedia');
//	Route::get('getMedia/{id}', 'AboutController@getMedia');
//	Route::post('postMedia/{siderType}', 'AboutController@postMedia');
//	Route::get('dropMedia/{id}', 'AboutController@dropMedia');
//
//	//研发团队
//	Route::get('team', 'AboutController@getTeamList');
//	Route::get('createTeam', 'AboutController@createTeam');
//	Route::get('getTeam/{id}', 'AboutController@getTeam');
//	Route::post('postTeam/{siderType}', 'AboutController@postTeam');
//	Route::get('dropTeam/{id}', 'AboutController@dropTeam');
//
//	//联系我们
//	Route::get('contact', 'AboutController@getContact');
//	Route::post('updateContact', 'AboutController@postContact');
//
//	//财经日历
//	Route::get('calender', 'CalenderController@getList');

});