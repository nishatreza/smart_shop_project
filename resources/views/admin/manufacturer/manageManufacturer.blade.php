@extends('admin.master')
@section('title')
Manage Manufacturer
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
                  <th>Manufacturer Name</th>
                  <th>Manufacturer Description</th>
                  <th>Publcation Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    @foreach($manu as $man)
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$man->manufacturerName}} </td>
                  <td>{{$man->manufacturerDescription}}</td>
                  <td> {{$man->publicationStatus == 1? 'Published':'Unpublished'}}</td>
                  <td>
    <a href="{{url('/edit-manufacturer/'.$man->id)}}" class="btn btn-success"> <span class="fa fa-edit"></span></a>
    <a href="{{url('/delete-manufacturer/'.$man->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this?')"> <span class="fa fa-trash"></span></a>

                  </td>
                </tr>
                @endforeach
              </tbody>
              
              </table>
            </div>
            <!-- /.box-body -->
          </div>



@endsection