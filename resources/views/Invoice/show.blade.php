@extends('layouts.side')

@section('content')


<div class="container-fluid">
    <div class="card card-primary">

            <div class="card-header">
            <h3 class="card-title">Show Invoice</h3>
            </div>

            <form action="#" method="post"  id="formId" >
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 row">
                        <label class="form-group col-md-6 col-form-label" style="text-align: right">Invoice Code :</label>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="invoice_code" value="{{$invoice->invoice_code}}" required readonly>
                        </div>
                    </div>
                    <div class="col-md-6 row">
                        <label class="form-group col-md-6 col-form-label" style="text-align: right">Date :</label>
                        <div class="form-group col-md-6">
                            <input type="date" class="form-control" name="date" value="{{$invoice->date}}" required>
                        </div>
                    </div>
                    <div class="col-md-6 row">
                        <label class="form-group col-md-6 col-form-label" style="text-align: right">Customer :</label>
                        <div class="form-group col-md-6">
                            <select  class="form-control select2bs4 " name="customer_id" required>
                                <option value="{{$invoice->c_id}}" hidden>{{$invoice->c_name}}</option>
                                @foreach($customers as $customer)
                                  <option value="{{$customer->c_id}}" >{{$customer->c_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 row">
                        <label class="form-group col-md-6 col-form-label" style="text-align: right">Customer Address :</label>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="address" value="{{$invoice->address}}">
                        </div>
                    </div>
                    <div class="col-md-6 row">
                        <label class="form-group col-md-6 col-form-label" style="text-align: right" value="{{$invoice->notes}}">Notes :</label>
                        <div class="col-md-6">
                            <input type="note" class="form-control" name="notes">
                        </div>
                    </div>

                    <div class="container col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td colspan="5"><h4>Service Details</h4></td>
                                    </tr>
                                    <tr>
                                        <th class="col-md-3">Service</th>
                                        <th class="col-md-3">Price</th>
                                        <th class="col-md-2">Hours</th>
                                        <th class="col-md-3">Total</th>
                                        {{-- <th class="col-md-1" id="addBtn" style="text-align: center">+</th> --}}
                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                    @php($row=0)
                                    @foreach($invoice_services as $invoice_service)
                                    @php($row++)
                                    <tr>
                                        <td class="row-index text-center">
                                            <select  class="form-control select2bs4" name="service_id[]" id="service_id{{$row}}" style="width:100%;" required>
                                                <option value="{{$invoice_service->s_id}}" hidden>{{$invoice_service->s_name}}</option>
                                                @foreach($services as $service)
                                                <option value="{{$service->s_id}}" >{{$service->s_name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="row-index text-center">
                                            <input type="number" step="any" class="form-control" name="price[]" id="price{{$row}}" value="{{$invoice_service->price}}" oninput="calcTotal({{$row}})" required>
                                        </td>
                                        <td class="row-index text-center">
                                            <input type="number" step="any" class="form-control" name="hour[]" id="hour{{$row}}" value="{{$invoice_service->hour}}" oninput="calcTotal({{$row}})" required>
                                        </td>
                                        <td class="row-index text-center">
                                            <input type="number" step="any" class="form-control" name="total[]"  id="total{{$row}}" value="{{$invoice_service->total}}" required>
                                        </td>
                                        {{-- <td class="text-center" style="width:2%">
                                            <button class="btn remove" id="button${rowIdx}"><i class="fa fa-trash"></i></button>
                                        </td> --}}
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <br>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 row">
                        <label class="form-group col-md-6 col-form-label" style="text-align: right">Invoice Amount :</label>
                        <div class="form-group col-md-6">
                            <input type="number" step="any" class="form-control" name="invoice_amount" value="{{$invoice->invoice_amount}}" id="invoice_amount" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 row">
                        <label class="form-group col-md-6 col-form-label" style="text-align: right">Discount Amount :</label>
                        <div class="form-group col-md-6">
                            <input type="num,ner" step="any" class="form-control" name="discount_amount" id="discount_amount" value="{{$invoice->discount_amount}}" oninput="calcGrandTotal()">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 row">
                        <label class="form-group col-md-6 col-form-label" style="text-align: right">Enable Vat :</label>
                        <div class="form-group form-check col-md-6">
                            <input class="form-check-input mt-3" type="checkbox" name="enable_vat" id="enable_vat" @if($invoice->enable_vat == 1) checked @endif onchange="calcGrandTotal()">
                            <label class="col-form-label">5%</label>
                        </div>
                    </div>
                    <div class="col-md-6 row">
                        <label class="form-group col-md-6 col-form-label" style="text-align: right">Total Vat :</label>
                        <div class="form-group col-md-6">
                            <input type="number" step="any" class="form-control" name="total_vat" id="total_vat" value="{{$invoice->total_vat}}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 row">
                        <label class="form-group col-md-6 col-form-label" style="text-align: right">Grand Total :</label>
                        <div class="form-group col-md-6">
                            <input type="number" step="any" class="form-control" name="grand_total" id="grand_total" value="{{$invoice->grand_total}}" required>
                        </div>
                    </div>
                </div>
            <!-- /.card-body -->

            {{-- <div class="d-flex justify-content-center">
                <button type="submit" id='submitBtn' class="btn btn-warning m-1">Submit</button>
                <a href="{{route('invoice.index')}}" class="btn btn-secondary m-1">Close</a>
            </div> --}}
            </form>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

    $(document).ready(function () {
        // Disable all form controls inside the container
        $(".container-fluid").find("input, select, textarea, button").prop("disabled", true);
    });

    function calcTotal(row)
    {
        var price = parseFloat($('#price'+row).val());
        var hour = parseFloat($('#hour'+row).val());
        var total = 0;
        if(price && hour)
        {
            total = (price*hour).toFixed(3);
        }
        $('#total'+row).val(total);
        calcInvoiceAmount();
    }

    function calcInvoiceAmount()
    {
        var rowCount = $('#tbody tr').length;
        var total_amount = 0;
        for(var i=1;i<=rowCount;i++)
        {
            var total = parseFloat($('#total'+i).val());
            total_amount += total;
        }
        $('#invoice_amount').val(total_amount.toFixed(3));
        calcGrandTotal();
    }

    function calcGrandTotal()
    {
        var invoice_amount = parseFloat($('#invoice_amount').val());
        var discount = parseFloat($('#discount_amount').val());
        var total_vat = 0;
        var grand_total = invoice_amount;
        if(discount)
        {
            grand_total -= discount;
        }
        if ($("#enable_vat").is(":checked"))
        {
            total_vat = parseFloat((parseFloat(grand_total) * 5)/100).toFixed(3);
            $('#total_vat').val(total_vat);
            grand_total = parseFloat(grand_total) + parseFloat(total_vat);
        }else{
            $('#total_vat').val(null);
        }
        $('#grand_total').val(grand_total.toFixed(3));
    }

  var rowIdx = 0;
  $(document).ready(function () {

    $('#addBtn').on('click', function () {
        $('#tbody').append(`<tr id="R${++rowIdx}">
            <td class="row-index text-center">
                <select  class="form-control select2bs4" name="service_id[]" id="service_id`+rowIdx+`" style="width:100%;" required>

                    @foreach($services as $service)
                    <option value="{{$service->s_id}}" >{{$service->s_name}}</option>
                    @endforeach
                </select>
            </td>
            <td class="row-index text-center">
                <input type="number" step="any" class="form-control" name="price[]" id="price`+rowIdx+`" oninput="calcTotal(`+rowIdx+`)" required>
            </td>
            <td class="row-index text-center">
                <input type="number" step="any" class="form-control" name="hour[]" id="hour`+rowIdx+`" oninput="calcTotal(`+rowIdx+`)" required>
            </td>
            <td class="row-index text-center">
                <input type="number" step="any" class="form-control" name="total[]"  id="total`+rowIdx+`" required>
            </td>
            <td class="text-center" style="width:2%">
                <button class="btn remove" id="button${rowIdx}"><i class="fa fa-trash"></i></button>
            </td>
        </tr>`);
        $('.select2bs4').select2({
          theme: 'bootstrap4'
        });
    });
    // jQuery button click event to remove a row.
    $('#tbody').on('click', '.remove', function () {
        var child = $(this).closest('tr').nextAll();

        child.each(function () {
        var id = $(this).attr('id');
        var idx = $(this).children('p');
        var dig = parseInt(id.substring(1));
        idx.html(`Row ${dig - 1}`);
        $(this).attr('id', `R${dig - 1}`);
        });

        $(this).closest('tr').remove();
        rowIdx--;
        $('#button'+rowIdx).show();
    });
  });

</script>


@endsection
