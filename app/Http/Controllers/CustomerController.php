<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){ 
            //get the list of customers 
            $customer = User::whereIn('role_id', [4])->get();
            return view('customers.index', ['customers' => $customer]);
        }
        return view('auth.login');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function blockCustomer(Request $request, $user)
    {
        $findCustomer = DB::table('users')
        ->where('id','=', $user)
        ->first();
        /*dump($findCustomer);
        die();*/
        if($findCustomer->isBlocked == 0){
            $blockUser = User::where('id', $user)->update([
                'isBlocked' => 1
            ]);

            return redirect()->route('customers.index')
            ->with('success', 'customer was blocked successfully');
        }else{
            $unBlock = User::where('id', $user)->update([
                'isBlocked' => 0
            ]);

            return redirect()->route('customers.index')
            ->with('success', 'customer was successfully unblocked');
        }

        //redirect
        return back()->withInput();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
