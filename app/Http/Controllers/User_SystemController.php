<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\User_SystemRegisterRequest;
use App\Http\Requests\User_SystemAccountEditRequest;
use App\Http\Requests\User_SystemAddRequest;
use App\Http\Requests\User_SystemEditRequest;
use App\Models\User_System;
use Illuminate\Http\Request;
use Exception;
class User_SystemController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.user_system.list";
		$query = User_System::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			User_System::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "user_system.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, User_System::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = User_System::query();
		$record = $query->findOrFail($rec_id, User_System::viewFields());
		return $this->renderView("pages.user_system.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.user_system.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(User_SystemAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		$modeldata['user_photo'] = $this->moveUploadedFiles($modeldata['user_photo'], "user_photo");
		$modeldata['password'] = bcrypt($modeldata['password']);
		
		//save User_System record
		$record = User_System::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("user_system", "Record added successfully");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(User_SystemEditRequest $request, $rec_id = null){
		$query = User_System::query();
		$record = $query->findOrFail($rec_id, User_System::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
		$modeldata['user_photo'] = $this->moveUploadedFiles($modeldata['user_photo'], "user_photo");
			$record->update($modeldata);
			return $this->redirect("user_system", "Record updated successfully");
		}
		return $this->renderView("pages.user_system.edit", ["data" => $record, "rec_id" => $rec_id]);
	}
	

	/**
     * Delete record from the database
	 * Support multi delete by separating record id by comma.
	 * @param  \Illuminate\Http\Request
	 * @param string $rec_id //can be separated by comma 
     * @return \Illuminate\Http\Response
     */
	function delete(Request $request, $rec_id = null){
		$arr_id = explode(",", $rec_id);
		$query = User_System::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Record deleted successfully");
	}
	private function getNextRecordId($rec_id){
		$query = User_System::query();
		$query->where('id', '>', $rec_id);
		$query->orderBy('id', 'asc');
		$record = $query->first(['id']);
		if($record){
			return $record['id'];
		}
		return null;
	}
	private function getPreviousRecordId($rec_id){
		$query = User_System::query();
		$query->where('id', '<', $rec_id);
		$query->orderBy('id', 'desc');
		$record = $query->first(['id']);
		if($record){
			return $record['id'];
		}
		return null;
	}
}
