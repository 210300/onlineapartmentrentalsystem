<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\apartment;
use App\Models\booking;
use DB;
use Auth;
use App\Http\Requests\UpdateBookingRequest;

class OwnerBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $bookings =DB::table('bookings')->where('user_id',Auth::user()->id)->get();
        return view('Owner.booking.index',compact('bookings'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking,$id)
    {
        $booking=booking::findOrFail($id);
        return view('Owner.booking.show',compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking,$id)
    {
        $booking = booking::find($id);
        return view('Owner.booking.edit',compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateBookingRequest $request, Booking $booking,$id)
    {
        $booking=booking::findOrFail($id);
        $booking ->update([
            'start_date' =>$request->start_date,
            'end_date' =>$request->end_date,
            'is_active' =>(int)$request->get('is_active'),
            'user_id' =>$request->user_id,
            'apartment_id' =>$request->apartment_id,
        ]);
       
        return redirect('viewBookings')->with('message','Activated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from bookings where id = ?',[$id]);
        return redirect('viewBookings')->with('message','data deleted successfully');
    }
}
