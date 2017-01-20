// form validation for adding new category
$(document).ready(function(){
	
	$("input[type='checkbox']").change(function() 
	{
    	var id = $(this).val();
    	if($(this).is(":checked"))
    	{
    		$.post("../../../Controller/cart_controller/Cart_Controller/delivered",
			        {
					"order_id": id
			        },
			        function(msg){
			        	console.log(msg);
			        });
    	}
    	else
    	{
    		var user_choice = confirm("Are you sure you want to mark this order as NOT DELIVERED");
    		if (user_choice == true)
    		{
    			$.post("../../../Controller/cart_controller/Cart_Controller/not_delivered",
			        {
					"order_id": id
			        },
			        function(msg){
			        	console.log(msg);
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