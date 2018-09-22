<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StaffStoreRequest;
use App\Http\Requests\StaffUpdateRequest;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){ 
            //get the list of staffs 
            $staff = DB::table('users')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->select('users.*', 'roles.role')
            ->whereIn('role_id', [2,3,1])
            ->get();

            return view('staffs.index', ['staffs' => $staff]);

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
        //get the roles need fro creating the staff
        $roles = Role::all();
        return view('staffs.create', ['roles' => $roles]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StaffStoreRequest $request)
    {
        //check if the user is logged in
        if(Auth::check()){
        
            $validated = $request->validated(); //validate the users input request

            if($validated){
                
                if($request->hasFile('image')){
                    //get the file extension
                    $imageExt = $request->file('image')->getClientOriginalExtension();
                    //get a random name
                    $rand = mt_rand(0000,9999);
                    //create the image name
                    $newImageName = $rand.".".$imageExt;
                    //save the image
                    $request->image->storeAs('staffs', $newImageName);

                    /*dump($newImageName); 
                    die();*/
                    //store the data
                    $staff = User::create([
                        'name' => $request->input('name'),
                        'phone' => $request->input('phone'),
                        'sex' => $request->input('sex'),
                        'email' => $request->input('email'),
                        'role_id' => $request->input('role'),
                        'password' => Hash::make($request->input('phone')),
                        'picture' => $newImageName
                    ]);
        
                    if($staff){
                        return redirect()->route('staffs.index')
                        ->with('success','Staff was created successfully');
                    }else{
                        return back()->withInput()->with('error','Sorry, staff was not created');  
                    }

                }else{
                    return back()->withInput()->with('error','Please upload an image');
                }

            }else{
                return back()->withInput()->with('error','Validation error');
            }
            
        }
        return back()->withInput()->with('error','Sorry staff could not be created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        $staff = User::find($user);
        $roles = Role::all();
        return view('staffs.edit', ['staff' => $staff, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(StaffUpdateRequest $request, $user)
    {
        
        $updateUser = User::where('id', $user)->update([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'sex' => $request->input('sex'),
            'email' => $request->input('email'),
            'role_id' => $request->input('role')
        ]);

        if($updateUser){
            return redirect()->route('staffs.index')
            ->with('success', 'Staff was updated successfully');
        }
        //redirect
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        
        $findUser = User::find($user);
        /*dump($findUser);
        die();*/
        if($findUser->delete()){
            return redirect()->route('staffs.index')->with('success', 'Staff was deleted successfully');
        }
        //redirect
        return back()->withInput('error', 'Staff could not be deleted');
    }
}
