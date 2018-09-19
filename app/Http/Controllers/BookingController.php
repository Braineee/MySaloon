<?php

namespace App\Http\Controllers;

use DB;
use App\Booking;
use Illuminate\Http\Request;
use App\Http\Requests\BookingRequest;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            //dump(Auth::user()->id); 
                
            $bookings = Booking::all();

            $bookings = DB::table('bookings')
            ->join('users', 'bookings.customer_id', '=', 'users.id')
            ->join('services', 'bookings.service_type_id', '=', 'services.id')
            ->join('styles', 'bookings.style_id', '=', 'styles.id')
            ->select('bookings.*', 'services.service_type', 'styles.name AS style_name', 'users.name')
            ->get();

            return view('bookings.index', ['bookings' => $bookings]);

            dump($bookings);
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingRequest $request)
    {
        if(Auth::check()){
        
            $validated = $request->validated(); //validate the users input

            if($validated){
            
                //store the data
                $book = Booking::create([
                    'customer_id' => Auth::user()->id,
                    'service_type_id' => $request->input('service'),
                    'style_id' => $request->input('style'),
                    'session' => $request->input('session')
                ]);
    
                if($book){
                    return redirect()->route('viewstyle')
                    ->with('success','Booking was created successfully');
                }else{
                    return back()->withInput()->with('error','Sorry, Booking was not created');  
                }


            }else{
                return back()->withInput()->with('error','Validation error');
            }
            
        }
        return back()->withInput()->with('error','Sorry Booking could not be created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
