function funCalc(row)
{
    var rowCount = $('#itemTable tr').length;
    var tax = 0;
    var finalTotal = 0,totQty =0, tax_amount =0 ;
    
    var qty = $("#qty"+row).val() || 0;
    var rate = $("#rate"+row).val() || 0;
    var disc = $("#prod_discount"+row).val() || 0;
    
    
    var prod_amount = (parseFloat(qty) * parseFloat(rate));
    var prod_total = prod_amount - parseFloat(disc);

    $("#prod_amount"+row).val(prod_amount.toFixed(2)); 
    $("#prod_total"+row).val(prod_total.toFixed(2)); 
   
    for(var prow = 1 ; prow < rowCount ;  prow++  )
    {
        var  ptotal = $("#prod_total"+prow).val();
        finalTotal =  finalTotal + parseFloat(ptotal) ;
        totQty =  totQty + parseFloat(qty); 
      
    }   
    //console.log(finalTotal);
    // feetChange(totFeet);
    $("#amount").val(finalTotal.toFixed(2));
    $("#grand_total").val(finalTotal.toFixed(2));
    
}

function funSum()
{
    //var tax = 0;
    var array_values = $("input[name='prod_total[]']")
          .map(function(){
      	        if($(this).val()){
          		    return parseFloat( $(this).val());
          		}
          }).get();
                      
    var sum = array_values.reduce(function(a, b){
        return a + b;
    }, 0);
     console.log(sum);
    $("#amount").val(sum.toFixed(2));
    $("#grand_total").val(sum.toFixed(2));
    //var total = sum + sum * tax /100;
    //$("#with_tax_amount").val(total.toFixed(2));
    
}