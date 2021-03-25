<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $category=Category::orderBy('id','ASC')->get();
       return view('admin.category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
    {
        $parent =Category::all();
        return view('admin.category.add',compact('parent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
      
        if($request->hasFile('image'))
       {
        $image=$request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension(); 
        $image->move(public_path('images'), $imageName);
       }else{
            $imageName=null;
       }
       $title=$request->title;
       $url=preg_replace('/[^A-Za-z0-9]+/',' ',$title);
       $url=strtolower(trim($url));
       $url=str_replace(" ","-",$url);
    
       
 
        $category= Category::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'status'=>$request->status,
            'show_in_menu'=>$request->show_in_menu,
            'slug'=>$url,
            'image'=>$imageName,
            'parent_id'=>$request->parent_id,
        ]);
        toastr()->success('Category has been saved successfully!');

        return redirect()->route('category.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        
       return view('admin.category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $parent =Category::all();
       return view('admin.category.edit',compact('category','parent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $title=$request->title;
        $url=preg_replace('/[^A-Za-z0-9]+/',' ',$title);
        $url=strtolower(trim($url));
        $url=str_replace(" ","-",$url);
     
         $category= Category::create([
             'title'=>$request->title,
             'description'=>$request->description,
             'status'=>$request->status,
             'show_in_menu'=>$request->show_in_menu,
             'slug'=>$url,
             'image'=>$imageName,
             'parent_id'=>$request->parent_id,
         ]);
         if($request->hasFile('image'))
         {
          $image=$request->file('image');
          $imageName = time().'.'.$image->getClientOriginalExtension(); 
          $image->move(public_path('images'), $imageName);
          
          $oldFilename=$category->image;
          $category->image=$imageName;        
          File::delete(public_path('images/'. $oldFilename));
          $category->update([
              'image'=>$imageName,
          ]);
          
          }


         toastr()->success('Category has Update been saved successfully!');
 
         return redirect()->route('category.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }


}
