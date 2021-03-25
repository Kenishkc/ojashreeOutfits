<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreValidation;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

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
        return view('admin.products.create');
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
        $product = new Product();
        $product->name=$request->name;
        $name = $request->name;
        // for slug
        $url=preg_replace('/[^A-Za-z0-9]+/',' ', $name);
        $url=strtolower(trim($url));
        $url=str_replace(" ","-",$url);

        $product->price=$request->price;
        $product->manuf_date=$request->manuf_date; 
        $product->discount_price=$request->discount_price;
        $product->detail=$request->detail;
        $product->short_detail=$request->short_detail;
        $product->stock=$request->stock;
        $product->slug=$url;
        $product->save();
       

        //for image 

        if ($request->hasFile('images')) {
            foreach($request->file('images') as $image)
            {
            $imageName=time().'.'.$image->getClientOriginalName();
            $image->move(public_path('images'),$imageName);
    
             Image::Create([
                 'product_id'=>$product->id,
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
    public function show(Product $product)
    {
        return view('admin.products.show',compact('product'));
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
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    
                    }

                    // public function viewImage($id) {
                    //     $products = Product::findOrFail($id);
                    //     $images = Image::where('product_id', $id)->get();
                    //     return view('product.viewimage',compact('products', 'images'));
                    
                    // }
}
    
