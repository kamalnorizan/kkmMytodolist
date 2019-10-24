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
    	// $permissions = Permission::whereIn('name',['task-edit','task-delete'])->get();
    	$permissions = Permission::all();
    	$role = Role::where('name','admin')->first();
    	$role->syncPermissions($permissions);
    	dd($role);
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
}
