function funDisplay(row)
{
    var payment_method = $('#payment_method_id'+row).val(); 
    var amount = $("#grand_total"+row).val();
    
    $('#cashpay' + row + ', #creditpay' + row + ', #bankpay' + row).hide();
    
    $.ajax({
        type : 'POST',
        data: { 'id':payment_method ,
            '_token': $('meta[name="csrf-token"]').attr('content') // Assuming CSRF token is set in a meta tag
        },
        url : $('#BASE_URL').val()+'/payment_methods/show_payment_method_details', //base url defined in main blade
        success:function(data)
        {
            if (data) {

                $("#cashpay"+row).attr('placeholder', '').val('').prop('required', false);
                $("#creditpay"+row).attr('placeholder', '').val('').prop('required', false);
                $("#bankpay"+row).attr('placeholder', '').val('').prop('required', false);
                if(data.cash_category)
                {
                    $("#cashpay"+row).show();
                    $("#cashpay"+row).attr('placeholder', data.cash_category).prop('required', true);
                }
                if(data.credit_category)
                {
                    $("#creditpay"+row).show();
                    $("#creditpay"+row).attr('placeholder', data.credit_category).prop('required', true);
                }
                if(data.bank_category)
                {
                    $("#bankpay"+row).show();
                    $("#bankpay"+row).attr('placeholder', data.bank_category).prop('required', true);
                }
            }
            
            funTotal(row);
            
        },
        // async: false
    });
}

function funTotal(row) 
{
   
   $('#cashpay' + row + ', #creditpay' + row + ', #bankpay' + row).val('');
    var total = $("#grand_total"+ row).val() || 0;
    
    
    // Define the fields with their selectors and visibility status
    const fields = [
        { selector: '#cashpay' + row, isHidden: $('#cashpay' + row).is(':hidden') },
        { selector: '#creditpay' + row, isHidden: $('#creditpay' + row).is(':hidden') },
        { selector: '#bankpay' + row, isHidden: $('#bankpay' + row).is(':hidden') }
    ];
    
    // Find the first visible field
    const visibleField = fields.find(field => !field.isHidden);
    
    // If a visible field is found, set its value to the total amount
    if (visibleField) {
        $(visibleField.selector).val(total);
    }
}


function changeAmount(num,row) 
{
    var total = parseFloat($("#grand_total"+row).val());
    if(total)
    {
        const fieldConfig = {
            1: { primary: '#cashpay'+row, secondary: ['#bankpay'+row, '#creditpay'+row] },
            2: { primary: '#creditpay'+row, secondary: ['#bankpay'+row, '#cashpay'+row] },
            3: { primary: '#bankpay'+row, secondary: ['#creditpay'+row, '#cashpay'+row] }
        };
    
        if (fieldConfig[num]) {
            var primaryAmount = parseFloat($(fieldConfig[num].primary).val()) || 0;
            var sec_amount = total - primaryAmount;
    
            //console.log('Primary amount:', primaryAmount); // Debugging line
            //console.log('Secondary amount:', sec_amount); // Debugging line
    
            fieldConfig[num].secondary.forEach(function(selector) {
                if (!$(selector).is(':hidden')) {
                    //console.log('Setting value for:', selector); // Debugging line
                    $(selector).val(sec_amount.toFixed(2));
                }
            });
        }
    }
}