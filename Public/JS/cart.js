$(function(){
	$(".btn-danger").bind("click", Remove);
	$("#checkout").bind("click", Check_Out);
	function Remove()
	{
		var id = $(this).attr("data-id");
		var name = $(this).attr("data-name");
		
		$.post("../../../BuyMore/cart_controller/remove_from_array",
		        {
				pro_id: id,
				pro_name: name
		        },
		        function(data){
		        	$("#cart").load(" #cart");
		        	console.log(data);
		        });
	}
	
	
	function Check_Out()
	{
		$.post("../../../BuyMore/cart_controller/check_out",
		        {
		        },
		        function(data){
		           window.location.href = '../Index_Controller/Index';	    
		        });
		 
	}
	
});