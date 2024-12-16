
function displaySites()
{
    var customer_id = $("#customer_id").val();
    
    $.ajax({
        type : 'POST',
        data: { 'id':customer_id ,
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