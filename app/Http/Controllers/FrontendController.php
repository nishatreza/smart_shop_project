<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\slider;
class FrontendController extends Controller
{
    //
    public function index(){
        
      $publishedProducts = Product::where('publicationStatus',1)->get();
      $publishedSliders = slider::where('publicationStatus',1)->get();
//          echo '<pre>';
//        print_r($publishedSliders);
//        exit();

    	return view('frontEnd.home.home_content',['publishedProducts' =>$publishedProducts,'publishedSliders'=>$publishedSliders]);
   
        
        
    }
    public function category($id){
        
     $publishedCategoryProducts =  Product::where('categoryId',$id)
                ->where('publicationStatus',1)
                ->get();
                
                
        return view('frontEnd.category.category_content',['publishedCategoryProducts'=>$publishedCategoryProducts]);
        // return 'hello';
    }

}
