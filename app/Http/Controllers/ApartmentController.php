<?php

namespace App\Http\Controllers;

use App\Models\apartment;
use App\Models\User;
use App\Models\dzongkhag;
use App\Models\gewog;
use App\Models\booking;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Pagination\Paginator;
use DB;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
       
        return view('Owner.ownerdashboard');
    }
    public function index(){
        $dzongkhag = DB::table('dzongkhags')->get();
        $gewog=DB::table('gewogs')->get();
        return view('Owner.apartment',compact('gewog','dzongkhag'));
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
        $this->validate($request, [
            'filenames' => 'required',
            'filenames.*' => 'mimes:mimes:jpeg,png,jpg|max:2048'
    ]);


    if($request->hasfile('filenames'))
     {
        foreach($request->file('filenames') as $image)
        {
            $name = $image->getClientOriginalName();

            $image->move(public_path().'/files/', $name);  
            @unlink(public_path('/files/'.$data->filenames));
            $data[] = $name;  
        }
     }
     
    $apartment= new apartment();
    $apartment ->ApartmentType= $request -> ApartmentType;
    $apartment ->NameofApartment= $request -> NameofApartment;
    $apartment ->RentRange= $request -> RentRange;
    $apartment ->Location= $request -> Location;
    $apartment ->parkinglot= $request -> parkinglot;
    $apartment ->dzongkhag_id= $request -> dzongkhag_id;
    $apartment ->gewog_id= $request -> gewog_id;
    $apartment ->Latitude= $request -> Latitude;
    $apartment -> Longitude  = $request -> Longitude ;
    $apartment->filenames=json_encode($data);
    $apartment-> users_id= Auth::User()->id;
    $apartment->save();
    return redirect('Owner.viewapartment')->with('message', 'You have successfully added!');
    }

        
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(apartment $apprt)
    {
        $apartment = $apprt::where('users_id',Auth::user()->id)->get();
        return view('Owner.viewapartment',['apartment'=>$apartment]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $apartment = apartment::findOrFail($id);
        return view('Owner.edit')->with('apartment',$apartment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, apartment $apartment, $id)
    {
        $apartment = apartment::findOrFail($id);
        $apartment -> ApartmentType= $request->input('ApartmentType');
        $apartment -> NameofApartment= $request->input('NameofApartment');
        $apartment -> RentRange= $request->input('RentRange');
        $apartment -> Location= $request->input('Location');
        $apartment -> parkinglot= $request->input('parkinglot');
        $apartment -> Dzongkhag= $request->input('Dzongkhag');
        $apartment -> Gewog= $request->input('Gewog');
        $apartment -> Latitude= $request->input('Latitude');
        $apartment ->  Longitude = $request->input('Longitude');

        $apartment->update();
        return redirect('Owner.viewapartment')->with('message','data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function destory(Request $request, $id)
    {
        DB::delete('delete from apartments where id = ?',[$id]);
        return redirect('Owner.viewapartment')->with('message','data deleted successfully');
    }
   
}
