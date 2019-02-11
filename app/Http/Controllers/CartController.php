<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Product;


class CartController extends Controller
{
    public function addToCart(Request $request){
       $productQuantity = $request->qty;
        $productId = $request->productId;
//        return $productQuantity;
       $productById = Product::find($productId);

       Cart::add([
           'id' => $productId,
           'name' => $productById->productName,
           'price' => $productById->productPrice,
           'qty' => $productQuantity,

       ]);


       return redirect('/cart/show');

    }

    public function showCartProduct(){

       $cartProducts = Cart::content();
//          $totalCart =     Cart::subtotal();
//       echo '<pre>';
//       print_r($cartProducts);
//       exit();
        return view('frontEnd.cart.showCart',['cartProducts' => $cartProducts]);
//        return view('frontEnd.cart.showCart',['cartProducts' => $cartProducts, 'totalCart' => $totalCart]);

    }

    public function deleteCartProduct($id){
//        return $id;
        Cart::remove($id);
        return redirect('/cart/show')->with('status','Product item removed from cart successfully');
    }

    public function updateCartProduct(Request $request){
//        return $id;

        Cart::update($request->cartRowId, $request->qty);
        return redirect('/cart/show')->with('status','Product quantity updated into cart successfully');

    }
}
