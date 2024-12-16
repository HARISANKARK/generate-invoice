
   
//To display products in product select when new product added via product-add shortcut
//used in vehicle slip ,sales
function getProducts(row)
{
    var yard_id = $("#yard_id").val();
    var tax = $("#tax").val()||null;
    console.log('tax' + tax);
    console.log('yard_id'+yard_id);
    $.ajax({
        type : 'POST',
        data: { 'tax':tax ,'yard_id':yard_id ,
            '_token': $('meta[name="csrf-token"]').attr('content') // Assuming CSRF token is set in a meta tag
        },
        url : $('#BASE_URL').val()+'/products/get_products', //base url defined in main blade
        success:function(data)
        {
            $("#product_id"+row).empty();
            $("#product_id"+row).append('<option value="" hidden></option>');
            console.log('products',data);
            if(data){
                data.forEach(function(item) {
                    $("#product_id"+row).append('<option value=' + item['p_id'] + '>' + item['product_name'] + '</option>');
                });
            }
            
        },
        // async: false
    });
}
    