@extends('admin.master')

@section('title')
Add category

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
{!! Form::open(['url' => '/new-category', 'class' => 'form-horizontal']) !!}
<div class="form-group">
    <div class="control-label col-md-2">Category Name</div>
    <div class="col-md-6">
        <input type="text" name="categoryName" class="form-control">
        <span class="text-red">  {{$errors->has('categoryName')? $errors->first('categoryName'):''}}</span> 
    </div>

</div>
<div class="form-group">
    <div class="control-label col-md-2">Category Description</div>
    <div class="col-md-6">
        <textarea id="mytextarea" name="categoryDescription" class="form-control"></textarea>
                <span class="text-red">  {{$errors->has('categoryDescription')? $errors->first('categoryDescription'):''}}</span> 

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
        <input type="submit" class="btn btn-success btn-block" value="Save Category Info">
    </div>

</div>

{!! Form::close() !!}
          </div>
        </div>
    </div>
    
</div>



@endsection
