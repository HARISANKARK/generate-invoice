function DisplayRate(row)
{
    var product_id = $("#p_goods"+row).val();
    var vendor_id = $("#vendor").val();
    
    $.ajax({
        type : 'POST',
        data: { 'vendor_id' : vendor_id,
            'product_id' : product_id,
            '_token': $('meta[name="csrf-token"]').attr('content') // Assuming CSRF token is set in a meta tag
        },
        url : $('#BASE_URL').val()+'/trip_assign_purchase_rate/fetch_rate', //base url defined in main blade
        success:function(data)
        {
            // console.log('data',data);
            if(data.tpr_rate)
            {
              $('#p_rate_id'+row).val(data.tpr_rate); 
            }
            calcPAmount(row);
        },
        async: false
    });
}


function displayYard() 
{
    var type = $('#type').val();
    
    if (type == "1") {
        // Show the Yard dropdown
        $('#yardDiv').show();
        $('#yard_id').prop('required', true);
    } else {
        // Hide the Yard dropdown and reset its value
        $('#yardDiv').hide();
        $('#yard_id').val('').prop('required', false);
    }
}



function calcPAmount(row)
{
    //purchase
    var p_rate = $('#p_rate_id'+row).val() || 0;
    var p_qty = $('#p_qty_id'+row).val() || 0;
    var p_item = $('#p_goods'+row).val();
    var p_tax = $("#p_tax"+row).val();
    var p_amount = parseFloat(p_rate) * parseFloat(p_qty);
    
    if(p_tax != 2){ //no
        p_amount = p_amount + (p_amount*5/100);
    }
    
    $('#p_amount_id'+row).val(p_amount.toFixed(2));
    
    
    //set purchase item and purchase qty as sale item and sale qty
    $('#s_product'+row).val(p_item).trigger('change');
    $('#s_qty_id'+row).val(p_qty);
    
    purchaseSum();
}

function calcSAmount(row)
{
    //sales
    var s_rate = $('#s_rate_id'+row).val()|| 0;
    var s_qty = $('#s_qty_id'+row).val()|| 0;
    var s_tax = $("#s_tax"+row).val();

    var s_amount = parseFloat(s_rate) * parseFloat(s_qty);
    if(s_tax != 2){ //No
        s_amount = s_amount + (s_amount*5/100);
    }
            
    $('#s_amount_id'+row).val(s_amount.toFixed(2));
    
    saleSum();
}

//sale Grand Total
function saleSum()
{
    // sales total calculation
    var values = $("input[name='s_amount[]']")
          .map(function(){return $(this).val();}).get();
       
    var total =0;
    for (var i = 0; i < values.length; i++) {
       
        total += parseFloat(values[i]); //<< 0;
    }
    $("#s_grand_total").val(total.toFixed(2));
    
}

//purchase Grand Total
function purchaseSum()
{
    var values = $("input[name='p_amount[]']")
          .map(function(){return $(this).val();}).get();
       
    var total =0;
    for (var i = 0; i < values.length; i++) {
       
        total += parseFloat(values[i]); //<< 0;
    }
    $("#p_grand_total").val(total.toFixed(2));
    passCalc(total);
} 

//Pass Calculation
function passCalc(grandAmt)
{
    var p_rate = parseFloat($('#pass_rate').val())|| 0;
    var p_qty = parseFloat($('#pass_qty').val())|| 0;
    
    var p_amount = p_rate * p_qty;
    var grandTotal = p_amount + parseFloat(grandAmt);
    
    $("#pass_amount").val(p_amount.toFixed(2));
    $("#p_grand_total").val(grandTotal.toFixed(2));
} 

