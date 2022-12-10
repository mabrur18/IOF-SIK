
<?php
	class Menu{
		
	public static function navbarsideleft(){
		return [
		[
			'path' => 'home',
			'label' => "GARAGE", 
			'icon' => '<i class="material-icons ">home</i>'
		],
		
		[
			'path' => 'club_iof/list',
			'label' => "CLUB IOF", 
			'icon' => '<i class="material-icons ">card_membership</i>','submenu' => [
		[
			'path' => 'club_iof/add',
			'label' => "NEW CLUB", 
			'icon' => '<i class="material-icons ">open_in_new</i>'
		],
		
		[
			'path' => 'club_iof',
			'label' => "LIST CLUB", 
			'icon' => '<i class="material-icons ">list</i>'
		]
	]
		],
		
		[
			'path' => 'member_iof',
			'label' => "MEMBER IOF", 
			'icon' => '<i class="material-icons ">person</i>','submenu' => [
		[
			'path' => 'member_iof/add',
			'label' => "NEW MEMBER", 
			'icon' => '<i class="material-icons ">control_point</i>'
		],
		
		[
			'path' => 'member_iof',
			'label' => "LIST MEMBER", 
			'icon' => '<i class="material-icons ">format_list_bulleted</i>'
		]
	]
		],
		
		[
			'path' => 'user_system',
			'label' => "USER SYSTEM", 
			'icon' => '<i class="material-icons ">people</i>','submenu' => [
		[
			'path' => 'user_system/add',
			'label' => "REGIST USER SYSTEM", 
			'icon' => '<i class="material-icons ">account_circle</i>'
		]
	]
		],
		
		[
			'path' => 'member_iof/report_member',
			'label' => "REPORT MEMBER", 
			'icon' => '<i class="material-icons ">insert_drive_file</i>'
		]
	] ;
	}
	
	public static function navbartopleft(){
		return [
		[
			'path' => 'roles',
			'label' => "Roles", 
			'icon' => '<i class="material-icons">extension</i>'
		],
		
		[
			'path' => 'role_has_permissions',
			'label' => "Role Has Permissions", 
			'icon' => '<i class="material-icons">extension</i>'
		],
		
		[
			'path' => 'permissions',
			'label' => "Permissions", 
			'icon' => '<i class="material-icons">extension</i>'
		],
		
		[
			'path' => 'model_has_roles',
			'label' => "Model Has Roles", 
			'icon' => '<i class="material-icons">extension</i>'
		],
		
		[
			'path' => 'model_has_permissions',
			'label' => "Model Has Permissions", 
			'icon' => '<i class="material-icons">extension</i>'
		]
	] ;
	}
	
		
	public static function no_reg_club(){
		return [] ;
	}
	
	public static function club_category(){
		return [
		[
			'value' => 'R2', 
			'label' => "R2", 
		],
		[
			'value' => 'R4', 
			'label' => "R4", 
		],
		[
			'value' => 'RC', 
			'label' => "RC", 
		],] ;
	}
	
	public static function club_status(){
		return [
		[
			'value' => '1', 
			'label' => "ACTIVE", 
		],
		[
			'value' => '0', 
			'label' => "NON ACTIVE", 
		],] ;
	}
	
	}
