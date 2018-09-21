<?php

namespace App\Http\Controllers;

use App\subCategory;
use App\category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'name' =>'required',
            'parent'=>'required'
        ]);

        $SubCategory = new SubCategory ;
        $SubCategory->name = $request->input('name');
        $SubCategory->category_id = $request->input('parent');
        $SubCategory->save();
        return back()->with('success','subCategory created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\subCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subCategories = subCategory::find($id);


        $products =  subCategory::find($id)->products;
        //dd($products);
        return view('admin.category.subCategories.show',compact('subCategories','products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\subCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $subCategory = subCategory::find($id);
        //dd($category);

       $category = category::where('parent_id','>','0')->get();
       $main = category::where('parent_id','0')->get(); 
        return view('admin.category..subCategories.edit',compact('subCategory','main','category')) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\subCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' =>'required',
            'parent'=>'required'
        ]);

        $SubCategory =  SubCategory::find($id) ;
        $SubCategory->name = $request->input('name');
        $SubCategory->category_id = $request->input('parent');
        $SubCategory->update();
        return back()->with('success','subCategory updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\subCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = subCategory::find($id);

        $category->delete();
        return redirect('/admin')->with('success','subCategory deleted successfully');;
    }
}
