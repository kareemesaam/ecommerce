<?php

namespace App\Http\Controllers;

use App\product;
use App\category;
use App\subCategory;
use App\productImage;
use Image;
use Illuminate\Http\Request;

class ProductController extends Controller
{


    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = product::all();
         $categories = category::all();
        
        return view('admin.product.index',compact('products','categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::where('parent_id','0')->get();
        
       
        return view('admin.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|min:4|max:40',
            'desc'          => 'required|min:4',
            'price'         =>'required',
            'size'         =>'required',
            'category'   =>'required|integer',
            'photo.*'         =>'image|mimes:jpeg,png,jpng,jpg|max:23222'

        ]);

        
       $product = new product();
        $product->name = $request->input('name');
        $product->desc = $request->input('desc');
        $product->price = $request->input('price');
        $product->size = $request->input('size');
        $product->sub_category_id = $request->input('category');       
        $product->save();

        
        if ($request->hasfile('photo')) {
            $photos = $request->photo ;

            foreach ($photos as $photo) {

                $filename= time().'_'.$photo->getClientOriginalName();
                $location = public_path('image/product/'.$filename);
                image::make($photo)->resize(253,338)->save($location);
                $productImage = new productImage;
                $productImage->image = $filename;
                $productImage->product_id = $product->id;
                $productImage->save();
            }
        }else{
            $photo = 'default.png';
             $location = public_path('image/product/'.$photo);
             $img = Image::make($location)->resize(253,338);
                $productImage = new productImage;
                $productImage->image = $photo;
                $productImage->product_id = $product->id;
                $productImage->save();

        }
        return redirect('/product')->with('success','product created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = product::find($id);
        $category = category::where('parent_id','>','0')->get();
        $categories = category::where('parent_id','0')->get();
        return view('admin.product.edit',compact('product','category','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'          => 'required|min:4|max:15',
            'desc'          => 'required|min:4',
            'price'         =>'required',
            'size'         =>'required',
            'category'   =>'required',
            'photo.*'         =>'image|mimes:jpeg,png,jpng|max:23222'

        ]);

        
       $product =  product::find($id);
        $product->name = $request->input('name');
        $product->desc = $request->input('desc');
        $product->price = $request->input('price');
        $product->size = $request->input('size');
        $product->sub_category_id = $request->input('category');       
        $product->update();
       
        if ($request->hasfile('photo')) {
            $photos = $request->photo ;

            foreach ($photos as $photo) {

                $filename= time().'_'.$photo->getClientOriginalName();
                $location = public_path('image/product/'.$filename);
                image::make($photo)->resize(253,338)->save($location);
                $productImage = new productImage;
                $productImage->image = $filename;
                $productImage->product_id = $product->id;
                $productImage->save();
            }
        }
        return redirect('/product')->with('success','product updated successfully');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = product::find($id);
        $product->delete();
        return redirect('/product')->with('success','product deleted successfully');
    }
}
