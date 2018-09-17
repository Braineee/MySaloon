<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Requests\RoleCreateRequest;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){ 
            //get the list of assets 
            $roles = Role::all();
            return view('roles.index', ['roles' => $roles]);
        }
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleCreateRequest $request)
    {
        if(Auth::check()){
        
            $validated = $request->validated(); //validate the users input

            if($validated){
    
                $role = Role::create([

                    'role' => $request->input('role'),

                ]);
    
                if($role){
                    return redirect()->route('roles.index')
                    ->with('success','Role was created successfully');
                }else{
                    return back()->withInput()->with('error','Sorry, role was not created');  
                }

            }else{
                return back()->withInput()->with('error','Validation error');
            }
            
        }
        return back()->withInput()->with('error','Sorry role could not be created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $role = Role::find($role->id);
        return view('roles.edit', ['role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $updateRole = Role::where('id', $role->id)->update([
            'role' => $request->input('role'),
        ]);

        if($updateRole){
            return redirect()->route('roles.index')
            ->with('success', 'Role was updated successfully');
        }
        //redirect
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $findRole = Role::find($role->id);
        /*dump($findUser);
        die();*/
        if($findRole->delete()){
            return redirect()->route('roles.index')->with('success', 'Role was deleted successfully');
        }
        //redirect
        return back()->withInput('error', 'Role could not be deleted');
    }
}
