@extends('admin.master')
@section('title')
Manage Product
@endsection
@section('body')


<div class="box">
            <div class="box-header">
              <h3 class="box-title">{{Session::get('status')}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SL No</th>
                  <th>Product Name</th>
                  <th>Category Name</th>
                  <th>Manufacturer Name</th>
                  <th>Product Price</th>
                  <th>Product Quantity</th>
                  <th>Publication Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    @foreach($pros as $pro)
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$pro->productName}} </td>
                  <td>{{$pro->categoryName}}</td>
                  <td>{{$pro->manufacturerName}}</td>
                  <td>TK. {{$pro->productPrice}}</td>
                  <td>{{$pro->productQuantity}}</td>
                  <td> {{$pro->publicationStatus == 1? 'Published' : 'Unpublished'}}</td>
                  <td>
                      <a href="{{url('/view-product/'.$pro->id)}}" class="btn btn-warning" title="Details"> <span class="fa fa-eye"></span></a>
                      <a href="{{url('/edit-product/'.$pro->id)}}" class="btn btn-success" title="Edit"> <span class="fa fa-edit"></span></a>
                      <a href="{{url('/delete-product/'.$pro->id)}}" class="btn btn-danger" title="Delete" onclick="return confirm('Are you sure to delete this?')"> <span class="fa fa-trash"></span></a>

                  </td>
                </tr>
                @endforeach
              </tbody>
              
              </table>
            </div>
            <!-- /.box-body -->
          </div>



@endsection