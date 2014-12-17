<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/* ACL filters */
Route::filter('acl.permitted', 'AclPermittedFilter');


// Login and Logout
Route::get('/login', array('as'=>'login', 'uses'=>'MainController@login'));
Route::post('/login', array('as'=>'login', 'uses'=>'MainController@postLogin'));


/* Check if the user is looged in */
Route::group(array('before'=>['user', 'acl.permitted']), function()
{
	Route::group(array('prefix'=>'admin'), function()
	{
		// Add User
		Route::get('/adduser', array('as'=>'adminadduser', 'uses'=>'AdminController@addUser'));
		Route::post('/adduser', array('as'=>'adminadduser', 'uses'=>'AdminController@postAddUser'));
		Route::get('/manageusers', array('as'=>'adminmanageusers', 'uses'=>'AdminController@manageUsers'));
		//Route::post('/manageusers', array('as'=>'adminmanageusers', 'uses'=>'AdminController@postmanageUsers'));		

		// ACL
		Route::get('/addaclgroup', array('as'=>'adminaddaclgroup', 'uses'=>'AdminController@addgroup'));
		Route::post('/addaclgroup', array('as'=>'adminaddaclgroup', 'uses'=>'AdminController@postAddgroup'));

		// Manage Departments
		Route::get('/adddept', array('as'=>'adminadddept', 'uses'=>'AdminController@adddept'));
		Route::post('/adddept', array('as'=>'adminadddept', 'uses'=>'AdminController@postAdddept'));
		Route::get('/deletedpt/{id}', array('as' => 'deleteDepartment', 'uses' => 'AdminController@deleteDepartment'));

		// Holiday Administrator tasks
		Route::get('/holaddtype', array('as'=>'holadminaddtype', 'uses'=>'HolidayController@addLeaveType'));
		Route::post('/holaddtype', array('as'=>'holadminaddtype', 'uses'=>'HolidayController@postAddLeaveType'));
		Route::get('/holddeletetype/{id}', array('as' => 'deleteLeaveType', 'uses' => 'HolidayController@deleteLeaveType'));
		Route::get('/holaddstatus', array('as'=>'holadminaddstatus', 'uses'=>'HolidayController@addLeaveStatus'));
		Route::post('/holaddstatus', array('as'=>'holadminaddstatus', 'uses'=>'HolidayController@postAddLeaveStatus'));
		Route::get('/holdeletestatus/{id}', array('as' => 'deleteLeaveStatus', 'uses' => 'HolidayController@deleteLeaveStatus'));
		Route::get('/holaddannhol', array('as'=>'holadminaddannholi',  'uses'=>'HolidayController@addAnnualHoliday'));
		Route::post('/holaddannhol', array('as'=>'holadminaddannholi', 'uses'=>'HolidayController@postAddAnnualHoliday'));

	});

	// Book Holiday
	Route::get('/holiday', array('as'=>'holindex', 'uses'=>'HolidayController@index'));
	Route::get('/holiday/book', array('as'=>'holbook', 'uses'=>'HolidayController@book'));
	Route::post('/holiday/book', array('as'=>'holbook', 'uses'=>'HolidayController@postBook'));

	Route::post('/updateuser', array('as'=>'adminupdateuser', 'uses'=>'AdminController@postUpdateuser'));

});

Route::group(array('before'=>'user'), function()
{
	// Logout
	Route::get('/logout', array('as'=>'logout', 'uses'=>'MainController@logout'));
});

// User Access denied
Route::get('/userdenied', array('as'=>'userdenied', 'uses'=>'AdminController@userDenied'));








// Main Menu
Route::get('/', array('as'=>'index', 'uses'=>'SbadminContorller@index'));
Route::get('/blank', array('as'=>'blank', 'uses'=>'SbadminContorller@blank'));
Route::get('/buttons', array('as'=>'buttons', 'uses'=>'SbadminContorller@buttons'));
Route::get('/flot', array('as'=>'flot', 'uses'=>'SbadminContorller@flot'));
Route::get('/forms', array('as'=>'forms', 'uses'=>'SbadminContorller@forms'));
Route::get('/grid', array('as'=>'grid', 'uses'=>'SbadminContorller@grid'));

Route::get('/morris', array('as'=>'morris', 'uses'=>'SbadminContorller@morris'));
Route::get('/notifications', array('as'=>'notifications', 'uses'=>'SbadminContorller@notifications'));
Route::get('/panels-wells', array('as'=>'panelswells', 'uses'=>'SbadminContorller@panelswells'));
Route::get('/tables', array('as'=>'tables', 'uses'=>'SbadminContorller@tables'));
Route::get('/typography', array('as'=>'typography', 'uses'=>'SbadminContorller@typography'));


