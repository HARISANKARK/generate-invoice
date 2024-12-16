
    function vehicleChange()
    {
        var rowCount = $('#itemTable tr').length;
        for(var prow = 1 ; prow < rowCount ;  prow++  ){
            getUnit(prow);
        }
    }

    function taxChange()
    {
        var rowCount = $('#itemTable tr').length;
        for(var prow = 1 ; prow < rowCount ;  prow++  ){
           getProducts(prow);
        }
    }


    function getUnit(row){
        var vehicle_id = $("#vehicle_id").val();
        $.ajax({
            type : 'POST',
            data: { 'head_id':vehicle_id ,
                '_token': $('meta[name="csrf-token"]').attr('content') // Assuming CSRF token is set in a meta tag
            },
            url : $('#BASE_URL').val()+'/account_heads/show_head_details', //base url defined in main blade
            success:function(data)
            {
               $("#feet"+row).val(data['feet']);

            },
            // async: false
        });
    }

    function getRate(row){
        var customer_id = $("#customer_id").val();
        var product_id = $("#product_id"+row).val();
        var vehicle_id = $("#vehicle_id").val();
        // console.log('vehicle_id = '+ vehicle_id);
        // console.log('customer_id = '+ customer_id);
        // console.log('product_id = '+ product_id);
        $.ajax({
            type : 'POST',
            data: { 'id':product_id ,'c_id':customer_id,'vehicle_id':vehicle_id,
                '_token': $('meta[name="csrf-token"]').attr('content') // Assuming CSRF token is set in a meta tag
            },
            url : $('#BASE_URL').val()+'/vehicle_slip/productDetails', //base url defined in main blade
            success:function(data)
            {
                // console.log(data);
               if(data ){
                    $("#rate"+row).val(data["rate"]);
                }else{
                    $("#rate"+row).val(0);
                }
                funCalc(row);

            },
            // async: false
        });
    }



    function funCalc(row)
    {
        var rowCount = $('#itemTable tr').length;
        var tax = parseFloat($("#tax").val());
        var finalTotal = 0,totFeet =0, with_tax_amount = 0, tax_amount =0 ;

        var feet = $("#feet"+row).val();
        var rate = $("#rate"+row).val();
        var disc = $("#prod_discount"+row).val() || 0;

        if(feet && rate)
        {
            var  total = (parseFloat(feet) * parseFloat(rate));
            var grand_amt = total - parseFloat(disc);

            $("#prod_total"+row).val(total.toFixed(2));
            $("#grandAmount"+row).val(grand_amt.toFixed(2));
        }
        for(var prow = 1 ; prow < rowCount ;  prow++  ){

            var  total = $("#grandAmount"+prow).val();
            var gst = total * tax/100;
            //with_tax_amount = tax_amount + parseInt(total) + gst;
            finalTotal =  finalTotal + parseFloat(total) ;
            totFeet =  totFeet +parseFloat(feet);

        }
        // feetChange(totFeet);
        $("#total").val(finalTotal.toFixed(2));
        $("#balance").val(finalTotal.toFixed(2));

        $("#with_tax_amount").val((finalTotal + finalTotal * tax /100).toFixed(2));

        funBal();
    }

    function calcRate(row){

        var rowCount = $('#itemTable tr').length;
        var tax = parseFloat($("#tax").val());
        var finalTotal = 0,totFeet =0, with_tax_amount = 0, tax_amount =0 ;

        var feet = $("#feet"+row).val();
        var amt = $("#prod_total"+row).val();
        var disc = $("#prod_discount"+row).val() || 0;

        if(feet && amt)
        {
            var  rate = (parseFloat(amt) / parseFloat(feet));
            var grand_amt = parseFloat(amt) - parseFloat(disc);

            $("#rate"+row).val(rate.toFixed(2));
            $("#grandAmount"+row).val(grand_amt.toFixed(2));
        }
        for(var prow = 1 ; prow < rowCount ;  prow++  ){


            var  total = $("#grandAmount"+prow).val();

            //$("#prod_total"+row.toString()).val(total.toFixed(2));
            //$("#grandAmount"+row.toString()).val(total.toFixed(2));
            var gst = total * tax/100;
            //with_tax_amount = tax_amount + parseInt(total) + gst;
            finalTotal =  finalTotal + parseFloat(total) ;
            totFeet =  totFeet +parseFloat(feet);

        }
        // feetChange(totFeet);
        $("#total").val(finalTotal.toFixed(2));
        $("#balance").val(finalTotal.toFixed(2));

         $("#with_tax_amount").val((finalTotal + finalTotal * tax /100).toFixed(2));

        funBal();
    }

    function funSum(){
        var tax = parseFloat($("#tax").val());
        var array_values = $("input[name='prod_amount[]']")
              .map(function(){
          	        if($(this).val()){
              		    return parseFloat( $(this).val());
              		}
              }).get();

        var sum = array_values.reduce(function(a, b){
            return a + b;
        }, 0);
        $("#total").val(sum.toFixed(2));
        $("#balance").val(sum.toFixed(2));
        var total = sum + sum * tax /100;
        $("#with_tax_amount").val(total.toFixed(2));

    }

    function funBal(){
        var amount = $("#total").val();
        var disc = $("#discount").val();
        var round_off = $("#round_off").val();
        var tax = parseFloat($("#tax").val());
        bal = amount;
        if(disc){
            var bal = parseFloat(amount) - parseFloat(disc);
        }
        if(round_off){
            var bal = parseFloat(bal) + parseFloat(round_off);
        }
        $("#balance").val(bal);
        $("#with_tax_amount").val((bal + bal * tax /100).toFixed(2));
    }

    function funAmount(row){
        var amount = $("#grandAmount"+row).val();
        var feet = $("#feet"+row).val();

        var rate = parseFloat(amount) / parseFloat(feet);
        $("#rate"+row).val(rate.toFixed(2));

    }
