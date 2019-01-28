<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Manufacturer;
use App\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function createProduct(){
      $publishedCategories = Category::where('publicationStatus',1)->get();
      $publishedManufacturers = Manufacturer::where('publicationStatus',1)->get();

        return view('admin.product.createProduct',['publishedCategories' => $publishedCategories,'publishedManufacturers' => $publishedManufacturers]);
    }
    
        public function storeProduct(Request $request){
            
            $this->formValidation($request);
            $imageUrl = $this->productImageUpload($request);
            $this->saveProductBasicInfo($request, $imageUrl);
//            return $request->all();
            return redirect('/add-product')->with('status','Product Info saved successfully');
        }
//      store product  
        private function formValidation($request){
            $request->validate([
                'productName' => 'required',
                'productPrice' => 'required',
                'productImage' => 'required',
                
            ]);
        }
        
        private function productImageUpload($request){
            
          $productImage = $request->file('productImage');
          $imageName = $productImage->getClientOriginalName();
          $uploadPath = 'productImage/';
          $productImage->move($uploadPath,$imageName);
          $imageUrl = $uploadPath . $imageName;
          return $imageUrl;
          
        }
        
        
        private function saveProductBasicInfo($request,$imageUrl){
            
            $product = new Product();
            $product->productName = $request->productName;
            $product->categoryId = $request->categoryId;
            $product->manufacturerId = $request->manufacturerId;
            $product->productPrice = $request->productPrice;
            $product->productQuantity = $request->productQuantity;
            $product->productShortDescription = $request->productShortDescription;
            $product->productLongDescription = $request->productLongDescription;
            $product->productImage = $imageUrl;
            $product->publicationStatus = $request->publicationStatus;
            $product->save();
            
            
            
        }
//        store end
        public function manageProduct(){
            
          $products = DB::table('products')
                ->join('categories', 'categories.id', '=', 'products.categoryId')
                ->join('manufacturers', 'manufacturers.id', '=', 'products.manufacturerId')
                 ->select('products.id','products.productName','products.productPrice','products.productQuantity','products.publicationStatus', 'categories.categoryName', 'manufacturers.manufacturerName')
                 ->get();
            
//            echo '<pre>';
//            echo $productInfo;

//            print_r($productInfo);
//            return $productInfo;
//            exit();
            return view('admin.product.manageProduct',['pros' => $products]);
                    
                    
        }        
        
        
        
        public function viewProduct($id){
            
       $product = DB::table('products')
                ->join('categories', 'categories.id', '=', 'products.categoryId')
                ->join('manufacturers', 'manufacturers.id', '=', 'products.manufacturerId')
                ->select('products.*', 'categories.categoryName', 'manufacturers.manufacturerName')
                ->where('products.id',$id)
                ->first();
       
//       
//       echo '<pre>';
//       print_r($product);
//       exit();
     return view('admin.product.viewProduct',['product' => $product]);

        }
        
        public function editProduct($id){
          $product = DB::table('products')
//                ->join('categories','categories.id','=','products.categoryId')
//                ->join('manufacturers','manufacturers.id','=','products.manufacturerId')
//                 ->select('products.*','categories.categoryName','manufacturers.manufacturerName')
                  ->where('products.id',$id)
                   ->first();
          // aikahne bojha lagbe....
//          echo '<pre>';
//          print_r($product);
//          exit();
         $pubCategories = Category::where('publicationStatus',1)->get();
         $pubManufacturers = Manufacturer::where('publicationStatus',1)->get();
            
            return view('admin.product.editProduct',['product'=>$product, 'pubCategories' => $pubCategories, 'pubManufacturers' => $pubManufacturers]);
            
        }
        
        
        public function updateProduct(Request $request){
            $this->productUpdateValidation($request);
          $imageUrl = $this->imageUpload($request);
          $this->updateProductInfo($request,$imageUrl);
          
         
          return redirect('/manage-product')->with('status','Product Info updated successfully');
          
        }
        
        private function productUpdateValidation($request){
            $request->validate([
               
                'categoryId' => 'required',
                'manufacturerId' => 'required',
                'productImage' => 'required'
               
            ] );
        }

                private function imageUpload($request){
          $productImage = $request->file('productImage');
            $imageName = $productImage->getClientOriginalName($productImage);
            $uploadPath = 'productImage/';
            $productImage->move($uploadPath,$imageName);
            $imageUrl = $uploadPath . $imageName;
            return $imageUrl;
            
        }
        
        private function updateProductInfo($request,$imageUrl){
            
           $product = Product::find($request->productId);
             $product->productName = $request->productName;
            $product->categoryId = $request->categoryId;
            $product->manufacturerId = $request->manufacturerId;
            $product->productPrice = $request->productPrice;
            $product->productQuantity = $request->productQuantity;
            $product->productShortDescription = $request->productShortDescription;
            $product->productLongDescription = $request->productLongDescription;
            $product->productImage = $imageUrl;
            $product->publicationStatus = $request->publicationStatus;
            $product->save();
            
        }
        
//        update end
        public function deleteProduct($id){
            
           $product = Product::find($id);
           $product->delete();
           return redirect('/manage-product')->with('status','Product Info deleted successfully');
           
            
        }
        
        
        
}
