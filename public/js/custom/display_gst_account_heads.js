
function getAccountHeads()
{
    displayGstHeads();
}
   
   //To display Gst Account heads 
function displayGstHeads()
{
    var yard_id = $("#yard_id").val();
    var type = $('#type').val();
     //console.log(yard_id);
      //console.log(type);
    $.ajax({
        type : 'POST',
        data: { 'type':type ,'yard_id':yard_id,
            '_token': $('meta[name="csrf-token"]').attr('content') // Assuming CSRF token is set in a meta tag
        },
        url : $('#BASE_URL').val()+'/gst_account_heads/get_heads', //base url defined in main blade
        success:function(data)
        {
           // console.log(data);
            $("#head_id").empty();
            $("#head_id").append('<option value="" hidden></option>');
            for (var i = 0; i < data.length; i++) {

                $("#head_id").append('<option value=' + data[i]['gah_id'] + '>' + data[i]['gah_head'] + '</option>');
                
            }
            
        },
        // async: false
    });
}
    
    