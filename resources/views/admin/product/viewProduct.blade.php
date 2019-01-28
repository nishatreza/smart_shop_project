@extends('admin.master')

@section('title')
View Product
@endsection


@section('body')

<!--<hr>-->
@if (session('status'))
        <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('status') }}
        </div>
    @endif
<div class="row addcategoryrow">
    <div class="col-lg-12">
  
        <div class="panel bg-maroon">
          <div class="panel-body">
              <table class="table table-bordered">
                  <tr>
                      <th>Product Id</th>
                      <td>{{$product->id}}</td>
                  </tr>
                    <tr>
                      <th>Product Name</th>
                      <td>{{$product->productName}}</td>
                  </tr>
                    <tr>
                      <th>Category Name</th>
                      <td>{{$product->categoryName}}</td>
                  </tr>
                    <tr>
                      <th>Manufacturer Name</th>
                      <td>{{$product->manufacturerName}}</td>
                  </tr>
                    <tr>
                      <th>Product Price</th>
                      <td>{{$product->productPrice}}</td>
                  </tr>
                    <tr>
                      <th>Product Quantity</th>
                      <td>{{$product->productQuantity}}</td>
                  </tr>
                    <tr>
                      <th>Product Short Description</th>
                      <td>{{$product->productShortDescription}}</td>
                  </tr>
                    <tr>
                      <th>Product Long Description</th>
                      <td>{{$product->productLongDescription}}</td>
                  </tr>
                    <tr>
                      <th>Product Image</th>
                      <td>
                          
                          <img src="{{asset($product->productImage)}}" alt="" class="img-responsive img-fluid img-thumbnail" height="300" width="400">
                         
                      
                      </td>
                  </tr>
                    <tr>
                      <th>Publication Status</th>
                      <td>{{$product->publicationStatus ==1?'Published':'Unpublished'}}</td>
                  </tr>
                  
               
              </table>
          </div>
        </div>
    </div>
    
</div>



@endsection
