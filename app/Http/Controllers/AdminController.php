<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
 
public function adminpage(){

    return view('admin.index');
}


public function addUsers(){
  
    return view('admin.add-users');

}

public function StoreUsers(Request $request){
    $validatedData = $request->validate([
        'photo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
  
       ]);
       if($request->hasFile('photo'))
       {
        $image=$request->file('photo');
        $imageName = time().'.'.$image->getClientOriginalExtension(); 
        $image->move(public_path('images'), $imageName);
       }else{
            $imageName=null;

       }

    

//     $user=new User();
// $user->name=$request->name;
// $user->phone=$request->phone;
// $user->email=$request->email;
// $user->password= Hash::make($request->password);
// $user->photo=$imageName;
// $user->save();
$user=User::create([
    'name'=>$request->name,
    'phone'=>$request->phone,
    'email'=>$request->email,
    'password'=>Hash::make($request->password),
    'photo'=>$imageName,
]);



return back()->with('user_created','users has created sucessfully');
}


public function getUsers(){

    $user=User::orderBy('id','ASC')->get();
    return view('admin.show-users',compact('user'));

}
public function getSingleUser($id)
{
    $user=User::where('id',$id)->first();
    return view('admin.single',compact('user'));
}


}
