@extends('admin.master')
@section('title')
Edit Manufacturer
@endsection
@section('body')

<!--<hr>-->

<!--<h3 class="text-center text-success">{{Session::get('status')}}</h3>-->
<div class="row addcategoryrow">
    <div class="col-lg-12">
        <div class="panel addpanel">
                    <div class="panel-body">
{!! Form::open(['url' => '/update-manufacturer', 'class' => 'form-horizontal', 'name' => 'editManufacturerForm']) !!}
<div class="form-group">
    <div class="control-label col-md-2">Manufacturer Name</div>
    <div class="col-md-6">
        <input type="text" name="manufacturerName" class="form-control" value="{{$manufac->manufacturerName}}">
        <input type="hidden" name="manufacturerId" class="form-control" value="{{$manufac->id}}">

        <span class="text-red">  {{$errors->has('manufacturerName')? $errors->first('manufacturerName'):''}}</span> 
    </div>

</div>
<div class="form-group">
    <div class="control-label col-md-2">Manufacturer Description</div>
    <div class="col-md-6">
        <textarea id="mytextarea" name="manufacturerDescription" class="form-control">{{$manufac->manufacturerDescription}}</textarea>
                <span class="text-red">  {{$errors->has('manufacturerDescription')? $errors->first('manufacturerDescription'):''}}</span> 

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
        <input type="submit" class="btn btn-success btn-block" value="Update Manufacturer Info">
    </div>

</div>

{!! Form::close() !!}
          </div>
        </div>
    </div>
    
</div>

@if (session('status'))
        <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('status') }}
        </div>
    @endif
    
    <script>
    
    document.forms['editManufacturerForm'].elements['publicationStatus'].value = {{$manufac->publicationStatus}};
    </script>
        

@endsection
