
   
   //To display products in product select when new product added via product-add shortcut
   //used in vehicle slip ,sales
    function getAccountHeads()
    {
        var yard_id = $("#yard_id").val();
        console.log('yard_id = '+yard_id);
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
                    $(".customer-sup").empty();
                    $(".customer-sup").append('<option value="" hidden></option>');
                    var customer = data[1];
                    for (var i = 0; i < customer.length; i++) {
    
                        $(".customer-sup").append('<option value=' + customer[i]['ah_id'] + '>' + customer[i]['head'] + '</option>');
                        
                    }
                }
                
                //vendor
                if(data[2])
                {
                    $(".vendor-sup").empty();
                    $(".vendor-sup").append('<option value="" hidden></option>');
                    var vendor = data[2];
                    for (i = 0; i < vendor.length; i++) {
    
                        $(".vendor-sup").append('<option value=' + vendor[i]['ah_id'] + '>' + vendor[i]['head'] + '</option>');
                        
                    }
                }
                
                //Staff
                if(data[3])
                {
                    $(".staff-sup").empty();
                    $(".staff-sup").append('<option value="" hidden></option>');
                    var staff = data[3];
                    for (i = 0; i < staff.length; i++) {
    
                        $(".staff-sup").append('<option value=' + staff[i]['ah_id'] + '>' + staff[i]['head'] + '</option>');
                        
                    }
                }
                
                //Vehicle
                if(data[4])
                {
                    $(".vehicle-sup").empty();
                    $(".vehicle-sup").append('<option value="" hidden></option>');
                    var vehicle = data[4];
                    for (i = 0; i < vehicle.length; i++) {
    
                        $(".vehicle-sup").append('<option value=' + vehicle[i]['ah_id'] + '>' + vehicle[i]['head'] + '</option>');
                        
                    }
                }
                
                //Driver
                if(data[5])
                {
                    $(".driver-sup").empty();
                    $(".driver-sup").append('<option value="" hidden></option>');
                    var driver = data[5];
                    for (i = 0; i < driver.length; i++) {
    
                        $(".driver-sup").append('<option value=' + driver[i]['ah_id'] + '>' + driver[i]['head'] + '</option>');
                        
                    }
                }
                
                //Pump
                if(data[8])
                {
                    $(".pump-sup").empty();
                    $(".pump-sup").append('<option value="" hidden></option>');
                    var pump = data[8];
                    for (i = 0; i < pump.length; i++) {
    
                        $(".pump-sup").append('<option value=' + pump[i]['ah_id'] + '>' + pump[i]['head'] + '</option>');
                        
                    }
                }
                
                //Pump vehicles
                if(data[7])
                {
                    $(".pump-vehicle-sup").empty();
                    $(".pump-vehicle-sup").append('<option value="" hidden></option>');
                    var pump_vehicles = data[7];
                    for (i = 0; i < pump_vehicles.length; i++) {
    
                        $(".pump-vehicle-sup").append('<option value=' + pump_vehicles[i]['ah_id'] + '>' + pump_vehicles[i]['head'] + '</option>');
                        
                    }
                }
                
                //Pump Products
                if(data['pump_product'])
                {
                    $(".pump-product-sup").empty();
                    $(".pump-product-sup").append('<option value="" hidden></option>');
                    var pump_products = data['pump_product'];
                    for (i = 0; i < pump_products.length; i++) {
    
                        $(".pump-product-sup").append('<option value=' + pump_products[i]['pprod_id'] + '>' + pump_products[i]['product_name'] + '</option>');
                        
                    }
                }
                
                // HOLLOW BRICKS 
                
                //Customer
                if(data['hb-1'])
                {
                    $(".hb-customer-sup").empty();
                    $(".hb-customer-sup").append('<option value="" hidden></option>');
                    var customer = data['hb-1'];
                    for (var i = 0; i < customer.length; i++) {
    
                        $(".hb-customer-sup").append('<option value=' + customer[i]['ah_id'] + '>' + customer[i]['head'] + '</option>');
                        
                    }
                }
                
                //vendor
                if(data['hb-2'])
                {
                    $(".hb-vendor-sup").empty();
                    $(".hb-vendor-sup").append('<option value="" hidden></option>');
                    var vendor = data['hb-2'];
                    for (i = 0; i < vendor.length; i++) {
    
                        $(".hb-vendor-sup").append('<option value=' + vendor[i]['ah_id'] + '>' + vendor[i]['head'] + '</option>');
                        
                    }
                }
                
                //Staff
                if(data['hb-3'])
                {
                    $(".hb-staff-sup").empty();
                    $(".hb-staff-sup").append('<option value="" hidden></option>');
                    var staff = data['hb-3'];
                    for (i = 0; i < staff.length; i++) {
    
                        $(".hb-staff-sup").append('<option value=' + staff[i]['ah_id'] + '>' + staff[i]['head'] + '</option>');
                        
                    }
                }
                
                //Vehicle
                if(data['hb-4'])
                {
                    $(".hb-vehicle-sup").empty();
                    $(".hb-vehicle-sup").append('<option value="" hidden></option>');
                    var vehicle = data['hb-4'];
                    for (i = 0; i < vehicle.length; i++) {
    
                        $(".hb-vehicle-sup").append('<option value=' + vehicle[i]['ah_id'] + '>' + vehicle[i]['head'] + '</option>');
                        
                    }
                }
                
                //Pump
                if(data['hb-8'])
                {
                    $(".hb-pump-sup").empty();
                    $(".hb-pump-sup").append('<option value="" hidden></option>');
                    var pump = data['hb-8'];
                    for (i = 0; i < pump.length; i++) {
    
                        $(".hb-pump-sup").append('<option value=' + pump[i]['ah_id'] + '>' + pump[i]['head'] + '</option>');
                        
                    }
                }
                
                //Hollow Bricks
                if(data['hollow_bricks'])
                {
                    $(".hollow_brick-sup").empty();
                    $(".hollow_brick-sup").append('<option value="" hidden></option>');
                    var hollow_bricks = data['hollow_bricks'];
                    for (i = 0; i < hollow_bricks.length; i++) {
    
                        $(".hollow_brick-sup").append('<option value=' + hollow_bricks[i]['hb_id'] + '>' + hollow_bricks[i]['hb_name'] + '</option>');
                        
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
                    $(".product-sup").empty();
                    $(".product-sup").append('<option value="" hidden></option>');
                    var products = data['products'];
                    for (i = 0; i < products.length; i++) {
    
                        $(".product-sup").append('<option value=' + products[i]['p_id'] + '>' + products[i]['product_name'] + '</option>');
                        
                    }
                }
                //Goods
                if(data['goods'])
                {
                    $(".good-sup").empty();
                    $(".good-sup").append('<option value="" hidden></option>');
                    var goods = data['goods'];
                    for (i = 0; i < goods.length; i++) {
    
                        $(".good-sup").append('<option value=' + goods[i]['g_id'] + '>' + goods[i]['good_name'] + '</option>');
                        
                    }
                }
                
            },
             async: false
        });
    }
    
    