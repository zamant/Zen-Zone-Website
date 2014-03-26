// Load the application once the DOM is ready, using `jQuery.ready`:
$(document).ready(function() {	
	//fancybox
	$(".fancybox").fancybox();
	
	
	//booking index
	function setBlocks(){ 
		var blocks = $('.blocks');
		$.each(blocks,function(index,value){
			$('#li-'+$(value).val()).addClass('block');
		});
	}
	setBlocks();
	
	
	
	//email templates
	getTemplate();
	
	$('#name').change(function(){
		getTemplate();
	});
	
	
	function getTemplate(){
		var bookerId = $('#booker').val();
		var emailId = $('#name').val();
		var templateUrl = $('#template-url').val();
		var preview = $('#preview');
		
		$.ajax({
			  type: "GET",
			  url: templateUrl+bookerId+"/"+emailId,
			  beforeSend: function(){
				 $('.spin').fadeIn();
			  },
			  success: function(data){
				  $('.spin').fadeOut(function(){
					  $(preview).text(data);
				  });
			  }
		});
			
		
		
	}
	
});