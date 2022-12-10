<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Member_Iof extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'member_iof';
	

	/**
     * The table primary key field
     *
     * @var string
     */
	protected $primaryKey = 'id';
	

	/**
     * Table fillable fields
     *
     * @var array
     */
	protected $fillable = [
		'nama','nik','email','alamat','tempat_lahir','tanggal_lahir','handphone','no_kta','tanggal_kta','tanggal_kta_exp','club_nama','club_type','member_status','photo'
	];
	

	/**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
	public $timestamps = false;
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
		//search table record 
		$search_condition = '(
				nama LIKE ?  OR 
				nik LIKE ?  OR 
				email LIKE ?  OR 
				alamat LIKE ?  OR 
				tempat_lahir LIKE ?  OR 
				handphone LIKE ?  OR 
				no_kta LIKE ?  OR 
				id_club LIKE ?  OR 
				club_nama LIKE ?  OR 
				club_type LIKE ?  OR 
				member_status LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
		];
		//setting search conditions
		$query->whereRaw($search_condition, $search_params);
	}
	

	/**
     * return list page fields of the model.
     * 
     * @return array
     */
	public static function listFields(){
		return [ 
			"id",
			"nama",
			"email",
			"handphone",
			"no_kta",
			"tanggal_kta",
			"tanggal_kta_exp",
			"club_nama",
			"club_type",
			"member_status",
			"photo" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"id",
			"nama",
			"email",
			"handphone",
			"no_kta",
			"tanggal_kta",
			"tanggal_kta_exp",
			"club_nama",
			"club_type",
			"member_status",
			"photo" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"photo",
			"id",
			"nama",
			"nik",
			"email",
			"alamat",
			"tempat_lahir",
			"tanggal_lahir",
			"handphone",
			"no_kta",
			"tanggal_kta",
			"tanggal_kta_exp",
			"id_club",
			"club_nama",
			"club_type",
			"member_status" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"photo",
			"id",
			"nama",
			"nik",
			"email",
			"alamat",
			"tempat_lahir",
			"tanggal_lahir",
			"handphone",
			"no_kta",
			"tanggal_kta",
			"tanggal_kta_exp",
			"id_club",
			"club_nama",
			"club_type",
			"member_status" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"id",
			"nama",
			"nik",
			"email",
			"alamat",
			"tempat_lahir",
			"tanggal_lahir",
			"handphone",
			"no_kta",
			"tanggal_kta",
			"tanggal_kta_exp",
			"club_nama",
			"club_type",
			"member_status",
			"photo" 
		];
	}
	

	/**
     * return reportMember page fields of the model.
     * 
     * @return array
     */
	public static function reportMemberFields(){
		return [ 
			"id",
			"photo",
			"nama",
			"nik",
			"email",
			"alamat",
			"tempat_lahir",
			"tanggal_lahir",
			"handphone",
			"no_kta",
			"tanggal_kta",
			"tanggal_kta_exp",
			"club_nama",
			"club_type",
			"member_status" 
		];
	}
	

	/**
     * return exportReportMember page fields of the model.
     * 
     * @return array
     */
	public static function exportReportMemberFields(){
		return [ 
			"id",
			"photo",
			"nama",
			"nik",
			"email",
			"alamat",
			"tempat_lahir",
			"tanggal_lahir",
			"handphone",
			"no_kta",
			"tanggal_kta",
			"tanggal_kta_exp",
			"club_nama",
			"club_type",
			"member_status" 
		];
	}
}
