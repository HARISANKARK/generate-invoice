  
    function scheduleReload() 
    {
        // Schedule the reload after a delay
        setTimeout(function () {
          window.location.href = $('#BASE_URL').val()+'/vehicle_slip/create';
        }, 500);
    }
    
    
    //To call functions if customer or vehicle or site is changed
    function change() 
    {
        var trowCount = $('#itemTable tr').length;
        for(var trow = 1 ; trow < trowCount ;  trow++  )
        {
           getRate(trow);
           //getFeet(trow);
           getUnit(trow);
        } 
    }
    
    function getFeet(row)
    {
        var id = $("#vehicle_no").val();
        var site = $("#site").val();
        var customer_id = $("#customer_id").val();
       
        $.ajax({
            type : 'POST',
            data: { 'vehicle_id' : id,'customer_id' : customer_id,'site_id' : site,
                '_token': $('meta[name="csrf-token"]').attr('content') // Assuming CSRF token is set in a meta tag
            },
            url : $('#BASE_URL').val()+'/assign_feet/show_feet', //base url defined in main blade
            success:function(data)
            {
                $('#feet'+row).val(0);
                if(data.feet)
                {
                  $('#feet'+row).val(data.feet); 
                }
                $('#feet'+row).val(data.feet);
               
                //getUnit(row);
            },
            // async: false
        });
    }
    
    function getSite()
    {
        var id = $("#customer_id").val();
        
        $.ajax({
            type : 'POST',
            data: { 'id' : id,
                '_token': $('meta[name="csrf-token"]').attr('content') // Assuming CSRF token is set in a meta tag
            },
            url : $('#BASE_URL').val()+'/sites/show_site', //base url defined in main blade
            success:function(data)
            {
                $('#site').empty();
                $("#site").append('<option value="" hidden></option>');
                data.forEach(function (item) {
                        $('#site').append(`
                            <option value="${item.s_id}">${item.site_name}</option>
                        `);
                    });
                
            },
            // async: false
        });
    }
    
    
    function getRate(row)
    {
         var customer_id = $("#customer_id").val();
         var vehicle_id = $("#vehicle_id").val();
         var site_id = $("#site").val();
         var product_id = $("#product_id"+row).val();
        
        
        $.ajax({
            type : 'POST',
            data: { 'id' : product_id,'c_id' : customer_id,'site_id':site_id,'vehicle_id':vehicle_id,
                '_token': $('meta[name="csrf-token"]').attr('content') // Assuming CSRF token is set in a meta tag
            },
            url : $('#BASE_URL').val()+'/vehicle_slip/productDetails', //base url defined in main blade
            success:function(data)
            {
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
    
  
    
    // function funCalc(){
    //     var rowCount = $('#itemTable tr').length;
    //     //var rowCount = 2;
    //     //  var feet = $("#feet").val();
    //     // var rate = $("#rate").val();
    //     // var pass = $("#pass").val();
    //     var finalTotal = 0,totFeet =0, with_tax_amount = 0, tax_amount =0 ;
        
             
    //     for(var row = 1 ; row < rowCount ;  row++  ){
           
    //         var feet = $("#feet"+row).val();
    //         var rate = $("#rate"+row).val();
            
    //       if(feet && rate){
    //           var  total = parseFloat(feet) * parseFloat(rate);
                
    //           finalTotal += parseFloat(total) ;
    //             $("#grandAmount"+row).val(total.toFixed(2));
    //             // var gst = total * 5/100;
    //             //with_tax_amount = tax_amount + parseInt(total) + gst;
                
               
    //       } 
    //     } 
        
    //     // if(feet && rate){
    //     //     var total = parseFloat(feet) * parseFloat(rate);
    //     //     var total = parseFloat(total + pass);
    //     //     var total = parseInt(total);
    //          $("#total_amount").val(finalTotal.toFixed(2));
        
    //         $("#total").val(finalTotal.toFixed(2));
    //         funBal();
    //         funTotal();
           
    //     // }
        
    // }
    
    function calcRate(row)
    {
        var feet = $("#feet"+row).val();
        var amount =  $("#grandAmount"+row).val();
       // var rate = $("#rate"+row).val();
        
        if(feet && amount)
        {
            rate = parseFloat(amount) / parseFloat(feet);
            rate = rate.toFixed(2);
            
            $("#rate"+row).val(rate);
        }
        
       
        
        var rowCount = $('#itemTable tr').length;
       
        var finalTotal = 0,totFeet =0, with_tax_amount = 0, tax_amount =0 ;
        
             
        for(var strow = 1 ; strow < rowCount ;  strow++  ){
            
           var total = $("#grandAmount"+strow).val();
               finalTotal += parseFloat(total) ;
           } 
        
        finalTotal = finalTotal.toFixed(2);  
        
        $("#total").val(finalTotal);
        funBal();
        funTotal();
        
    // funCalc();
    }
    
     function funCalc(row){
       
        var feet = $("#feet"+row).val();
        var rate = $("#rate"+row).val();
        
        if(rate && feet)
        {
            amount = parseFloat(rate) * parseFloat(feet);
            amount = amount.toFixed(2);
            
            $("#grandAmount"+row).val(amount)
        }
        
       
        var rowCount = $('#itemTable tr').length;
       
        var finalTotal = 0,totFeet =0, with_tax_amount = 0, tax_amount =0 ;
        
             
        for(var prow = 1 ; prow < rowCount ; prow++  ){
            
           var total = $("#grandAmount"+prow).val();
               finalTotal += parseFloat(total) ;
           } 
        
        finalTotal = finalTotal.toFixed(2);  
        
        $("#total").val(finalTotal);
        funBal();
        funTotal();
        
    }
    
    function funBal(){
       
        var bal = $("#total").val() || 0;
        var disc = $("#discount").val() || 0;
        var pass = $("#pass").val() || 0;
        var vehicle_rent = $("#vehicle_rent").val() || 0;
        //console.log(disc);
        bal = parseFloat(bal) - parseFloat(disc) + parseFloat(pass) + parseFloat(vehicle_rent); 
         //console.log(bal);
         $("#grand_total").val(bal);
         checkBox();
        $("#amt").val(bal);
    }
    
    function funAmount(){
        var amount = $("#total").val();
        var feet = $("#feet").val();
        var pass = $("#pass").val();
        // var rate = parseFloat(amount) / parseFloat(feet);
        // var rate = parseFloat(rate).toFixed(2);
        // $("#rate").val(rate);
        
        
        // $("#balance").val(amount);
       // funCalc();
        
    }

    
    

    function checkBox(){
        
        var amt = $("#amt").val() || 0;
         var disc = $("#discount").val() || 0;
        var amount = parseFloat($("#total").val()) || 0;
        var total = $("#grand_total").val() || 0;
        var pass = $("#pass").val() || 0;
        var vehicle_rent = $("#vehicle_rent").val() || 0;
        
        if($("#check:checked")){
            var gst = amount * 5/100;
            var final = parseFloat(amount) + parseFloat(gst) - parseFloat(disc) + parseFloat(pass) + parseFloat(vehicle_rent); 
            
              final = final.toFixed(2);
            $("#grand_total").val(final);
            
            
        }if($("#check").not(':checked').length){
            amount = amount - parseFloat(disc) + parseFloat(pass) + parseFloat(vehicle_rent); 

            //amount = Math.ceil(amount);
            $("#grand_total").val(amount.toFixed(2));
            // $("#grandAmount").val(amt);
        }
        funTotal();    
    }

    function round_off_fun(){
        var amount  =  parseFloat($("#grandAmount").val());
        var round_off  =  parseFloat($("#round_off").val());
        if(round_off ){
            //amount = Math.ceil(amount);
        }
        $("#grand_total").val(amount);
        $("#balance").val(amount);
        
    }

    function getUnit(row)
    {
        var id = $("#vehicle_id").val();
        // console.log('vehicle_no',id);
        $.ajax({
            type : 'POST',
            data: { 'head_id' : id,
                '_token': $('meta[name="csrf-token"]').attr('content') // Assuming CSRF token is set in a meta tag
            },
            url : $('#BASE_URL').val()+'/account_heads/show_head_details', //base url defined in main blade
            success:function(data)
            {
                // console.log('data',data);
                var reaper = $("#reaper_h").val();
        
                if(reaper == 2)//normal
                {
                    $('#feet'+row).val(data["feet"]);
                }
                if(reaper == 1) // reaper
                {
                    $('#feet'+row).val(data["reaper_feet"]);
                }
                if(reaper == 3) // extra
                {
                    $('#feet'+row).val(data["extra_feet"]);
                }
                
                var tot_feet  = (parseFloat(data["length"])  * parseFloat(data["width"]) * (parseFloat(data["height"] ))) / 1728;
                var reaper_feet  = (parseInt(data["length"])  * parseInt(data["width"]) * ((parseFloat(data["height"] )+ parseFloat(data["reaper"])))) / 1728;
                $("#feet_details").val(data["length"]+"x"+data["width"]+"x"+data["height"]+"="+tot_feet.toFixed(2));
                $("#reaper_details").val(data["length"]+"x"+data["width"]+"x"+ (parseFloat(data["height"])+ parseFloat(data["reaper"])) +"="+reaper_feet.toFixed(2));
                
                funCalc(row);
            },
            error: function(error){
                return error;
            }
            // async: false
        });
    }
    
    