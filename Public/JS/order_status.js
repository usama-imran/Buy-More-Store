$(function(){
	$("input[type='checkbox']").change(function() 
	{
    	var id = $(this).val();
    	if($(this).is(":checked"))
    	{
    		$.post("../../../BuyMore/Orders_Controller/Delivery_Status",
			        {
					"order_id": id,
					"active": 0
			        },
			        function(success){
			        	console.log(success);
			        });
    	}
    	else
    	{
    		var user_choice = confirm("Are you sure you want to mark this order as NOT DELIVERED");
    		if (user_choice == true)
    		{
    			$.post("../../../BuyMore/Orders_Controller/Delivery_Status",
			        {
					"order_id": id,
					"active": 1
			        },
			        function(success){
			        	console.log(success);
			        });
    		}
    		else
    		{
    			this.setAttribute("checked", "checked");
                this.checked = true;
    			//alert("false");
    		}
    	}
    });

});