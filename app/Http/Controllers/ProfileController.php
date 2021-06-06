<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(!is_null(Auth::user()->profile)){
            $profile=Auth::user()->profile;
            $user_id=Auth::user()->id;
            $order=Order::where('user_id',$user_id)->get();
           return view('user-pages.profile.profile',compact('profile','order'));
        }else{
          return view('user-pages.profile.addprofile');
        }
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
         $validated = $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'address'=>'required',
            'phone_number'=>'required',
            'email'=>'required|email',
            'profile_picture'=>'required',
            
            
        ]);
        $user_id=Auth::user()->id;
        if($request->hasFile('profile_picture'))
       {
        $image=$request->file('profile_picture');
        $imageName = time().'.'.$image->getClientOriginalExtension(); 
        $image->move(public_path('profile_picture'), $imageName);
       }else{
            $imageName=null;
       }
        
        Profile::create([
            'user_id'=>$user_id,
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'address'=>$request->address,
            'phone_number'=>$request->phone_number,
            'profile_picture'=>$imageName,
            'email'=>$request->email,
            'nick_name'=>$request->nick_name,
            'location_area'=>$request->location_area,
            'facebook'=>$request->facebook,
            'viber'=>$request->viber,

        ]);
          toastr()->success('Thankyou Your Profile is Created');
               return redirect()->route('profile.index');   
       

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            $profile=Auth::user()->profile;
            $order=Order::FindOrFail($id);
           return view('user-pages.profile.profile-order-detail',compact('profile','order'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile=Profile::findOrFail($id);
        return view('user-pages.profile.edit-profile',compact('profile'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $profile=Profile::findOrFail($id);
         $profile->update($request->all());
        toastr()->success('Your Profile is Update! Thankyou ');
            
        return redirect()->route('profile.index');   

    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
