<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\product\ProductResource;
use App\Http\Resources\product\ProductCollection;
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
        $this->middleware('auth:api')->except('index','show');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = product::all();
        if(count($product)>0){
            return ProductCollection::collection($product); 
        }
        else{
            return response()->json('No Product to show',404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
       
        $product = new product();
        $product->name = $request->name;
        $product->desc = $request->desc;
        $product->price = $request->price;
        $product->size = $request->size;
        $product->sub_category_id = $request->category;       
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
        return Response(['data' => new ProductCollection($product)],201) ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

         $Product = product::find($id);

        if(isset($Product)){
            return new ProductResource($Product);
        }
        else{
            return response()->json('Product Not Found',404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request,$id)
    {  
        $Product = product::find($id);

        if(isset($Product)){
            // $Product->update($request->all());

                $Product->name = $request->name;
                $Product->desc = $request->desc;
                $Product->price = $request->price;
                $Product->size = $request->size;
                $Product->sub_category_id = $request->category;       
                $Product->update();
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
                return Response(['data' => new ProductResource($Product)],200);
                }
            else{
                return response()->json('Product Not Found',404);
            }
    }
    
       
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $Product = product::find($id);

        if(isset($Product)){
            $Product->delete();
            return response()->json('product deleted successfully',200);
        }
        else{
            return response()->json('Product Not Found',404);
        }
    }
}
