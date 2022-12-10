<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Member_IofAddRequest;
use App\Http\Requests\Member_IofEditRequest;
use App\Models\Member_Iof;
use Illuminate\Http\Request;
use Exception;
class Member_IofController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.member_iof.list";
		$query = Member_Iof::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			Member_Iof::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "member_iof.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, Member_Iof::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Member_Iof::query();
		$record = $query->findOrFail($rec_id, Member_Iof::viewFields());
		return $this->renderView("pages.member_iof.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.member_iof.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(Member_IofAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		$modeldata['photo'] = $this->moveUploadedFiles($modeldata['photo'], "photo");
		
		//save Member_Iof record
		$record = Member_Iof::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("member_iof", "Record added successfully");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(Member_IofEditRequest $request, $rec_id = null){
		$query = Member_Iof::query();
		$record = $query->findOrFail($rec_id, Member_Iof::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
		$modeldata['photo'] = $this->moveUploadedFiles($modeldata['photo'], "photo");
			$record->update($modeldata);
			return $this->redirect("member_iof", "Record updated successfully");
		}
		return $this->renderView("pages.member_iof.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = Member_Iof::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Record deleted successfully");
	}
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function report_member(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.member_iof.report_member";
		$query = Member_Iof::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			Member_Iof::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "member_iof.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, Member_Iof::reportMemberFields());
		return $this->renderView($view, compact("records"));
	}
	private function getNextRecordId($rec_id){
		$query = Member_Iof::query();
		$query->where('id', '>', $rec_id);
		$query->orderBy('id', 'asc');
		$record = $query->first(['id']);
		if($record){
			return $record['id'];
		}
		return null;
	}
	private function getPreviousRecordId($rec_id){
		$query = Member_Iof::query();
		$query->where('id', '<', $rec_id);
		$query->orderBy('id', 'desc');
		$record = $query->first(['id']);
		if($record){
			return $record['id'];
		}
		return null;
	}
}
