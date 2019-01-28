@extends('admin.master')

@section('title')
Edit Product

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
        <!--<h3 class="text-center text-success">{{Session::get('status')}}</h3>-->

        <div class="panel addpanel">
                    <div class="panel-body">
{!! Form::open(['url' => '/update-product', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data', 'name' => 'editProductForm']) !!}
<div class="form-group">
    <div class="control-label col-md-2">Product Name</div>
    <div class="col-md-6">
        <input type="text" name="productName" class="form-control" value="{{$product->productName}}">
        <input type="hidden" name="productId" class="form-control" value="{{$product->id}}">
        <span class="text-red">  {{$errors->has('productName')? $errors->first('productName'):''}}</span> 
    </div>

</div>
<div class="form-group">
    <div class="control-label col-md-2">Category Name </div>
    <div class="col-md-6">
        <select class="form-control" name="categoryId">
            <option>--- Select Product Category Name ---</option>
          @foreach($pubCategories as $pubCategory)
         
            <option value="{{$pubCategory->id}}">{{$pubCategory->categoryName}}</option>
          @endforeach
        </select>   
        <span class="text-red">  {{$errors->has('categoryId')? $errors->first('categoryId'):''}}</span> 

    </div>

</div>
<div class="form-group">
    <div class="control-label col-md-2">Manufacturer Name </div>
    <div class="col-md-6">
        <select class="form-control" name="manufacturerId">
            <option>--- Select Product Manufacturer Name ---</option>

           @foreach($pubManufacturers as $pubManufacturer)
            <option value="{{$pubManufacturer->id}}">{{$pubManufacturer->manufacturerName}}</option>
           @endforeach
        </select>   

    </div>

</div>
<div class="form-group">
    <div class="control-label col-md-2">Product Price</div>
    <div class="col-md-6">
        <input type="number" name="productPrice" class="form-control" value="{{$product->productPrice}}">
        <span class="text-red">  {{$errors->has('productPrice')? $errors->first('productPrice'):''}}</span> 
    </div>

</div>
<div class="form-group">
    <div class="control-label col-md-2">Product Quantity</div>
    <div class="col-md-6">
        <input type="number" name="productQuantity" class="form-control" value="{{$product->productQuantity}}">
        <span class="text-red">  {{$errors->has('productQuantity')? $errors->first('productQuantity'):''}}</span> 
    </div>

</div>
<div class="form-group">
    <div class="control-label col-md-2">Product Short Description</div>
    <div class="col-md-6">
        <textarea id="mytextarea" name="productShortDescription" class="form-control">{{$product->productShortDescription}}</textarea>
    <span class="text-red">  {{$errors->has('productShortDescription')? $errors->first('productShortDescription'):''}}</span> 

    </div>

</div>
<div class="form-group">
    <div class="control-label col-md-2">Product Long Description</div>
    <div class="col-md-6">
        <textarea id="mytextarea" name="productLongDescription" class="form-control" rows="10">{{$product->productLongDescription}}</textarea>
                <span class="text-red">  {{$errors->has('productLongDescription')? $errors->first('productLongDescription'):''}}</span> 

    </div>

</div>
<div class="form-group">
    <div class="control-label col-md-2">Product Image</div>
    <div class="col-md-6">
        <input type="file" name="productImage" value="{{$product->productImage}}">
        <span class="text-red">  {{$errors->has('productImage')? $errors->first('productImage'):''}}</span> 
    </div>

</div>
<div class="form-group">
    <div class="control-label col-md-2">Publication Status </div>
    <div class="col-md-6">
        <select class="form-control" name="publicationStatus">
            <option>--- Select Publication Status ---</option>

            <option value="1">Published</option>
             <option value="0">Unpublished</option>

        </select>   
    <span class="text-red">  {{$errors->has('publicationStatus')? $errors->first('publicationStatus'):''}}</span> 

    </div>

</div>
<div class="form-group">
   
    <div class="col-md-offset-2 col-md-6">
        <input type="submit" class="btn btn-success btn-block" value="Update Product Info">
    </div>

</div>

{!! Form::close() !!}


          </div>
        </div>
    </div>
    
</div>

    <script>
              document.forms['editProductForm'].elements['publicationStatus'].value = {{$product->publicationStatus}};

    </script>

@endsection
