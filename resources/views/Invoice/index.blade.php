@extends('layouts.side')

@section('content')
<div>
    <div class="container-fluid">
    <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Invoices</h1>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>

        <div class="row">
            <div class="col-12">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <form>
                        @csrf
                        <div class="row">
                          <div class="form-group col-md-2">
                            <label for="exampleInputEmail1">From</label>
                            <input type="date" class="form-control" name="from" value="{{date('Y-m-d')}}" required>
                          </div>

                          <div class="form-group col-md-2">
                            <label for="exampleInputEmail1">To</label>
                            <input type="date" class="form-control" name="to" value="{{date('Y-m-d')}}" required>
                          </div>
                          <div class="form-group col-md-2">
                            <label for="exampleInputEmail1">Customer</label>
                            <select type="text" class="form-control select2bs4" name="customer_id"  >
                                <option value="" hidden></option>
                                @foreach($customers as $customer)
                                <option value="{{$customer->c_id}}">{{$customer->c_name}}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="form-group col-md-3 py-2">
                              <br>
                           <button type="submit" id='reload' class="btn btn-primary">Submit</button>
                          </div>
                        </div>
                    </form>
                    <table id="example1" class="table table-bordered table-striped">
                        <caption style="caption-side:top"><b>Details from the period of {{ date('d-m-Y', strtotime($from))}} to {{ date('d-m-Y', strtotime($to))}}</b></caption>
                        <thead>
                          <tr>
                            <th scope="col">Sl No</th>
                            <th scope="col">Invoice Code</th>
                            <th scope="col">Date</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Customer Address</th>
                            <th scope="col">Notes</th>
                            <th scope="col">Invoice Amount</th>
                            <th scope="col">Discount Amount</th>
                            <th scope="col">Total Vat</th>
                            <th scope="col">Grand Total</th>
                            <th scope="col">#</th>
                          </tr>
                        </thead>
                        <tbody>
                        @php($i=1)
                        @foreach($invoices as $invoice)
                          <tr class="odd">
                            <th scope="row">{{$i++}}</th>
                            <td>
                                <a href="{{route('invoice.show',$invoice->iv_id)}}" target="_blank">{{$invoice->invoice_code}}</a>
                            </td>
                            <td>{{$invoice->date}}</td>
                            <td>{{$invoice->c_name}}</td>
                            <td>{{$invoice->address}}</td>
                            <td>{{$invoice->notes}}</td>
                            <td>{{$invoice->invoice_amount}}</td>
                            <td>{{$invoice->discount_amount}}</td>
                            <td>{{$invoice->total_vat}}</td>
                            <td>{{$invoice->grand_total}}</td>
                            <td>
                                <a href="{{route('invoice.download',$invoice->iv_id)}}" class="btn"><i class="fa fa-download"></i></a>
                                <a href="{{route('invoice.edit',$invoice->iv_id)}}" class="btn "><i class="fa fa-eye"></i></a>
                            </td>
                          </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    </div>
</div>
@endsection
