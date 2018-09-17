<?php

namespace App\Http\Controllers;

use App\Accessory;
use Illuminate\Http\Request;
use App\Http\Requests\AccessoryCreateRequest;
use App\Http\Requests\AccessoryUpdateRequest;
use Illuminate\Support\Facades\Auth;

class AccessoryController extends Controller
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
            $accessories = Accessory::all();
            return view('accessories.index', ['accessories' => $accessories]);
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
        return view('accessories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccessoryCreateRequest $request)
    {
        if(Auth::check()){
        
            $validated = $request->validated(); //validate the users input

            if($validated){
                
                if($request->hasFile('image')){
                    //get the file extension
                    $imageExt = $request->file('image')->getClientOriginalExtension();
                    //get a random name
                    $rand = mt_rand(0000,9999);
                    //create the image name
                    $newImageName = $rand.".".$imageExt;
                    //save the image
                    $request->image->storeAs('accessories', $newImageName);

                    /*dump($newImageName); 
                    die();*/
                    //store the data
                    $acessories = Accessory::create([
                        'name' => $request->input('name'),
                        'price' => $request->input('price'),
                        'quantity' => $request->input('quantity'),
                        'picture' => $newImageName
                    ]);
        
                    if($acessories){
                        return redirect()->route('accessories.index')
                        ->with('success','Accessory was created successfully');
                    }else{
                        return back()->withInput()->with('error','Sorry, Accessory was not created');  
                    }

                }else{
                    return back()->withInput()->with('error','Please upload an image');
                }

            }else{
                return back()->withInput()->with('error','Validation error');
            }
            
        }
        return back()->withInput()->with('error','Sorry Accessory could not be created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Accessory  $accessory
     * @return \Illuminate\Http\Response
     */
    public function show(Accessory $accessory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Accessory  $accessory
     * @return \Illuminate\Http\Response
     */
    public function edit(Accessory $accessory)
    {
        $accessory = Accessory::find($accessory->id);
        /*dump($accessory);
        die();*/
        return view('accessories.edit', ['accessory' => $accessory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Accessory  $accessory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Accessory $accessory)
    {
        $updateAccessory = Accessory::where('id', $accessory->id)->update([
            'name' => $request->input('name'),
            'price' => $request->input('price')
        ]);

        if($updateAccessory){
            return redirect()->route('accessories.index')
            ->with('success', 'Accessory was updated successfully');
        }
        //redirect
        return back()->withInput('error', 'Accessory could not be updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Accessory  $accessory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accessory $accessory)
    {
        $findAccessory = Accessory::find($accessory->id);
        /*dump($findUser);
        die();*/
        if($findAccessory->delete()){
            return redirect()->route('accessories.index')->with('success', 'Accessory was deleted successfully');
        }
        //redirect
        return back()->withInput('error', 'Accessory could not be deleted');
    }
}
