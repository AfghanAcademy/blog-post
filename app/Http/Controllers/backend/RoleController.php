<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        return view('backend.role.index')
                    ->with('roles',Role::paginate(10));
    }

    public function create(){
        return view('backend.role.create');
    }


    public function store(Request $request){
        $request->validate([
            'name'=>'required'
        ]);

        Role::create(['name'=>$request->name]);

        return redirect()->route('role.index');
    }


    public function show($id){
        return view('backend.role.show')
                    ->with('permissions',Permission::all())
                    ->with('role',Role::find($id));
    }


    public function update(Request $request,$id){
       $request->validate([
        'permission'=>'required|array'
       ]);

       $role = Role::find($id);

        $role->permissions()->sync($request->permission);

        return redirect()->route('role.index');
    }
}
