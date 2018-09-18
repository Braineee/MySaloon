<?php

namespace App\Http\Controllers;

use App\style;
use App\Service;
use Illuminate\Http\Request;
use App\Http\Requests\StyleCreateRequest;
use App\Http\Requests\StyleUpdateRequest;
use Illuminate\Support\Facades\Auth;

class StyleController extends Controller
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
            $styles = Style::all();
            return view('styles.index', ['styles' => $styles]);
        }

        return view('auth.login');
    }

    
    /**
     * Show styles to customers.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewstyle()
    {
        if(Auth::check()){ 
            //get the list of assets 
            $service = Service::find(1);
            $styles = Style::all();
            return view('viewstyle', ['styles' => $styles, 'services' => $service]);
        }

        return view('auth.login');
    }



    /**
     * Show styles to customers.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $search)
    {
        if(Auth::check()){ 
            //get the list of assets 
            $service = Service::find(1);
            $styles = Style::whereIn('sex', $search)->get();
            return view('viewstyle', ['styles' => $styles, 'services' => $service]);
        }

        return view('auth.login');
    }



    /**
     * Show styles to customers.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function book(Request $request)
    {
        if(Auth::check()){ 
            //get the list of assets 
            $style = Style::find($request->input('book'));
            $services = Service::all();
            return view('book', ['style' => $style, 'services' => $services]);
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
        return view('styles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StyleCreateRequest $request)
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
                    $request->image->storeAs('styles', $newImageName);

                    /*dump($newImageName); 
                    die();*/
                    //store the data
                    $style = Style::create([
                        'name' => $request->input('name'),
                        'sex' => $request->input('sex'),
                        'duration' => $request->input('duration'),
                        'price' => $request->input('price'),
                        'picture' => $newImageName
                    ]);
        
                    if($style){
                        return redirect()->route('styles.index')
                        ->with('success','Style was created successfully');
                    }else{
                        return back()->withInput()->with('error','Sorry, Style was not created');  
                    }

                }else{
                    return back()->withInput()->with('error','Style upload an image');
                }

            }else{
                return back()->withInput()->with('error','Validation error');
            }
            
        }
        return back()->withInput()->with('error','Sorry Style could not be created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\style  $style
     * @return \Illuminate\Http\Response
     */
    public function show(style $style)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\style  $style
     * @return \Illuminate\Http\Response
     */
    public function edit(style $style)
    {
        $style = Style::find($style->id);
        /*dump($accessory);
        die();*/
        return view('styles.edit', ['style' => $style]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\style  $style
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, style $style)
    {
        $updateStyle = Style::where('id', $style->id)->update([
            'name' => $request->input('name'),
            'sex' => $request->input('sex'),
            'duration' => $request->input('duration'),
            'price' => $request->input('price'),
        ]);

        if($updateStyle){
            return redirect()->route('styles.index')
            ->with('success', 'Style was updated successfully');
        }
        //redirect
        return back()->withInput('error', 'Style could not be updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\style  $style
     * @return \Illuminate\Http\Response
     */
    public function destroy(style $style)
    {
        $findStyle = Style::find($style->id);
        if($findStyle->delete()){
            return redirect()->route('styles.index')->with('success', 'Style was deleted successfully');
        }
        //redirect
        return back()->withInput('error', 'Style could not be deleted');
    }
}
