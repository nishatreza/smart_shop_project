<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Payment;
use App\OrderDetails;
use Session;
use Cart;
use DB;

class OrderController extends Controller
{
    public function confirmOrderInfo(Request $request){
        $paymentType =    $request->paymentType;
//           echo $paymentType;


        if($paymentType == 'cashOnDelivery'){

           $order = new Order();
            $order->customerId = Session::get('customerId');
            $order->shippingId = Session::get('shippingId');
            $order->orderTotal = Session::get('orderTotal');
            $order->save();
          Session::put('orderId',$order->id);


          $payment = new Payment();
            $payment->orderId = Session::get('orderId');
            $payment->paymentType =  $request->paymentType;
            $payment->save();



           $cartProducts =  Cart::content();
           foreach($cartProducts as $cartProduct){
               $orderDetails = new OrderDetails();
               $orderDetails->orderId = Session::get('orderId');
               $orderDetails->productId = $cartProduct->id;
               $orderDetails->productName = $cartProduct->name;
               $orderDetails->productPrice = $cartProduct->price;
               $orderDetails->productQuantity = $cartProduct->qty;
               $orderDetails->save();
           }

        return redirect('/my-home');

        }else if($paymentType == 'paypal'){


        }else if($paymentType == 'bkash'){


        }

    }

    public function customerHome(){
        return view('frontEnd.checkout.customerHome');


    }

    public function manageOrder(){

        $orders = DB::table('orders')
            ->join('payments', 'payments.orderId', '=', 'orders.id')
            ->join('order_details', 'order_details.orderId', '=', 'orders.id')
            ->join('customers', 'customers.id', '=', 'orders.customerId')
            ->select('orders.*', 'payments.*', 'order_details.*', 'customers.firstName','customers.lastName')
            ->get();
//        echo '<pre>';
//        print_r($orders);
//        exit();

        return view('admin.order.viewOrder',['orders' => $orders]);

    }
}
