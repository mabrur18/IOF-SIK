<?php 
namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
/**
 * Components data Model
 * Use for getting values from the database for page components
 * Support raw query builder
 * @category Model
 */
class ComponentsData{
	

	/**
     * Check if value already exist in Club_Iof table
	 * @param string $value
     * @return bool
     */
	function club_iof_club_nama_value_exist(Request $request){
		$value = trim($request->value);
		$exist = DB::table('club_iof')->where('club_nama', $value)->value('club_nama');   
		if($exist){
			return true;
		}
		return false;
	}
	

	/**
     * club_nama_option_list Model Action
     * @return array
     */
	function club_nama_option_list(){
		$sqltext = "SELECT  DISTINCT club_nama AS value,club_nama AS label FROM club_iof";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * club_type_option_list Model Action
     * @return array
     */
	function club_type_option_list(){
		$sqltext = "SELECT  DISTINCT club_category AS value,club_category AS label FROM club_iof";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * Check if value already exist in User_System table
	 * @param string $value
     * @return bool
     */
	function user_system_email_value_exist(Request $request){
		$value = trim($request->value);
		$exist = DB::table('user_system')->where('email', $value)->value('email');   
		if($exist){
			return true;
		}
		return false;
	}
	

	/**
     * Check if value already exist in User_System table
	 * @param string $value
     * @return bool
     */
	function user_system_username_value_exist(Request $request){
		$value = trim($request->value);
		$exist = DB::table('user_system')->where('username', $value)->value('username');   
		if($exist){
			return true;
		}
		return false;
	}
	

	/**
     * getcount_memberiofbekasiraya Model Action
     * @return int
     */
	function getcount_memberiofbekasiraya(){
		$sqltext = "SELECT COUNT(*) AS num FROM member_iof";
		$query_params = [];
		$val = DB::selectOne(DB::raw($sqltext), $query_params);
		return $val->num;
	}
	

	/**
     * getcount_clubiofbekasiraya Model Action
     * @return int
     */
	function getcount_clubiofbekasiraya(){
		$sqltext = "SELECT COUNT(*) AS num FROM club_iof";
		$query_params = [];
		$val = DB::selectOne(DB::raw($sqltext), $query_params);
		return $val->num;
	}
}
