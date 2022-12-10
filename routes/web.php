<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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



	Route::get('', 'IndexController@index')->name('index');
	Route::get('index/login', 'IndexController@login')->name('login');
	
	Route::post('auth/login', 'AuthController@login')->name('auth.login');
	Route::any('auth/logout', 'AuthController@logout')->name('logout')->middleware(['auth']);


	
	Route::get('auth/register', 'AuthController@register')->name('auth.register');
	Route::post('auth/register_store', 'AuthController@register_store')->name('auth.register_store');
		
	Route::post('auth/login', 'AuthController@login')->name('auth.login');
	Route::get('auth/password/forgotpassword', 'AuthController@showForgotPassword')->name('password.forgotpassword');
	Route::post('auth/password/sendemail', 'AuthController@sendPasswordResetLink')->name('password.email');
	Route::get('auth/password/reset', 'AuthController@showResetPassword')->name('password.reset.token');
	Route::post('auth/password/resetpassword', 'AuthController@resetPassword')->name('password.resetpassword');
	Route::get('auth/password/resetcompleted', 'AuthController@passwordResetCompleted')->name('password.resetcompleted');
	Route::get('auth/password/linksent', 'AuthController@passwordResetLinkSent')->name('password.resetlinksent');
	

/**
 * All routes which requires auth
 */
Route::middleware(['auth', 'rbac'])->group(function () {
		
	Route::get('home', 'HomeController@index')->name('home');

	

/* routes for Club_Iof Controller */	
	Route::get('club_iof', 'Club_IofController@index')->name('club_iof.index');
	Route::get('club_iof/index', 'Club_IofController@index')->name('club_iof.index');
	Route::get('club_iof/index/{filter?}/{filtervalue?}', 'Club_IofController@index')->name('club_iof.index');	
	Route::get('club_iof/view/{rec_id}', 'Club_IofController@view')->name('club_iof.view');	
	Route::get('club_iof/add', 'Club_IofController@add')->name('club_iof.add');
	Route::post('club_iof/store', 'Club_IofController@store')->name('club_iof.store');
		
	Route::any('club_iof/edit/{rec_id}', 'Club_IofController@edit')->name('club_iof.edit');	
	Route::get('club_iof/delete/{rec_id}', 'Club_IofController@delete');

/* routes for Member_Iof Controller */	
	Route::get('member_iof', 'Member_IofController@index')->name('member_iof.index');
	Route::get('member_iof/index', 'Member_IofController@index')->name('member_iof.index');
	Route::get('member_iof/index/{filter?}/{filtervalue?}', 'Member_IofController@index')->name('member_iof.index');	
	Route::get('member_iof/view/{rec_id}', 'Member_IofController@view')->name('member_iof.view');	
	Route::get('member_iof/add', 'Member_IofController@add')->name('member_iof.add');
	Route::post('member_iof/store', 'Member_IofController@store')->name('member_iof.store');
		
	Route::any('member_iof/edit/{rec_id}', 'Member_IofController@edit')->name('member_iof.edit');	
	Route::get('member_iof/delete/{rec_id}', 'Member_IofController@delete');	
	Route::get('member_iof/report_member', 'Member_IofController@report_member');
	Route::get('member_iof/report_member/{filter?}/{filtervalue?}', 'Member_IofController@report_member');

/* routes for User_System Controller */	
	Route::get('user_system', 'User_SystemController@index')->name('user_system.index');
	Route::get('user_system/index', 'User_SystemController@index')->name('user_system.index');
	Route::get('user_system/index/{filter?}/{filtervalue?}', 'User_SystemController@index')->name('user_system.index');	
	Route::get('user_system/view/{rec_id}', 'User_SystemController@view')->name('user_system.view');	
	Route::any('account/edit', 'AccountController@edit')->name('account.edit');	
	Route::get('account', 'AccountController@index');	
	Route::post('account/changepassword', 'AccountController@changepassword')->name('account.changepassword');	
	Route::get('user_system/add', 'User_SystemController@add')->name('user_system.add');
	Route::post('user_system/store', 'User_SystemController@store')->name('user_system.store');
		
	Route::any('user_system/edit/{rec_id}', 'User_SystemController@edit')->name('user_system.edit');	
	Route::get('user_system/delete/{rec_id}', 'User_SystemController@delete');

/* routes for Model_Has_Permissions Controller */	
	Route::get('model_has_permissions', 'Model_Has_PermissionsController@index')->name('model_has_permissions.index');
	Route::get('model_has_permissions/index', 'Model_Has_PermissionsController@index')->name('model_has_permissions.index');
	Route::get('model_has_permissions/index/{filter?}/{filtervalue?}', 'Model_Has_PermissionsController@index')->name('model_has_permissions.index');	
	Route::get('model_has_permissions/view/{rec_id}', 'Model_Has_PermissionsController@view')->name('model_has_permissions.view');	
	Route::get('model_has_permissions/add', 'Model_Has_PermissionsController@add')->name('model_has_permissions.add');
	Route::post('model_has_permissions/store', 'Model_Has_PermissionsController@store')->name('model_has_permissions.store');
		
	Route::any('model_has_permissions/edit/{rec_id}', 'Model_Has_PermissionsController@edit')->name('model_has_permissions.edit');	
	Route::get('model_has_permissions/delete/{rec_id}', 'Model_Has_PermissionsController@delete');

/* routes for Model_Has_Roles Controller */	
	Route::get('model_has_roles', 'Model_Has_RolesController@index')->name('model_has_roles.index');
	Route::get('model_has_roles/index', 'Model_Has_RolesController@index')->name('model_has_roles.index');
	Route::get('model_has_roles/index/{filter?}/{filtervalue?}', 'Model_Has_RolesController@index')->name('model_has_roles.index');	
	Route::get('model_has_roles/view/{rec_id}', 'Model_Has_RolesController@view')->name('model_has_roles.view');	
	Route::get('model_has_roles/add', 'Model_Has_RolesController@add')->name('model_has_roles.add');
	Route::post('model_has_roles/store', 'Model_Has_RolesController@store')->name('model_has_roles.store');
		
	Route::any('model_has_roles/edit/{rec_id}', 'Model_Has_RolesController@edit')->name('model_has_roles.edit');	
	Route::get('model_has_roles/delete/{rec_id}', 'Model_Has_RolesController@delete');

/* routes for Permissions Controller */	
	Route::get('permissions', 'PermissionsController@index')->name('permissions.index');
	Route::get('permissions/index', 'PermissionsController@index')->name('permissions.index');
	Route::get('permissions/index/{filter?}/{filtervalue?}', 'PermissionsController@index')->name('permissions.index');	
	Route::get('permissions/view/{rec_id}', 'PermissionsController@view')->name('permissions.view');	
	Route::get('permissions/add', 'PermissionsController@add')->name('permissions.add');
	Route::post('permissions/store', 'PermissionsController@store')->name('permissions.store');
		
	Route::any('permissions/edit/{rec_id}', 'PermissionsController@edit')->name('permissions.edit');	
	Route::get('permissions/delete/{rec_id}', 'PermissionsController@delete');

/* routes for Role_Has_Permissions Controller */	
	Route::get('role_has_permissions', 'Role_Has_PermissionsController@index')->name('role_has_permissions.index');
	Route::get('role_has_permissions/index', 'Role_Has_PermissionsController@index')->name('role_has_permissions.index');
	Route::get('role_has_permissions/index/{filter?}/{filtervalue?}', 'Role_Has_PermissionsController@index')->name('role_has_permissions.index');	
	Route::get('role_has_permissions/view/{rec_id}', 'Role_Has_PermissionsController@view')->name('role_has_permissions.view');	
	Route::get('role_has_permissions/add', 'Role_Has_PermissionsController@add')->name('role_has_permissions.add');
	Route::post('role_has_permissions/store', 'Role_Has_PermissionsController@store')->name('role_has_permissions.store');
		
	Route::any('role_has_permissions/edit/{rec_id}', 'Role_Has_PermissionsController@edit')->name('role_has_permissions.edit');	
	Route::get('role_has_permissions/delete/{rec_id}', 'Role_Has_PermissionsController@delete');

/* routes for Roles Controller */	
	Route::get('roles', 'RolesController@index')->name('roles.index');
	Route::get('roles/index', 'RolesController@index')->name('roles.index');
	Route::get('roles/index/{filter?}/{filtervalue?}', 'RolesController@index')->name('roles.index');	
	Route::get('roles/view/{rec_id}', 'RolesController@view')->name('roles.view');	
	Route::get('roles/add', 'RolesController@add')->name('roles.add');
	Route::post('roles/store', 'RolesController@store')->name('roles.store');
		
	Route::any('roles/edit/{rec_id}', 'RolesController@edit')->name('roles.edit');	
	Route::get('roles/delete/{rec_id}', 'RolesController@delete');
});

	
Route::get('componentsdata/club_iof_club_nama_value_exist',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->club_iof_club_nama_value_exist($request);
	}
)->middleware(['auth']);
	
Route::get('componentsdata/club_nama_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->club_nama_option_list($request);
	}
)->middleware(['auth']);
	
Route::get('componentsdata/club_type_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->club_type_option_list($request);
	}
)->middleware(['auth']);
	
Route::get('componentsdata/user_system_email_value_exist',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->user_system_email_value_exist($request);
	}
);
	
Route::get('componentsdata/user_system_username_value_exist',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->user_system_username_value_exist($request);
	}
);
	
Route::get('componentsdata/getcount_memberiofbekasiraya',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->getcount_memberiofbekasiraya($request);
	}
)->middleware(['auth']);
	
Route::get('componentsdata/getcount_clubiofbekasiraya',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->getcount_clubiofbekasiraya($request);
	}
)->middleware(['auth']);


Route::post('fileuploader/upload/{fieldname}', 'FileUploaderController@upload');
Route::post('fileuploader/s3upload/{fieldname}', 'FileUploaderController@s3upload');
Route::post('fileuploader/remove_temp_file', 'FileUploaderController@remove_temp_file');


/**
 * All static content routes
 */
Route::get('info/about',  function(){
		return view("pages.info.about");
	}
);
Route::get('info/faq',  function(){
		return view("pages.info.faq");
	}
);

Route::get('info/contact',  function(){
	return view("pages.info.contact");
}
);
Route::get('info/contactsent',  function(){
	return view("pages.info.contactsent");
}
);

Route::post('info/contact',  function(Request $request){
		$request->validate([
			'name' => 'required',
			'email' => 'required|email',
			'message' => 'required'
		]);

		$senderName = $request->name;
		$senderEmail = $request->email;
		$message = $request->message;

		$receiverEmail = config("mail.from.address");

		Mail::send(
			'pages.info.contactemail', [
				'name' => $senderName,
				'email' => $senderEmail,
				'comment' => $message
			],
			function ($mail) use ($senderEmail, $receiverEmail) {
				$mail->from($senderEmail);
				$mail->to($receiverEmail)
					->subject('Contact Form');
			}
		);
		return redirect("info/contactsent");
	}
);


Route::get('info/features',  function(){
		return view("pages.info.features");
	}
);
Route::get('info/privacypolicy',  function(){
		return view("pages.info.privacypolicy");
	}
);
Route::get('info/termsandconditions',  function(){
		return view("pages.info.termsandconditions");
	}
);

Route::get('info/changelocale/{locale}', function ($locale) {
	app()->setlocale($locale);
	session()->put('locale', $locale);
    return redirect()->back();
})->name('info.changelocale');