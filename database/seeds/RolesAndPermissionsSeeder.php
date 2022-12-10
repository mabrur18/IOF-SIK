<?php
use App\Models\User_System;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolesAndPermissionsSeeder extends Seeder
{
	private $permissionsByRole = [
			
		'administrator' => [
			'home/list', 'club_iof/list', 'club_iof/view', 'club_iof/add', 'club_iof/store', 'club_iof/edit', 'club_iof/delete', 'club_iof/importdata', 'member_iof/list', 'member_iof/view', 'member_iof/add', 'member_iof/store', 'member_iof/edit', 'member_iof/delete', 'member_iof/importdata', 'user_system/list', 'user_system/view', 'user_system/add', 'user_system/store', 'user_system/edit', 'user_system/delete', 'user_system/importdata', 'account/list', 'account/edit', 'model_has_permissions/list', 'model_has_permissions/view', 'model_has_permissions/add', 'model_has_permissions/store', 'model_has_permissions/edit', 'model_has_permissions/delete', 'model_has_roles/list', 'model_has_roles/view', 'model_has_roles/add', 'model_has_roles/store', 'model_has_roles/edit', 'model_has_roles/delete', 'permissions/list', 'permissions/view', 'permissions/add', 'permissions/store', 'permissions/edit', 'permissions/delete', 'role_has_permissions/list', 'role_has_permissions/view', 'role_has_permissions/add', 'role_has_permissions/store', 'role_has_permissions/edit', 'role_has_permissions/delete', 'roles/list', 'roles/view', 'roles/add', 'roles/store', 'roles/edit', 'roles/delete', 'member_iof/report_member'
		], 
		'admin' => [
			'home/list', 'club_iof/list', 'club_iof/view', 'club_iof/add', 'club_iof/store', 'club_iof/edit', 'club_iof/delete', 'member_iof/list', 'member_iof/view', 'member_iof/add', 'member_iof/store', 'member_iof/edit', 'member_iof/delete', 'member_iof/importdata', 'account/list', 'account/edit', 'member_iof/report_member'
		], 
		'user' => [
			'home/list', 'club_iof/list', 'club_iof/view', 'club_iof/add', 'club_iof/store', 'member_iof/list', 'member_iof/view', 'member_iof/add', 'member_iof/store'
		]
	];
    public function run()
    {
        $tableNames = config('permission.table_names');

		Schema::disableForeignKeyConstraints();

        DB::table($tableNames['roles'])->truncate();
        DB::table($tableNames['permissions'])->truncate();
		DB::table($tableNames['role_has_permissions'])->truncate();
		
		Schema::enableForeignKeyConstraints();
		
		app()['cache']->forget('spatie.permission.cache');
		app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

		$this->syncPermissions();
		$this->syncRoles();
		$this->syncUsersRole('administrator');
    }
	function syncRoles(){
		foreach ($this->permissionsByRole as $rolename => $permissions) {
			$role = Role::create(['name' => $rolename]);
			$role->givePermissionTo($permissions);
		}
	}

	function syncPermissions(){
		$permissions = [];

		foreach ($this->permissionsByRole as $rolename => $rolePermissions) {
			$permissions = array_merge($permissions, $rolePermissions);
		}

		$insertData = [];
		foreach($permissions as $name){
			$insertData[] = ['name'=>$name, 'guard_name' => 'web'];
		}
		Permission::insert($insertData);
	}

	function syncUsersRole($role){
		$users = User_System::all();
		foreach($users as $user){
			$user->syncRoles($role);
		}
	}
}
