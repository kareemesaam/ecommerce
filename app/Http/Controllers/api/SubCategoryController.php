<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;

use App\category;
use App\product;
use App\subCategory;
use Illuminate\Http\Request;
use App\Http\Resources\subcategory\SubCategoryResource;
use App\Http\Resources\subcategory\SubCategoryCollection;
use App\Http\Requests\CategoryRequest;
class SubCategoryController extends Controller
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
        $categories = subCategory::all();


        if(count($categories)>0){
            return  SubCategoryCollection::collection($categories); 
        }
        else{
            return response()->json('No categories to show',404);
        }

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
            'name' =>'required|string',
            'category'=>'required|integer'
        ]);
        $category = new subCategory ;
        $category->name = $request->name;
        
        $category->category_id = $request->category;
        $category->save();
        return Response(['data' => new SubCategoryCollection($category)],201) ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $category = subCategory::find($id);
         if(isset($category)){
            
            return new SubCategoryResource($category); 
        }
        else{
            return response()->json('No categories to show',404);
        }
       
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' =>'required|string',
            'category'=>'required|integer'
        ]);
        $category = subCategory::find($id);
        if (isset($category)) {
            $category->name = $request->name;
            $category->category_id = $request->category;
            $category->update();
           return Response(['data' => new SubCategoryResource($category)],200);
        }
        
                
        else{
            return response()->json('Product Not Found',404);
        }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = subCategory::find($id);
         if(isset($category)){
            $category->delete();
            return response()->json('category deleted successfully',200);
        }
        else{
            return response()->json('category Not Found',404);
        }
    }
}
 