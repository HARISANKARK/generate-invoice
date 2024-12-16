     var row = 0; //global variable
    //to append account heads and other data corresponding to yard id 
    function getAccountHeads(){
        var row_count = $('#itemTable tr').length;
        for(var i=1;i<row_count;i++)
        {
            getDatas(i);
        }
    }
    
    function funRate(rowi){
       
        var cft = $("#feet"+rowi).val() || 0;
        var total = $("#total"+rowi).val();
        var discount = $("#discount"+rowi).val() || 0;
      
        if(cft !== 0)
        {
            var rate = parseFloat(total) / parseFloat(cft);
            $("#rate"+rowi).val(rate.toFixed(2));
            // console.log(rate);
        }
        // funTotal(rowi);
    }
    
    function funCalcTotal(rowi){
       
        var cft = $("#feet"+rowi).val() || 0;
        var rate = $("#rate"+rowi).val() || 0;
        var discount = $("#discount"+rowi).val() || 0;
        console.log('cft',cft);
        console.log('rate',rate);
        console.log('discount',discount);
        
        if(cft && rate)
        {
            var total = parseFloat(rate) * parseFloat(cft);
            
            var totalAmount = total - parseFloat(discount);
            
            $("#total"+rowi).val(total.toFixed(2));
            $("#grand_total"+rowi).val(totalAmount.toFixed(2));
        
        } 
        funTotal(rowi);
    }
    
    function funBata(rowi)
    {
        var id = $("#goods_id"+rowi).val();
        var ven_id = $("#vendor_id"+rowi).val(); 
         
        $.ajax({
            type : 'POST',
            data: { 'id' : id,'v_id' : ven_id,
                '_token': $('meta[name="csrf-token"]').attr('content') // Assuming CSRF token is set in a meta tag
            },
            url : $('#BASE_URL').val()+'/goods_purchase/goodsRateDetails', //base url defined in main blade
            success:function(data)
            {
                var feet = parseFloat($("#feet"+rowi).val()) || 0;
    
                console.log('funbata',data);
                var rate = data["rate"] || 0;
                var vehicle_rent = data["vehicle_rent"] || 0;
                var bata = data["bata"] || 0;
               
                $("#rate"+rowi).val(rate);
                $("#vehicle_rent"+rowi).val(vehicle_rent * feet);
                $("#bata"+rowi).val( bata * feet);
                //$("#total"+rowi).val(data["rate"] * feet)
                funTotal(rowi);

            },
            // async: false
        });
        
    }
    
    function funVehicleFeet(id,row)
    {
        $.ajax({
            type : 'POST',
            data: { 'id' : id,
                '_token': $('meta[name="csrf-token"]').attr('content') // Assuming CSRF token is set in a meta tag
            },
            url : $('#BASE_URL').val()+'/goods_purchase/vehicleDetails', //base url defined in main blade
            success:function(data)
            {
                $("#feet"+row).val(data["feet"]);
                funTotal(row);

            },
            // async: false
        });
        
    }
    
    function showTon(row)
    {
        var mest = $('#measurement_id'+row).val();
        $('#ton'+row).hide().prop('required',false).val(null);
        $('#ton-div').hide();
        if(mest == 3)//ton
        {
            $('#ton'+row).show().prop('required',true);
            $('#ton-div').show();
        }
    }
    
    function calcCFT(row)
    {
        var ton = parseFloat($('#ton'+row).val());
        var good_id = $('#goods_id'+row).val();
        if(ton)
        {
            
            $.ajax({
                type : 'POST',
                data: { 'id' : good_id,
                    '_token': $('meta[name="csrf-token"]').attr('content') // Assuming CSRF token is set in a meta tag
                },
                url : $('#BASE_URL').val()+'/goods/goods_details', //base url defined in main blade
                success:function(data)
                {
                    var cft = 0;
                    // console.log(data);
                    var div_val = parseFloat(data.divisional_value);
                    cft = parseFloat(ton*div_val);
                    $('#feet'+row).val(cft);
                    
                    funTotal(row);
    
                },
                // async: false
            });
        }
    }
    
    