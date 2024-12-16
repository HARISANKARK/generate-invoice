

//to call global ajax function
function showHead()
{
    var yard_id =  $('#yard_id').val();
    var category_id =  $('#category_id').val();
    var data = {'category_id': category_id,'yard': yard_id, '_token': $('meta[name="csrf-token"]').attr('content')};
    var ajaxurl = $('#BASE_URL').val()+'/account_heads/show_account_heads'; //base url defined in main blade
    globalAjax("POST", data, ajaxurl, result); // global ajax function call
}

//retrieving data from global ajax function and appending result
function result(data)  
{ 
    console.log(data);
    var length = data.length;
    $('#head').empty();
    for(var i =0; i<length;i++)
    {
        $('#head').append(`
                <option value="${data[i].ah_id}">${data[i].head}</option>
        `);
    }
}


//retrieving data from global ajax function and appending result
// function result(data)  
// {
//   // console.log(data);
//     $('#head').empty();
//     $('#head').append(data.html);
// }
