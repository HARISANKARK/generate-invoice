    $(document).ready(function() {
        $(".ton").hide(); 
        var mest = $('#measurement_id').val();
        if(mest == 3)//ton
        {
            $('.ton').show();
            $('#ton').show().prop('required',true);
        }
       
    });
    
    
    function getGoodsRate(){
        var id = $("#goods").val();
        var ven_id = $("#vendor").val(); 
     
        var data = {'id' : id,'v_id' : ven_id};
        var ajaxurl = $('#BASE_URL').val()+'/goods_purchase/goodsRateDetails'; //base url defined in main blade
        globalAjax("POST", data, ajaxurl, showGoodsRate,showGoodsRate); // global ajax function call
        
    } 
        
    //retrieving data from global ajax function and appending result 
    function showGoodsRate(data)  
    { 
       if(data ){
        $("#rate").val(data["rate"]);
        }else{
            $("#rate").val(0);
        }
        calcTotal();
    }    
    
    function calcTotal(){
      var feet = $("#feet").val()|| 0;
      var rate = $("#rate").val()|| 0;
      var gst = parseFloat($("#gst").val())|| 0;
      var bill_type = $("#bill_type").val()|| 0;
      
      var total = parseFloat(feet) * parseFloat(rate);
      $("#grand_total").val((total + total * gst/100).toFixed(2));
      $("#amount").val(total.toFixed(2));
      
      if(bill_type == 0)
      {
          $("#igst").val('');
          $("#cgst").val((total * (gst/2)/100).toFixed(2));
          $("#sgst").val((total * (gst/2)/100).toFixed(2));
      }
      else if(bill_type == 1)
      {
        $("#cgst").val('');
        $("#sgst").val('');
        $("#igst").val((total * gst/100).toFixed(2));
      }
      
      $("#actual_amount").val(total + total * gst/100);
      funTotal();
    }
    
    function discountCalc(){
      var amount = parseFloat($("#amount").val()) || 0;
      var gst = parseFloat($("#gst").val())|| 0;
      var net_total = amount + amount * gst /100 ;
      var discount = parseFloat($("#discount").val()) || 0;
      var round_off = parseFloat($("#round_off").val()) || 0;
      
      total = net_total - discount + round_off;
      
      $("#grand_total").val(total.toFixed(2));
      $("#actual_amount").val(total);
      funTotal();
    }
    
    
    
    function showTon()
    {
        var mest = $('#measurement_id').val();
        $('.ton').hide();
        $('#ton').hide().prop('required',false).val(null);
        if(mest == 3)//ton
        {
            $('.ton').show();
            $('#ton').show().prop('required',true);
        }
    }
    
    function calcCFT()
    {
        var ton = parseFloat($('#ton').val());
        var good_id = $('#goods').val();
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
                    $('#feet').val(cft);
                    
                    calcTotal();
    
                },
                // async: false
            });
        }
    }
    
    function billnoValidation()
    {
       
        var billno = $('#billno').val();
        var vendor = $('#vendor').val();
       
        if(billno && vendor)
        {
            
            $.ajax({
                type : 'POST',
                data: { 'billno' : billno,'vendor_id':vendor,
                    '_token': $('meta[name="csrf-token"]').attr('content') // Assuming CSRF token is set in a meta tag
                },
                url : $('#BASE_URL').val()+'/purchases/billno_validation', //base url defined in main blade
                success:function(data)
                {
                    // console.log(data);
                    $('#warningMessage').text('');
                    if(data == 1)
                    {
                        $('#warningMessage').text('This bill no is already Existing');
                        //$('#billno').val('');
                    }
                   
                },
                // async: false
            });
        }
    }