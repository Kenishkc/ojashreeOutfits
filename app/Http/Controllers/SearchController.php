<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Helper;

class SearchController extends Controller
{
   public function search(Request $request){
        
     $search = $request->search;

      if($search == ''){
         $autocomplate = Product::orderby('name','asc')->select('id','name')->limit(5)->get();
      }else{
         $autocomplate = Product::orderby('name','asc')->select('id','name')->where('name', 'like', '%' .$search . '%')->limit(5)->get();
      }

      $response = array();
      foreach($autocomplate as $autocomplate){
         $response[] = array("value"=>$autocomplate->id,
         "label"=>$autocomplate->name,
         "img"=>$autocomplate->detail);
      }

      echo json_encode($response);
      exit;
   }
    public function imageSearch(Request $request)
    {
        $search=  $request->term;
        
        $posts = Product::where('name','LIKE',"%{$search}%")
                       ->orderBy('created_at','DESC')->limit(5)->get();

        if(!$posts->isEmpty())
        {
            foreach($posts as $post)
            {
                
                $new_row['title']= $post->name;
	            $new_row['image']= Helper::catch_first_image($post->previewImage());
                
                $row_set[] = $new_row; //build an array
            }
        }
        
        echo json_encode($row_set); 
    }



    
}
