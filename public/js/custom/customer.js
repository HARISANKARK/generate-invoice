//Customer Details Display in a Block
//used in sale,vehicle slip

    //to call global ajax function
   function getCustomer()
    {
        var id = $("#customer_id").val();
        var data = {'id': id};
        var ajaxurl = $('#BASE_URL').val()+'/vehicle_slip/customerDetails'; //base url defined in main blade
        globalAjax("POST", data, ajaxurl, showCustomer); // global ajax function call
    }
    
    //retrieving data from global ajax function and appending result 
    function showCustomer(data)  
    {
       // alert(data);
       // console.log(data);
        $("#custom").css("display","block");
        $("#cname").text(data.head);
        $("#address").text(data.address);
        $("#contact").text(data.contact_no);
        $("#gst").text(data.gstno);
        $("#credit_limit").text(data.credit_limit);
    }
