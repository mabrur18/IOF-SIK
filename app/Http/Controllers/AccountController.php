<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User_System;
use App\Http\Requests\User_SystemAccountEditRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Exception;
/**
 * Account Page Controller
 * @category  Controller
 */
class AccountController extends Controller{
	

	/**
     * Select user account data
     * @return \Illuminate\View\View
     */
	function index(){
		$rec_id = Auth::id();
		$query = User_System::query();
		$record = $query->find($rec_id, User_System::accountviewFields());
		if(!$record){
			return $this->reject("No record found", 404);
		}
		return $this->renderView("pages.account.view", ["data" => $record, "rec_id" => $rec_id]);
	}
	

	/**
     * Update user account data
     * @return \Illuminate\View\View;
     */
	function edit(User_SystemAccountEditRequest $request){
		$rec_id = Auth::id();
		$query = User_System::query();
		$user = $query->findOrFail($rec_id, User_System::accounteditFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
		$modeldata['user_photo'] = $this->moveUploadedFiles($modeldata['user_photo'], "user_photo");
			$user->update($modeldata);
			return $this->redirect("account", "Record updated successfully");
		}
		return $this->renderView("pages.account.edit", ["data" => $user, "rec_id" => $rec_id]);
	}
	

	/**
     * Change user account password
     * @return \Illuminate\Http\Response
     */
	public function changepassword(Request $request)
	{
		$request->validate([
			'oldpassword' => ['required'],
			'newpassword' => ['required'],
			'confirmpassword' => ['same:newpassword'],
		]);
		$userid = auth()->id();
		$user = User_System::find($userid);
		$oldPasswordText = $request->oldpassword;
		$oldPasswordHash = $user->password;
		if(!Hash::check($oldPasswordText, $oldPasswordHash)){
			return back()->withErrors(["Current password is incorrect"]);
		}
		$modeldata = ['password' => Hash::make($request->newpassword)];
		$user->update($modeldata);
		return $this->redirect("/account", "Password change completed");
	}
}
