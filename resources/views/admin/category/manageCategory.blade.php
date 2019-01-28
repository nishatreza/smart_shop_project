@extends('admin.master')
@section('title')
Manage category
@endsection
@section('body')


<div class="box">
            <div class="box-header">
              <h3 class="box-title">{{Session::get('message')}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SL No</th>
                  <th>Category Name</th>
                  <th>Category Description</th>
                  <th>Publcation Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    @foreach($cats as $cat)
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$cat->categoryName}} </td>
                  <td>{{$cat->categoryDescription}}</td>
                  <td> {{$cat->publicationStatus == 1? 'Published' : 'Unpublished'}}</td>
                  <td>
    <a href="{{url('/edit-category/'.$cat->id)}}" class="btn btn-success"> <span class="fa fa-edit"></span></a>
    <a href="{{url('/delete-category/'.$cat->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this?')"> <span class="fa fa-trash"></span></a>

                  </td>
                </tr>
                @endforeach
              </tbody>
              
              </table>
            </div>
            <!-- /.box-body -->
          </div>

<!--<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">Serial</th>
      <th scope="col">Category Name</th>
      <th scope="col">Category Description</th>
      <th scope="col">Publication Status</th>
    </tr>
  </thead>
  
  @foreach($cats as $cat)
  <tbody>
    <tr>
      <th scope="row">{{$cat->id}}</th>
      <td>{{$cat->categoryName}}</td>
      <td>{{$cat->categoryDescription}}</td>
       <td>{{$cat->publicationStatus}}</td>

     
    </tr>
  </tbody>
  @endforeach
  
  
</table>-->

@endsection