   

    //to call global ajax function
    // function showNames()
    // {
    //     var category_id = $("#category_id").val();
    //     var yard_id = $("#yard_id").val();
    //     // console.log('category = '+category_id);
    //     // console.log('yard_id = '+yard_id);
    //     $.ajax({
    //         type : 'POST',
    //         data: { 'category_id':category_id ,'yard_id':yard_id,
    //             '_token': $('meta[name="csrf-token"]').attr('content') // Assuming CSRF token is set in a meta tag
    //         },
    //         url : $('#BASE_URL').val()+'/account_heads/show_account_heads', //base url defined in main blade
    //         success:function(data)
    //         {
    //             console.log(data);
    //             var length = data.length; 
    //             $('#tbody').empty();
    //             var rowIdx = 0;
                
    //             for(var i =0; i<length;i++)
    //             {
    //                 // Append the row with the constructed options
    //                 $('#tbody').append(`
    //                     <tr id="R${++rowIdx}">
    //                         <td class="row-index text-center">
    //                             <select  class="form-control" name="staff_id[]" required   >
    //                                 <option value="${data[i].ah_id}">${data[i].head}</option>
    //                             </select>
    //                         </td>
    //                         <td class="row-index text-center">
    //                             <select  class="form-control" name="status[]" required id="status${rowIdx}"  >
    //                                 <option value="0" >Present</option>
    //                                 <option value="1" >Absent</option>
    //                             </select>
    //                         </td>
    //                     </tr>
    //                 `);
    //             }
                
    //         },
    //         // async: false
    //     });
    // }
    
    //To set check box status full present or full absent
    $('#check').change(function() {
        
        var row = $("#tbody tr").length;
        if(this.checked) {
            for(var i=1; i<=row; i++){
                
                $('#status'+i).val('1').change();
            }
        }else{
            for(var j=1; j<=row; j++){
                
                $('#status'+j).val('0').change();
                
            }
        }
    });