<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  dd("ok");
        return view('developer.index');
    }
   // ================== User=============
    public function user(){       
        $user  = new UserController;      
        $data = $user->index();
        return view('developer.users.index', compact('data'));
    } 
     public function usercreate(){
        return view('developer.users.create');
    }
    public function userstore(Request $request){   
        $user  = new UserController;  
        $user->store($request);
        return redirect()->route('developer.users')
            ->with('success', 'User created successfully.');
    }
    public function usershow($id){
        $user  = new UserController;  
        $urs = $user->show($id);
        $users = $urs[0];
        return view('developer.users.show', compact('users'));
    }
    public function useredit($id){
    
        $users  = new UserController;  
        $urs = $users->edit($id);
        $user = $urs[0];
        return view('developer.users.edit', compact('user'));
    } 
    public function userpublish($id){
        $publish =  User::find($id);
        $publish->status_id = 0;
        $publish->save();
        return redirect('developer/users');
    } 
    public function userunpublish($id){
    
        $publish =  User::find($id);
        $publish->status_id = 1;
        $publish->save();
        return redirect('developer/users');
    }
    public function userupdate(Request $request, $id) {   
        $user  = new UserController;  
        $user->update($request, $id);
        return redirect()->route('developer.users')
            ->with('success', 'User updated successfully.');
    }
    public function userdestroy($id)
    {
        $user  = new UserController;  
        $urs = $user->destroy($id);
        return redirect()->route('developer.users')
            ->with('success', 'User deleted successfully.');
    }
    // ================== Role=============
    public function role(){       
        $role  = new RoleController;      
        $data = $role->index();
        return view('developer.roles.index', compact('data'));
    } 
     public function rolecreate(){
        $role  = new RoleController;  
        $roles = $role->create();
        $permission = $roles[0];
        $users = $roles[1];
        return view('developer.roles.create', compact(['permission','users']));
    }

    public function rolestore(Request $request){   
        $role  = new RoleController;  
        $role->store($request);
        return redirect()->route('developer.roles')
            ->with('success', 'Role created successfully.');
    }
    public function roleshow($id){
        $role  = new RoleController;  
        $roles = $role->show($id);
        $role = $roles[0];
        $rolePermissions = $roles[1];
        return view('developer.roles.show', compact('role', 'rolePermissions'));
    }
    public function roleedit($id){
        $role  = new RoleController;  
        $roles = $role->edit($id);
        $role = $roles[0];
        $permission = $roles[1];
        $rolePermissions = $roles[2];
        return view('developer.roles.edit', compact('role', 'permission', 'rolePermissions'));
    }
    public function roleupdate(Request $request, $id) {   
        $role  = new RoleController;  
        $role->update($request, $id);
        return redirect()->route('developer.roles')
            ->with('success', 'Role updated successfully.');
    } 
    // ================== permission=============
    public function permission(){       
        $permission  = new PermissionController;      
        $data = $permission->index();
        return view('developer.permissions.index', compact('data'));
    } 
     public function permissioncreate(){
        return view('developer.permissions.create');
    }

    public function permissionstore(Request $request){   
        $permissions  = new PermissionController;  
        $permissions->store($request);
        return redirect()->route('developer.permissions')
            ->with('success', 'Permission created successfully.');
    }
    public function permissionshow($id){
        $permission  = new PermissionController;  
        $prms = $permission->show($id);
        $permissions = $prms[0];
        return view('developer.permissions.show', compact('permissions'));
    }
    public function permissionedit($id){
        $permission  = new PermissionController;  
        $permission = $permission->edit($id);
        $permissions = $permission[0];
        return view('developer.permissions.edit', compact('permissions'));
    }
    public function permissionupdate(Request $request, $id) {   
        $role  = new PermissionController;  
        $role->update($request, $id);
        return redirect()->route('developer.permissions')
            ->with('success', 'Permission updated successfully.');
    }
    public function permissiondelete($id)
    {
        $permission  = new PermissionController;  
        $permission->destroy($id);
        return redirect()->route('developer.permissions')
            ->with('success', 'Pemission deleted successfully.');
    }

}
