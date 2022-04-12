<?php
namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Role_has_permission;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjetController;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){       
        return view('admin.index');
    } 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }

    // ================== User=============
    public function user(){       
        $user  = new UserController;      
        $data = $user->index();
        return view('admin.users.index', compact('data'));
    } 
     public function usercreate(){
        return view('admin.users.create');
    }
    public function userstore(Request $request){   
        $user  = new UserController;  
        $user->store($request);
        return redirect()->route('admin.users')
            ->with('success', 'User created successfully.');
    }
    public function usershow($id){
        $user  = new UserController;  
        $urs = $user->show($id);
        $users = $urs[0];
        return view('admin.users.show', compact('users'));
    }
    public function useredit($id){
    
        $users  = new UserController;  
        $urs = $users->edit($id);
        $user = $urs[0];
        return view('admin.users.edit', compact('user'));
    } 
    public function userpublish($id){
        $publish =  User::find($id);
        $publish->status_id = 0;
        $publish->save();
        return redirect('admin/users');
    } 
    public function userunpublish($id){
    
        $publish =  User::find($id);
        $publish->status_id = 1;
        $publish->save();
        return redirect('admin/users');
    }
    public function userupdate(Request $request, $id) {   
        $user  = new UserController;  
        $user->update($request, $id);
        return redirect()->route('admin.users')
            ->with('success', 'User updated successfully.');
    }
    public function userdestroy($id)
    {
        $user  = new UserController;  
        $urs = $user->destroy($id);
        return redirect()->route('admin.users')
            ->with('success', 'User deleted successfully.');
    }
    // ================== Role=============
    public function role(){       
        $role  = new RoleController;      
        $data = $role->index();
        return view('admin.roles.index', compact('data'));
    } 
     public function rolecreate(){
        $role  = new RoleController;  
        $roles = $role->create();
        $permission = $roles[0];
        $users = $roles[1];
        return view('admin.roles.create', compact(['permission','users']));
    }

    public function rolestore(Request $request){   
        $role  = new RoleController;  
        $role->store($request);
        return redirect()->route('admin.roles')
            ->with('success', 'Role created successfully.');
    }
    public function roleshow($id){
        $role  = new RoleController;  
        $roles = $role->show($id);
        $role = $roles[0];
        $rolePermissions = $roles[1];
        return view('admin.roles.show', compact('role', 'rolePermissions'));
    }
    public function roleedit($id){
        $role  = new RoleController;  
        $roles = $role->edit($id);
        $role = $roles[0];
        $permission = $roles[1];
        $rolePermissions = $roles[2];
        return view('admin.roles.edit', compact('role', 'permission', 'rolePermissions'));
    }
    public function roleupdate(Request $request, $id) {   
        $role  = new RoleController;  
        $role->update($request, $id);
        return redirect()->route('admin.roles')
            ->with('success', 'Role updated successfully.');
    } 
    // ================== permission=============
    public function permission(){       
        $permission  = new PermissionController;      
        $data = $permission->index();
        return view('admin.permissions.index', compact('data'));
    } 
     public function permissioncreate(){
        return view('admin.permissions.create');
    }

    public function permissionstore(Request $request){   
        $permissions  = new PermissionController;  
        $permissions->store($request);
        return redirect()->route('admin.permissions')
            ->with('success', 'Permission created successfully.');
    }
    public function permissionshow($id){
        $permission  = new PermissionController;  
        $prms = $permission->show($id);
        $permissions = $prms[0];
        return view('admin.permissions.show', compact('permissions'));
    }
    public function permissionedit($id){
        $permission  = new PermissionController;  
        $permission = $permission->edit($id);
        $permissions = $permission[0];
        return view('admin.permissions.edit', compact('permissions'));
    }
    public function permissionupdate(Request $request, $id) {   
        $role  = new PermissionController;  
        $role->update($request, $id);
        return redirect()->route('admin.permissions')
            ->with('success', 'Permission updated successfully.');
    }
    public function permissiondelete($id)
    {
        $permission  = new PermissionController;  
        $permission->destroy($id);
        return redirect()->route('admin.permissions')
            ->with('success', 'Pemission deleted successfully.');
    }
    //============================ Projects ===============
    public function projects(){
          $data = Project::orderBy('id', 'desc')->paginate(5);      
        // return view('admin.project.index', compact('data'));
        return view('admin.project.index');
    }    
    public function projectscreate(){
        return view('admin.project.create');
    } 
     public function projectsstore(Request $request)
    {   
        $role_id = $request->input('role_id');  
        $permissions = $request->input('permission');  
    
           
        //  return redirect()->route('admin.porjects')
        //     ->with('success', 'Permission created successfully.');
    }
  

    
}
