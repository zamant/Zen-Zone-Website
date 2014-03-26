// Load the application once the DOM is ready, using `jQuery.ready`:

$(document).ready(function() {		
	//clickable li cell
	function setLiClick(){
		$('#calendar').find('li[class!="inactive"]').css('cursor','pointer');
		$('#calendar').find('li[class!="inactive"]').click(function(){			
			$(this).find('input[type="radio"]').attr('checked','checked');
		});
	}
	setLiClick();
	
	//blocks
	//front page
	function setBlocks(){ 
		var blocks = $('.blocks');
		$.each(blocks,function(index,value){
			$('#li-'+$(value).val()).addClass('block');
			//$('#li-'+$(value).val()).find('input').remove();
		});
	}
	setBlocks();
	
	//validation
	function validateEmail(email) 
	{ 
	 var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i ;
	 return email.match(re);
	}

	function validTime(time){
		var re =  /^([01][0-9]|2[0-3]){1}:[0-5]{1}[0-9]{1}:[0-5]{1}[0-9]{1}$/ ;
		return re.test(time);
	}

	//step two
	function stepTwo(){
		//$('#step-two').live('submit',function(){
			
			$('.box-msg').fadeOut(function(){
				$(this).remove();
			});
			var errorDiv = document.createElement('span');
			var submit=true;
			$(errorDiv).addClass('box-msg form2-box');
			
			var timeFromHour = $('#from-time-hour');
			var timeFromMin = $('#from-time-min');
			var timeFromSec = $('#from-time-sec');
			
			var timeToHour = $('#to-time-hour');
			var timeToMin = $('#to-time-min');
			var timeToSec = $('#to-time-sec');
			
			var timeFrom = timeFromHour.val()+':'+timeFromMin.val()+':'+timeFromSec.val();
			var timeTo = timeToHour.val()+':'+timeToMin.val()+':'+timeToSec.val();
			
			if(!validTime(timeFrom)){
				errorDiv = $(errorDiv).clone();
				$(errorDiv).text('Invalid time');
				$(timeFromSec).parent('div').append(errorDiv);
				submit=false;
			}
			
			if(!validTime(timeTo)){
				errorDiv = $(errorDiv).clone();
				$(errorDiv).text('Invalid time');
				$(timeToSec).parent('div').append(errorDiv);
				submit=false;
			}
			
			if((parseInt(timeToHour.val())<parseInt(timeFromHour.val()))||
			  ((parseInt(timeToHour.val())==parseInt(timeFromHour.val()))
			   &&(parseInt(timeToMin.val())<parseInt(timeFromMin.val())))||
			   ((parseInt(timeToHour.val())==parseInt(timeFromHour.val()))
			    &&(parseInt(timeToMin.val())==parseInt(timeToMin.val()))
				&&(parseInt(timeToSec.val())<=parseInt(timeFromSec.val())))){
				
				errorDiv = $(errorDiv).clone();
				$(errorDiv).text('Invalid time duration');
				$(timeToSec).parent('div').append(errorDiv);
				submit=false;
			}
			
			return submit;
	}
	
	//step three
	function stepThree(){
		//$('#step-three').live('submit',function(){
			$('.box-msg').fadeOut(function(){
				$(this).remove();
			});
			var errorDiv = document.createElement('span');
			var submit=true;
			$(errorDiv).addClass('box-msg form3-box');
			
			var name = $('#name');
			var email =$('#email');
			var contact =$('#contact');
			var message =$('#message');
			
			if(""==$(name).val()||null==$(name).val()){
				errorDiv = $(errorDiv).clone();
				$(errorDiv).text('Required field');
				$(name).parent('div').append(errorDiv);
				submit=false;
			}
			
			if(""==$(email).val()||null==$(email).val()){
				errorDiv = $(errorDiv).clone();
				$(errorDiv).text('Required field');
				$(email).parent('div').append(errorDiv);
				submit=false;
			}else if(!validateEmail($(email).val())){
				errorDiv = $(errorDiv).clone();
				$(errorDiv).text('Invalid email address');
				$(email).parent('div').append(errorDiv);
				submit=false;
			}
			
			if(""==$(contact).val()||null==$(contact).val()){
				errorDiv = $(errorDiv).clone();
				$(errorDiv).text('Required field');
				$(contact).parent('div').append(errorDiv);
				submit=false;
			}else if(isNaN($(contact).val())){
				errorDiv = $(errorDiv).clone();
				$(errorDiv).text('Invalid contact number');
				$(contact).parent('div').append(errorDiv);
				submit=false;
			}
			
			if(""==$(message).val()||null==$(message).val()){
				errorDiv = $(errorDiv).clone();
				$(errorDiv).text('Required field');
				$(message).parent('div').append(errorDiv);
				submit=false;
			}
			
			return submit;
		//});
	}
	
	$('form').attr('action',($('form').attr('action')).replace("index", 'index_ajax'));
	changeCalNaviHref();
	$('form').live('submit',function(){
			var thisObj = this;
			var submit = true;
			if('step-two'==$(thisObj).attr('id')){
				submit = stepTwo();
			}else if('step-three'==$(thisObj).attr('id')){
				submit = stepThree();
			}			
			if(submit){
				$.ajax({
				  type: "POST",
				  data: $(thisObj).serialize(),
				  url: $(thisObj).attr('action'),
				  beforeSend: function(){
					 showOverLayer();
				  },
				  success: function(data){
					 $(thisObj).parent("#main").empty().html(data).hide().fadeIn(function(){
						 setBlocks();
						 setLiClick();
						 hideOverLayer();
					 });
					 changeCalNaviHref();
				  }
				});
			}
		return false;
	});
	
	
	$('div#navi').find('.button').live('click',function(){
			var thisObj = this;
			var url = $(thisObj).attr('href');
			$.ajax({
				  "type": "GET",
				  "url": url,
				  "beforeSend": function(){
					 showOverLayer();
				  },
				  "error": function()
				  {
					console.log('error sending request to address: '+url);
				  },
				  "success": function(data){
					 $("#main").empty().html(data).hide().fadeIn(function(){
						 setBlocks();
						 setLiClick();
						 hideOverLayer();
						
					 });
					 changeCalNaviHref();
				  }
			});
			return false;
	});
	
	function createOverLayer(){
		var overLayer = jQuery('#ready-loading-layer').clone().
			css({
				  position:'absolute', 
			      opacity: 0.8,
			      top: '0',
			      left: '0',
			      zIndex:10,
			      display:'block',
			      backgroundColor: '#DEDEDE',
				  height: $('#calendar').height(),
				  width:  $('#calendar').width(),
				  display: 'none'
			}
		).attr('id','overlayer').appendTo('#calendar');	
	}
 	
 	
 	function showOverLayer(){
 			if($('#overlayer').length!=0){
 				$('#loading-img').css({
 					marginTop:(parseInt($('#calendar').height())/2 - 16)+'px'
 				});
 				$('#overlayer').css({
 					  height: $('#calendar').height(),
					  width:  $('#calendar').width(),
					  display: 'block'
 				});
 			}else{
 				createOverLayer();
 				$('#overlayer').show(); 				
 				$('.loading-img').css({
 					marginTop: (parseInt($('#calendar').height())/2 - 16)+'px'
 				});
 			}
 	}
 	
 	function hideOverLayer(){
 		if($('#overlayer').length!=0){
 			$('#overlayer').hide();
 		}
 	}
 	
 	function changeCalNaviHref(){
 		var naviBtns = $('div#navi').find('.button');
 		$.each(naviBtns, function(id,val){
 			$(val).attr('href',($(val).attr('href')).replace("index", 'index_ajax'));
 		});
 		
 	}
});