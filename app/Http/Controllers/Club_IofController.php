<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Club_IofAddRequest;
use App\Http\Requests\Club_IofEditRequest;
use App\Models\Club_Iof;
use Illuminate\Http\Request;
use Exception;
class Club_IofController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.club_iof.list";
		$query = Club_Iof::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			Club_Iof::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "club_iof.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, Club_Iof::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Club_Iof::query();
		$record = $query->findOrFail($rec_id, Club_Iof::viewFields());
		return $this->renderView("pages.club_iof.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.club_iof.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(Club_IofAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		$modeldata['logo_club'] = $this->moveUploadedFiles($modeldata['logo_club'], "logo_club");
		
		//save Club_Iof record
		$record = Club_Iof::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("club_iof", "Record added successfully");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(Club_IofEditRequest $request, $rec_id = null){
		$query = Club_Iof::query();
		$record = $query->findOrFail($rec_id, Club_Iof::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
		$modeldata['logo_club'] = $this->moveUploadedFiles($modeldata['logo_club'], "logo_club");
			$record->update($modeldata);
			return $this->redirect("club_iof", "Record updated successfully");
		}
		return $this->renderView("pages.club_iof.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = Club_Iof::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Record deleted successfully");
	}
	private function getNextRecordId($rec_id){
		$query = Club_Iof::query();
		$query->where('id', '>', $rec_id);
		$query->orderBy('id', 'asc');
		$record = $query->first(['id']);
		if($record){
			return $record['id'];
		}
		return null;
	}
	private function getPreviousRecordId($rec_id){
		$query = Club_Iof::query();
		$query->where('id', '<', $rec_id);
		$query->orderBy('id', 'desc');
		$record = $query->first(['id']);
		if($record){
			return $record['id'];
		}
		return null;
	}
}
