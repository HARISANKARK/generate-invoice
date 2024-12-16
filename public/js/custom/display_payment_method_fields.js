//TO DISPLAY CASH,CREDIT,BANK FIELDS CORRESPONDING TO SELECTED PAYMENT METHOD
    function funDisplay()
    {
        var method_id = $('#payment_method_id').val();
        
        $("#bank").hide();$("#cash").hide();$("#credit").hide();
        $.ajax({
            type : 'POST',
            data: { 'id':method_id ,
                '_token': $('meta[name="csrf-token"]').attr('content') // Assuming CSRF token is set in a meta tag
            },
            url : $('#BASE_URL').val()+'/payment_methods/show_payment_method_details', //base url defined in main blade
            success:function(data)
            {
                if (data) {

                    $("#cashpay").attr('placeholder', '').val('').prop('required', false);
                    $("#creditpay").attr('placeholder', '').val('').prop('required', false);
                    $("#bankpay").attr('placeholder', '').val('').prop('required', false);
                    if(data.cash_category)
                    {
                        $("#cash").show();
                        $("#cashpay").attr('placeholder', data.cash_category).prop('required', true);
                    }
                    if(data.credit_category)
                    {
                        $("#credit").show();
                        $("#creditpay").attr('placeholder', data.credit_category).prop('required', true);
                    }
                    if(data.bank_category)
                    {
                        $("#bank").show();
                        $("#bankpay").attr('placeholder', data.bank_category).prop('required', true);
                    }
                }
                funTotal();  
                
            },
            // async: false
        });
        
    }
    
    function funTotal()
    {
        $('#cashpay, #creditpay, #bankpay').val('');
        var total = $("#grand_total").val() || 0;
        
        const fields = [
            { selector: '#cashpay', isHidden: $('#cash').is(':hidden') },
            { selector: '#creditpay', isHidden: $('#credit').is(':hidden') },
            { selector: '#bankpay', isHidden: $('#bank').is(':hidden') }
        ];
        
        // Filter out hidden fields
        const visibleField = fields.find(field => !field.isHidden);
    
        if (visibleField) {
            $(visibleField.selector).val(total);
        }
        
        amtValid();
        
    }
    
    function changeAmount(num) 
    {
        var total = parseFloat($("#grand_total").val());
        if(total)
        {
            const fieldConfig = {
                1: { primary: '#cashpay', secondary: ['#bankpay', '#creditpay'] },
                2: { primary: '#creditpay', secondary: ['#bankpay', '#cashpay'] },
                3: { primary: '#bankpay', secondary: ['#creditpay', '#cashpay'] }
            };
        
            if (fieldConfig[num]) {
                var primaryAmount = parseFloat($(fieldConfig[num].primary).val()) || 0;
                var sec_amount = total - primaryAmount;
        
                //console.log('Primary amount:', primaryAmount); // Debugging line
                //console.log('Secondary amount:', sec_amount); // Debugging line
        
                fieldConfig[num].secondary.forEach(function(selector) {
                    if (!$(selector).closest('div').is(':hidden')) {
                        //console.log('Setting value for:', selector); // Debugging line
                        $(selector).val(sec_amount.toFixed(2));
                    }
                });
            }
        }
        amtValid();
    }
    
    
    //To Check total amount is equal to Cash + Credit + Bank amount
    function amtValid()
    {
        var cash =  parseFloat($("#cashpay").val()|| 0);
        var bank = parseFloat($("#bankpay").val() || 0);
        var credit =  parseFloat($("#creditpay").val() || 0);
        var total = parseFloat($("#grand_total").val() || 0);
        
        // console.log('total',total);
        // console.log('cash',cash);
        // console.log('credit',credit);
        // console.log('bank',bank);
       
        var sum = parseFloat(bank + cash + credit).toFixed(2);
        // console.log('sum',sum);
        if(sum == total) {
            $('#submitBtn').prop('disabled', false);  
        }else{
            $('#submitBtn').prop('disabled', true);  
        }
    }
