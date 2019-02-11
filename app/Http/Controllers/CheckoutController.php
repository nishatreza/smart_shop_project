<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Illuminate\Support\Facades\Hash;
use Session;
use App\shipping;

class CheckoutController extends Controller
{
    public function index(){
        return view('frontEnd.checkout.showcheckoutForm');

    }

    public function customerRegister(Request $request){

        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'emailAddress' => 'required',
            'password' => 'required',
            'address' => 'required',
            'phoneNumber' => 'required',
            'districtName' => 'required',

        ]);



          $customer = new Customer();
        $customer->firstName = $request->firstName;
        $customer->lastName = $request->lastName;
        $customer->emailAddress = $request->emailAddress;
//        $customer->password = $request->password = bcrypt('secret');
        //        $customer->password = bcrypt($request->password);
        $customer->password = $request->password = Hash::make('secret');
        $customer->address = $request->address;
        $customer->phoneNumber = $request->phoneNumber;
        $customer->districtName = $request->districtName;
        $customer->save();
//       $customerId = $customer->id;
       Session::put('customerId', $customer->id);
       return redirect('/shipping-info');




//        echo '<pre>';
//        print_r($customer);
//return $customer;
//exit();
//        return redirect('/checkout/index')->with('status','Registration successful');

    }

    public function showShippingForm(){
       $customerId = Session::get('customerId');
        $customerById =   Customer::find($customerId);
        return view('frontEnd.checkout.showShippingForm',['customerById' => $customerById]);


    }

    public function saveShippingInfo(Request $request){
        $shipping = new shipping();
        $shipping->fullName = $request->fullName;
        $shipping->emailAddress = $request->emailAddress;
        $shipping->address = $request->address;
        $shipping->phoneNumber = $request->phoneNumber;
        $shipping->districtName = $request->districtName;
        $shipping->save();

        Session::put('shippingId', $shipping->id);
        return redirect('/payment-info');
    }

    public function showPaymentForm(){

        return view('frontEnd.checkout.showPaymentForm');

    }


    public function customerLogin(Request $request){
        $request->validate([

            'emailAddress' => 'required',
            'password' => 'required',


        ]);
//        $customer = new Customer();
//        $customer->emailAddress = $request->emailAddress;
//        $customer->password = $request->password = Hash::make('secret');
//        $customer->save();
//        echo '<pre>';
//        print_r($customer);
//return $customer;
//exit();
        return redirect('/checkout/index')->with('status','Login successful');


    }


}
