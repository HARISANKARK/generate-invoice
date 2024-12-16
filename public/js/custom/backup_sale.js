  
    var srow = 0; //global variable
  
    function getUnit(){
  
        var vehicle_id = $("#vehicle_id").val();  
        var data = {'head_id': vehicle_id};
        var ajaxurl = $('#BASE_URL').val()+'/account_heads/show_head_details'; //base url defined in main blade
        globalAjax("POST", data, ajaxurl, showUnit); // global ajax function call
        
    }
    
    //retrieving data from global ajax function and appending result 
    function showUnit(data)  
    {
        $(".feet").val(data['feet']);
        funCalc();
    }  
  
    function getRate(row){
        $(".product").removeClass("product").addClass("selected_product");
        srow = row;
        var customer_id = $("#customer").val();
        var product_id = $("#product"+row).val();
        
        var data = {'id' : product_id,'c_id' : customer_id};
        var ajaxurl = $('#BASE_URL').val()+'/vehicle_slip/productDetails'; //base url defined in main blade
        globalAjax("POST", data, ajaxurl, showRate); // global ajax function call
        
    } 
        
    //retrieving data from global ajax function and appending result 
    function showRate(data)  
    {
       if(data ){
            $("#rate"+srow).val(data["rate"]);
        }else{
            $("#rate"+srow).val(0);
        }
        funCalc();
    }    
     
   
    function funCalc(){
         
        var rowCount = $('#itemTable tr').length;
        var tax = parseFloat($("#tax").val());
        var finalTotal = 0,totFeet =0, with_tax_amount = 0, tax_amount =0 ;
             
        for(var row = 1 ; row < rowCount ;  row++  ){
           
            var feet = $("#feet"+row.toString()).val();
            var rate = $("#rate"+row.toString()).val();
            var disc = $("#prod_discount"+row).val() || 0;
          
           if(feet && rate){
                var  total = (parseFloat(feet) * parseFloat(rate)) - parseFloat(disc);
                
                $("#prod_total"+row.toString()).val(total.toFixed(2));
                $("#grandAmount"+row.toString()).val(total.toFixed(2));
                var gst = total * tax/100;
                //with_tax_amount = tax_amount + parseInt(total) + gst;
                finalTotal =  finalTotal + parseFloat(total) ;
                totFeet =  totFeet +parseFloat(feet); 
           } 
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
        if(disc){
            var bal = parseFloat(amount) - parseFloat(disc);
            $("#balance").val(bal);
        }
    }
    
    function funAmount(row){
        var amount = $("#grandAmount"+row).val();
        var feet = $("#feet"+row).val();
        
        var rate = parseFloat(amount) / parseFloat(feet);
        $("#rate"+row).val(rate.toFixed(2));
        
    }
    function ProductClear(){
        $(".product-c").empty();
        var tax = $("#tax").val();
        
        $.ajax({
            type : 'POST',
            data: { 'tax':tax ,
                '_token': $('meta[name="csrf-token"]').attr('content') // Assuming CSRF token is set in a meta tag
            },
            url : $('#BASE_URL').val()+'/products/get_products', //base url defined in main blade
            success:function(data)
            {
                
                $(".product-c").append('<option value="" hidden></option>');
                //console.log(data);
                if(data){
                    data.forEach(function(item) {
                        $(".product-c").append('<option value=' + item['p_id'] + '>' + item['product_name'] + '</option>');
                    });
                }

                //removing class 'old_product' and adding new class 'product'
               // $(".old_product").removeClass("old_product").addClass("product");
                
            },
            // async: false
        });
    }
  