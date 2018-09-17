<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use App\Http\Requests\ServiceCreateRequest;
use App\Http\Requests\ServiceUpdateRequest;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
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
            $services = Service::all();
            return view('services.index', ['services' => $services]);
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
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceCreateRequest $request)
    {
        if(Auth::check()){
        
            $validated = $request->validated(); //validate the users input

            if($validated){
            
                $services = Service::create([
                    'service_type' => $request->input('service_type'),
                    'service_percentage' => $request->input('service_percentage'),
                ]);
    
                if($services){
                    return redirect()->route('services.index')
                    ->with('success','Service was created successfully');
                }else{
                    return back()->withInput()->with('error','Sorry, Service was not created');  
                }

            }else{
                return back()->withInput()->with('error','Validation error');
            }
            
        }
        return back()->withInput()->with('error','Sorry Service could not be created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $service = Service::find($service->id);
        return view('services.edit', ['service' => $service]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $updateService = Service::where('id', $service->id)->update([
            'service_type' => $request->input('service_type'),
            'service_percentage' => $request->input('service_percentage'),
        ]);

        if($updateStyle){
            return redirect()->route('services.index')
            ->with('success', 'Service was updated successfully');
        }
        //redirect
        return back()->withInput('error', 'Service could not be updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $findService = Service::find($service->id);
        if($findService->delete()){
            return redirect()->route('services.index')->with('success', 'Service was deleted successfully');
        }
        //redirect
        return back()->withInput('error', 'Service could not be deleted');
    }
}
