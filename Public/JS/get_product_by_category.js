$(function(){
	async: true;
	var myid = 4;
		$.post("../../../BuyMore/Index_Controller/product_by_category",
		        {
				"catid": myid
		        },
		        function(data){
		        	$('#mydiv').html(data); // passes the responce data to html elemnt with id="mydiv"
		        });

	$("li").on('click' ,function (){
		var myid = $(this).attr('data-value'); // getting the category id from the li tag clicked
		$("#mydiv").fadeOut(200);
		
		$.post("../../../BuyMore/Index_Controller/product_by_category",
		        {
				"catid": myid
		        },
		        function(data){
		        	$('#mydiv').fadeIn(200).html(data) // passes the responce data to html elemnt with id="mydiv"
		        });
		});
});