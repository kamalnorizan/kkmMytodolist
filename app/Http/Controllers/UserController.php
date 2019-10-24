<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use\Spatie\Permission\Models\Role;
use\Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    //
    public function index() 
    {
    	$permissions = Permission::whereIn('name',['task-edit','task-delete', 'task-create'])->get();
    	// $permissions = Permission::all();
    	$role = Role::where('name','editor')->first();
    	$role->syncPermissions($permissions);
    	// dd($role);
    	$users = User::all();
    	$options = Role::pluck('name','name');
    	
    	return view('users.index',compact('users','options'));
    }

    public function assignrole(Request $request) 
    {
    	$user = User::find($request->user_id);
    	$user->assignRole($request->role);

    	return back();
    }

    public function roles() 
    {
    	$roles = Role::with('permissions')->get();
    	$permissions = Permission::with('roles')->get();
    	// dd($permissions);
    	return view('users.role', compact('roles','permissions'));
    }

    public function createRole(Request $request) 
    {

    	Role::create(['name'=>$request->role]);
    	
    	return back();
    }

    public function createPermission(Request $request) 
    {
    	
    	Permission::create(['name'=>$request->permission]);
    	
    	return back();
    }

    public function roleassignpermission(Request $request) 
    {
    	$role = Role::find($request->role_id_rolepermission);
    	// dd($request->permissions);
    	$role->syncPermissions($request->permissions);

    	return back();
    }
}
