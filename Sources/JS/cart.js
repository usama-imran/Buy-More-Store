$(function(){
	$("button").bind("click", Remove);
	
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
		        });
	}
});