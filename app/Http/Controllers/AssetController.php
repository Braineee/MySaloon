<?php

namespace App\Http\Controllers;

use App\Asset;
use Illuminate\Http\Request;
use App\Http\Requests\AssetsCreateRequest;
use App\Http\Requests\AssetsUpdateRequest;
use Illuminate\Support\Facades\Auth;

class AssetController extends Controller
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
            $assets = Asset::all();
            return view('assets.index', ['assets' => $assets]);
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
        return view('assets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AssetsCreateRequest $request)
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
                    $request->image->storeAs('assets', $newImageName);

                    /*dump($newImageName); 
                    die();*/
                    //store the data
                    $staff = Asset::create([
                        'ref_id' => $rand,
                        'name' => $request->input('name'),
                        'location' => $request->input('location'),
                        'status' => $request->input('status'),
                        'picture' => $newImageName
                    ]);
        
                    if($staff){
                        return redirect()->route('assets.index')
                        ->with('success','Asset was created successfully');
                    }else{
                        return back()->withInput()->with('error','Sorry, assets was not created');  
                    }

                }else{
                    return back()->withInput()->with('error','Please upload an image');
                }

            }else{
                return back()->withInput()->with('error','Validation error');
            }
            
        }
        return back()->withInput()->with('error','Sorry assets could not be created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function show(Asset $asset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function edit(Asset $asset)
    {
        $asset = Asset::find($asset->id);
        /*dump($asset);
        die();*/
        return view('assets.edit', ['asset' => $asset]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function update(AssetsUpdateRequest $request, Asset $asset)
    {
        $updateAsset = Asset::where('id', $asset->id)->update([
            'name' => $request->input('name'),
            'location' => $request->input('location'),
            'status' => $request->input('status')
        ]);

        if($updateAsset){
            return redirect()->route('assets.index')
            ->with('success', 'Asset was updated successfully');
        }
        //redirect
        return back()->withInput('error', 'Asset could not be updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asset $asset)
    {
        $findAsset = Asset::find($asset->id);
        /*dump($findUser);
        die();*/
        if($findAsset->delete()){
            return redirect()->route('assets.index')->with('success', 'Asset was deleted successfully');
        }
        //redirect
        return back()->withInput('error', 'Asset could not be deleted');
    }
}
