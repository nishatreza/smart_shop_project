@extends('admin.master')
@section('title')
    Manage Order
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
                    {{--<th>SL No</th>--}}
                    <th>Order Id</th>
                    <th>Customer Name</th>
                    <th>Order Total</th>
                    <th>Order Status</th>
                    <th>Payment Type</th>
                    <th>Payment Status</th>

                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; ?>
                @foreach($orders as $order)
                    <tr>
                        {{--<td>{{$i++}}</td>--}}
                        <td>{{$order->id}} </td>
                        <td>{{$order->firstName.' '.$order->lastName}}</td>
                        <td>TK. {{$order->orderTotal}}</td>
                        <td>{{$order->orderStatus}}</td>
                        <td>{{$order->paymentType}}</td>
                        <td> {{$order->paymentStatus}}</td>
                        <td>
                            <a href="{{url('/view-product/'.$order->id)}}" class="btn btn-warning" title="Details"> <span class="fa fa-eye"></span></a>
                            <a href="{{url('/edit-product/'.$order->id)}}" class="btn btn-success" title="Edit"> <span class="fa fa-edit"></span></a>
                            <a href="{{url('/delete-product/'.$order->id)}}" class="btn btn-danger" title="Delete" onclick="return confirm('Are you sure to delete this?')"> <span class="fa fa-trash"></span></a>

                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>



@endsection
