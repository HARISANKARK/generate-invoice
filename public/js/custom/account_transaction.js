
function funHead(row){
    
    var category_id = $("#category_id"+row).val();
    var yard_id = $("#yard_id").val();
    
    $.ajax({
        type : 'POST',
        data: { 'category_id':category_id ,'yard_id':yard_id ,
            '_token': $('meta[name="csrf-token"]').attr('content') // Assuming CSRF token is set in a meta tag
        },
        url : $('#BASE_URL').val()+'/account_heads/show_account_heads', //base url defined in main blade
        success:function(data)
        {
           //console.log('at',data);
           $("#head_id"+row).empty();
           $("#head_id"+row).append('<option value="" hidden></option>');
            for (var i in data) {
                $("#head_id"+row).append('<option value=' + data[i]['ah_id'] + '>' + data[i]['head'] + '</option>').change;
            }
            
        },
        // async: false
    });
}

//getAccountHeads function used in yard.blade.php
function getAccountHeads(){
    
    var rowCount = $('#tbody tr').length || 1;
    
    for(var prow = 1 ; prow <= rowCount ;  prow++  ){
        funHead(prow);
    }
}
