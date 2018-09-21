<?php

namespace App\Http\Controllers;

use App\category;
use App\product;
use App\subCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        // $categories = category::all()->groupBy('parent_id');
        // dd($categories);
     //    $categories = category::where('parent_id','0')->get();
     // view('admin.layout.element.sidbar',compact('categories'));
     // return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $categories = category::where('parent_id','0')->pluck('name','id');
       $categories->put('0','main categpry');

       $category = category::where('parent_id','>','0')->get();
       $main = category::where('parent_id','0')->get(); 
        return view('admin.category.create',compact('categories','main','category')) ;
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
            'name' =>'required'
        ]);
        $category = new category ;
        $category->name = $request->input('name');
        $category->parent_id = $request->input('parent');
        $category->save();
        return back()->with('success','category created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $category = category::find($id);
       $childCategory = category::where('parent_id',$id)->get();
        //$subCategories = $childCategory->subCategories;
      
      //  $categories = category::where('parent_id','0')->get();
        return view('admin.category.show',compact('childCategory','subCategories','category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = category::find($id);
        //dd($category);
        $categories = category::where('parent_id','0')->pluck('name','id');
        $categories->put('0','main category');
        return view('admin.category.edit',compact('categories','category')) ;
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
            'name' =>'required'
        ]);
        $category = category::find($id);
        $category->name = $request->input('name');
        $category->parent_id = $request->input('parent');
        $category->save();
        return back()->with('success','category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = category::find($id);
        $category->delete();
        return back()->with('success','Category deleted successfully');;
    }
}
 