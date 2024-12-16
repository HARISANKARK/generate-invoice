function getHollowBricks(row)
{
    var yard_id = $("#yard_id").val();
    // console.log('yard_id',yard_id);
    $.ajax({
        type : 'POST',
        data: { 'yard_id':yard_id ,
            '_token': $('meta[name="csrf-token"]').attr('content') // Assuming CSRF token is set in a meta tag
        },
        url : $('#BASE_URL').val()+'/hollow_bricks/get_hollow_bricks', //base url defined in main blade
        success:function(data)
        {
            $("#hollow_brick_id"+row).empty();
            $("#hollow_brick_id"+row).append('<option value="" hidden></option>');
            // console.log('hollow_bricks',data);
            if(data){
                data.forEach(function(item) {
                    $("#hollow_brick_id"+row).append('<option value=' + item['hb_id'] + '>' + item['hb_name'] + '</option>');
                });
            }
            
        },
        // async: false
    });
}