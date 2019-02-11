@extends('frontEnd.master')

@section('title')
    Cart view
@endsection

@section('body')

   {{--cart show--}}

   <!-- check out -->
   <div class="checkout">
       <div class="container">
           <h3>My Cart</h3>
           <span><h5 class="text-blue">{{Session::get('status')}}</h5></span>
           <div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
               <table class="timetable_sub">
                   <thead>
                   <tr>
                       <th>Remove</th>
                       <th>Name</th>
                       <th>Price</th>
                       <th>Quantity</th>
                       <th>Item Total</th>
                   </tr>
                   </thead>
<?php $total=0; ?>
                   @foreach($cartProducts as $cartProduct)
                   <tr class="rem1">
                       <td class="invert-closeb">
                          <a href="{{url('/cart/delete/'.$cartProduct->rowId)}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this from cart?')">
                   <span class="glyphicon glyphicon-trash"></span>
                          </a>

                       </td>
                       <td class="invert-image">

                          {{$cartProduct->name}}

                       </td>
                       <td class="invert">

                         TK.  {{$cartProduct->price}}

                       </td>
                       <td class="invert">
                          <form action="{{url('cart-update')}}" method="post">
                           @csrf
                              <div class="input-group">
                                  <input type="number" class="form-control" value="{{$cartProduct->qty}}" name="qty" min="1">
      <input type="hidden" class="form-control" value="{{$cartProduct->rowId}}" name="cartRowId">

                                  <span class="input-group-btn">
                                 <button type="submit" name="btn" class="btn btn-primary">
                                   <span class="glyphicon glyphicon-upload"></span>
                                 </button>

                             </span>

                              </div>
                          </form>

                       </td>
                       <td class="invert">
                       TK.    {{$itemTotal = $cartProduct->qty*$cartProduct->price}}

                       </td>
                   </tr>
<?php $total = $total+ $itemTotal ?>
                    @endforeach


               </table>
           </div>
           <div class="checkout-left">

               <div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
                   <a href="{{url('/')}}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back To Shopping</a>
               </div>
               <div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
                   <h4>Total Price</h4>
                   <ul>
                       {{--<li>Hand Bag <i>-</i> <span>$45.99</span></li>--}}
                       {{--<li>Watches <i>-</i> <span>$45.99</span></li>--}}
                       {{--<li>Sandals <i>-</i> <span>$45.99</span></li>--}}
                       {{--<li>Wedges <i>-</i> <span>$45.99</span></li>--}}
                       {{--<li>Total <i>-</i> <span>{{$totalCart}}</span></li>--}}
                       <li>Total <i>-</i> <span>{{$total}}</span></li>
<?php Session::put('orderTotal', $total) ?>
                   </ul>
               </div>
               <div class="clearfix"> </div>
           </div>
           <hr>

           <?php
        $customerId =   Session::get('customerId');
         $shippingId =  Session::get('shippingId');

         if($customerId != null && $shippingId !== null) {?>
           <a href="{{url('payment-info')}}" class="btn btn-primary pull-right">Checkout</a>

           <?php } else if($customerId != null) {?>

           <a href="{{url('shipping-info')}}" class="btn btn-primary pull-right">Checkout</a>

       <?php } else {?>
           <a href="{{url('checkout/index')}}" class="btn btn-primary pull-right">Checkout</a>

       <?php } ?>




       </div>
   </div>

@endsection
