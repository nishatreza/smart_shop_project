<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCategory()
    {
        return view('admin.category.createCategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCategory(Request $request)
    {
        
//        for validation
//        $this->validate($request, [
//            'categoryName' => 'required',
//        ]);
                
                   $request->validate([
            'categoryName' => 'required' ,
            'categoryDescription' => 'required',
            'publicationStatus' => 'required',

        ]);

        
        
        
//        return $request->all();    
        
//        one way
//        $category = new Category();
//        $category->categoryName = $request->categoryName;
//        $category->categoryDescription = $request->categoryDescription;
//        $category->publicationStatus = $request->publicationStatus;
//        $category->save();     
//        return 'Category Info saved successfully';
//        
//        other way eloquent
//        
//        
//        Category::create($request->all());
//        return 'Category Info saved successfully';

        
        
//        query builder way
        
        DB::table('categories')->insert([
                    'categoryName' => $request->categoryName,
                   'categoryDescription' => $request->categoryDescription,
                   'publicationStatus' => $request->publicationStatus,

                    ] );
      return redirect('/add-category')->with('status','Category Info saved successfully');
//                return 'Category Info saved successfully';

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function manageCategory()
    {
        
      $categories = Category::all();
        return view('admin.category.manageCategory',['cats'=> $categories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editCategory($id)
    {
//        return $id;
        
              $category = Category::where('id',$id)->first();
//              return $category;

        return view('admin.category.editCategory',['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateCategory(Request $request)
    {
//      $category = Category::find($request->categoryId)->first();
        // akhane find holo 1st a niye jabe oi id ar rowke edit kore...
       $category = Category::find($request->categoryId);
      $category->categoryName = $request->categoryName;
      $category->categoryDescription = $request->categoryDescription;
      $category->publicationStatus = $request->publicationStatus;
      $category->save();
      
      
      return redirect('/manage-category')->with('message','Category Info updated successfully');
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteCategory($id)
    {
//          $category = Category::find($id)->first();
           $category = Category::find($id);
          $category->delete();
      
      
      return redirect('/manage-category')->with('message','Category Info deleted successfully');
      
    }
}
