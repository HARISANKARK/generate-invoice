
  
function getDatas(row)
{
    var yard_id = $("#yard_id").val();
    if(yard_id)
    {
        $.ajax({
            type : 'POST',
            data: { 'yard_id':yard_id ,
                '_token': $('meta[name="csrf-token"]').attr('content') // Assuming CSRF token is set in a meta tag
            },
            url : $('#BASE_URL').val()+'/account_categories/get_account_heads', //base url defined in main blade
            success:function(data)
            {
                console.log(data);
                
                //Customer
                if(data[1])
                {
                    $(".customer-sup"+row).empty();
                    $(".customer-sup"+row).append('<option value="" hidden></option>');
                    var customer = data[1];
                    for (var i = 0; i < customer.length; i++) {
    
                        $(".customer-sup"+row).append('<option value=' + customer[i]['ah_id'] + '>' + customer[i]['head'] + '</option>');
                        
                    }
                }
                
                //vendor
                if(data[2])
                {
                    $(".vendor-sup"+row).empty();
                    $(".vendor-sup"+row).append('<option value="" hidden></option>');
                    var vendor = data[2];
                    for (i = 0; i < vendor.length; i++) {
    
                        $(".vendor-sup"+row).append('<option value=' + vendor[i]['ah_id'] + '>' + vendor[i]['head'] + '</option>');
                        
                    }
                }
                
                //Staff
                if(data[3])
                {
                    $(".staff-sup"+row).empty();
                    $(".staff-sup"+row).append('<option value="" hidden></option>');
                    var staff = data[3];
                    for (i = 0; i < staff.length; i++) {
    
                        $(".staff-sup"+row).append('<option value=' + staff[i]['ah_id'] + '>' + staff[i]['head'] + '</option>');
                        
                    }
                }
                
                //Vehicle
                if(data[4])
                {
                    $(".vehicle-sup"+row).empty();
                    $(".vehicle-sup"+row).append('<option value="" hidden></option>');
                    var vehicle = data[4];
                    for (i = 0; i < vehicle.length; i++) {
    
                        $(".vehicle-sup"+row).append('<option value=' + vehicle[i]['ah_id'] + '>' + vehicle[i]['head'] + '</option>');
                        
                    }
                }
                
                //Pump
                if(data[8])
                {
                    $(".pump-sup"+row).empty();
                    $(".pump-sup"+row).append('<option value="" hidden></option>');
                    var pump = data[8];
                    for (i = 0; i < pump.length; i++) {
    
                        $(".pump-sup"+row).append('<option value=' + pump[i]['ah_id'] + '>' + pump[i]['head'] + '</option>');
                        
                    }
                }
                
                // HOLLOW BRICKS 
                
                //Customer
                if(data['hb-1'])
                {
                    $(".hb-customer-sup"+row).empty();
                    $(".hb-customer-sup"+row).append('<option value="" hidden></option>');
                    var customer = data['hb-1'];
                    for (var i = 0; i < customer.length; i++) {
    
                        $(".hb-customer-sup"+row).append('<option value=' + customer[i]['ah_id'] + '>' + customer[i]['head'] + '</option>');
                        
                    }
                }
                
                //vendor
                if(data['hb-2'])
                {
                    $(".hb-vendor-sup"+row).empty();
                    $(".hb-vendor-sup"+row).append('<option value="" hidden></option>');
                    var vendor = data['hb-2'];
                    for (i = 0; i < vendor.length; i++) {
    
                        $(".hb-vendor-sup"+row).append('<option value=' + vendor[i]['ah_id'] + '>' + vendor[i]['head'] + '</option>');
                        
                    }
                }
                
                //Staff
                if(data['hb-3'])
                {
                    $(".hb-staff-sup"+row).empty();
                    $(".hb-staff-sup"+row).append('<option value="" hidden></option>');
                    var staff = data['hb-3'];
                    for (i = 0; i < staff.length; i++) {
    
                        $(".hb-staff-sup"+row).append('<option value=' + staff[i]['ah_id'] + '>' + staff[i]['head'] + '</option>');
                        
                    }
                }
                
                //Vehicle
                if(data['hb-4'])
                {
                    $(".hb-vehicle-sup"+row).empty();
                    $(".hb-vehicle-sup"+row).append('<option value="" hidden></option>');
                    var vehicle = data['hb-4'];
                    for (i = 0; i < vehicle.length; i++) {
    
                        $(".hb-vehicle-sup"+row).append('<option value=' + vehicle[i]['ah_id'] + '>' + vehicle[i]['head'] + '</option>');
                        
                    }
                }
                
                //Pump
                if(data['hb-8'])
                {
                    $(".hb-pump-sup"+row).empty();
                    $(".hb-pump-sup"+row).append('<option value="" hidden></option>');
                    var pump = data['hb-8'];
                    for (i = 0; i < pump.length; i++) {
    
                        $(".hb-pump-sup"+row).append('<option value=' + pump[i]['ah_id'] + '>' + pump[i]['head'] + '</option>');
                        
                    }
                }
                
                //Hollow Bricks
                if(data['hollow_bricks'])
                {
                    $(".hollow_brick-sup"+row).empty();
                    $(".hollow_brick-sup"+row).append('<option value="" hidden></option>');
                    var hollow_bricks = data['hollow_bricks'];
                    for (i = 0; i < hollow_bricks.length; i++) {
    
                        $(".hollow_brick-sup"+row).append('<option value=' + hollow_bricks[i]['hb_id'] + '>' + hollow_bricks[i]['hb_name'] + '</option>');
                        
                    }
                }
                
               // var length = data.length;
                
                //Bank
                // $(".bank-sup").empty();
                // $(".bank-sup").append('<option value="" hidden></option>');
                // var banks = data['bank'];
                // for (i = 0; i < banks.length; i++) {
    
                //     $(".bank-sup").append('<option value=' + banks[i]['b_id'] + '>' + banks[i]['bank_name'] + '</option>');
                    
                // }
                
                //Product
                if(data['products'])
                {
                    $(".product-sup"+row).empty();
                    $(".product-sup"+row).append('<option value="" hidden></option>');
                    var products = data['products'];
                    for (i = 0; i < products.length; i++) {
    
                        $(".product-sup"+row).append('<option value=' + products[i]['p_id'] + '>' + products[i]['product_name'] + '</option>');
                        
                    }
                }
                //Goods
                if(data['goods'])
                {
                    $(".good-sup"+row).empty();
                    $(".good-sup"+row).append('<option value="" hidden></option>');
                    var goods = data['goods'];
                    for (i = 0; i < goods.length; i++) {
    
                        $(".good-sup"+row).append('<option value=' + goods[i]['g_id'] + '>' + goods[i]['good_name'] + '</option>');
                        
                    }
                }
                
            },
             async: false
        });
    }
}
    
    