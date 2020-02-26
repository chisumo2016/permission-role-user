<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Role::orderBy('id', 'DESC')->paginate(5);
        return  view('roles.index', compact('roles'))
            ->with('i', ($request->input('page',1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::get();
        return  view('roles.create', compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'       => 'required|unique:roles, name',
            'permission' =>'required'
        ]);

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermission($request->input('permission'));

        return  redirect()->route('roles.index')->with('success','Role Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);

        $rolePermission = Permission::join("role_has_permission", "role_has_permissions.permission_id" ,"=" , "permission.id")
                    ->where("role_has_permissions.role_id",$id);

        return view('roles.show',compact('role', 'rolePermission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permission = Permission::get();
        $rolePermission = DB::join("role_has_permission")->where("role_has_permissions.role_id",$id)
                           ->pluck('role_has_permissions.permission_id','role_has_permissions.permissions_id')->all();

        return view('roles.show',compact('role', 'permission', 'rolePermission'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'       => 'required|unique:roles, name',
            'permission' =>'required'
        ]);

        $role = Role::findOrFail($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));

        return  redirect()->route('roles.index')->with('success','Role updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('roles')->where('id',$id)->delete();
        return  redirect()->route('roles.index')->with('success','Role deleted successfully');

    }
}
