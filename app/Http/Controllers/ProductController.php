<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreValidation;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    function __construct()

    {

         $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);

    }
    
    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('admin.products.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::all();
        return view('admin.products.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
            'price'=>'required',
            'manuf_date'=>'required',
            'discount_price'=>'required',
            'short_detail'=>'required',
            'stock'=>'required',         
        ]);
        
        $products = new Product();
        $products->name=$request->name;
        $name = $request->name;
        // for slug
        $url=preg_replace('/[^A-Za-z0-9]+/',' ', $name);
        $url=strtolower(trim($url));
        $url=str_replace(" ","-",$url);

         $products->price=$request->price;
        $products->manuf_date=$request->manuf_date; 
        $products->discount_price=$request->discount_price;
        $products->detail=$request->detail;
        $products->short_detail=$request->short_detail;
        $products->stock=$request->stock;
        $products->cat_id=$request->cat_id;
        $products->slug=$url;
        $products->save();
       

        //for image


        if ($request->hasFile('images')) {
            foreach($request->file('images') as $image)
            {
               
            $imageName=time().'.'.$image->getClientOriginalName();
            $destinationPath = public_path('images/medium');

                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 666, true);
                }
                $img = Image::make($image->path());
                $img->resize(250, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$imageName);
        

                $destinationPath = public_path('images/thumbnail');
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 666, true);
                }
            
                $img->resize(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$imageName);
            
        
                $destinationPath = public_path('images/large');
                $image->move($destinationPath, $imageName);
            
             ProductImage::Create([
                 'product_id'=>$products->id,
                 'images'=> $imageName,
             ]);
            }

        }
        

        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $images = Image::where('product_id', $id)->get();
        return view('admin.products.show',compact('product','images'));
    }

    public function productDetail($id){

        $product=Product::where('id',$id)->first();
        return view('user-pages.product-details',compact('product'));


    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product )
    {  
        return view('admin.products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        request()->validate([

            'name' => 'required',

            'detail' => 'required',
            'price'=>'required',
            'manuf_date'=>'required',
            'discount_price'=>'required',
            'short_detail'=>'required',
            'stock'=>'required',
            

        ]);
       
        
        $product->update($request->all());
        return redirect()->route('products.index')

                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyImg($id ) {

        $images = Image::findOrFail($id);
        $images->delete();

        // $images = Image::find($request->product_id)->where("id",$images->imageName);
        // unlink("images/".$image->imageName);

        // Image::where("product_id", $products->id)->delete();

        return back()->with("success", "Image deleted successfully.");

    }

}
    
