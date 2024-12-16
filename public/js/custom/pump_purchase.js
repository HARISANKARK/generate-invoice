//Pump purchase - amount calculation 

    function calcAmount()
    {
        var ltr = $('#ltr').val();
        var rate = $('#rate').val();
        
        if(ltr && rate)
        {
            var amt = parseFloat(ltr) * parseFloat(rate);
            $('#amount').val(amt);
        }
    }