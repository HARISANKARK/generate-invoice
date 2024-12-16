
   
   //To display Goods corresoponding to yard
   //used in goods stock
    function getGoods()
    {
        var yard_id = $("#yard_id").val();
        
        $.ajax({
            type : 'POST',
            data: { 'yard_id':yard_id ,
                '_token': $('meta[name="csrf-token"]').attr('content') // Assuming CSRF token is set in a meta tag
            },
            url : $('#BASE_URL').val()+'/goods_stock/get_goods', //base url defined in main blade
            success:function(data)
            {
                $("#good_id").empty();
                $("#good_id").append('<option value="" hidden></option>');
                //console.log(data);
                if(data){
                    data.forEach(function(item) {
                        $("#good_id").append('<option value=' + item['g_id'] + '>' + item['good_name'] + '</option>');
                    });
                }
                
            },
            // async: false
        });
    }
    