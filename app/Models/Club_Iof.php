<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Club_Iof extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'club_iof';
	

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
		'no_reg_club','club_nama','club_category','alamat_club','logo_club','join_date','club_status'
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
				no_reg_club LIKE ?  OR 
				club_nama LIKE ?  OR 
				club_category LIKE ?  OR 
				alamat_club LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%"
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
			"no_reg_club",
			"club_nama",
			"club_category",
			"alamat_club",
			"logo_club",
			"join_date",
			"club_status" 
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
			"no_reg_club",
			"club_nama",
			"club_category",
			"alamat_club",
			"logo_club",
			"join_date",
			"club_status" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"logo_club",
			"id",
			"club_nama",
			"no_reg_club",
			"club_category",
			"alamat_club",
			"join_date",
			"club_status" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"logo_club",
			"id",
			"club_nama",
			"no_reg_club",
			"club_category",
			"alamat_club",
			"join_date",
			"club_status" 
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
			"no_reg_club",
			"club_nama",
			"club_category",
			"alamat_club",
			"logo_club",
			"join_date",
			"club_status" 
		];
	}
}
