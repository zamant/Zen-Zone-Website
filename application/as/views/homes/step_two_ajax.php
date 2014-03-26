<?php
$image = new Image();
$html = new Html();
$calendar = new Calendar();
$msg = new Message();
$form = new Form();
$time = new Time();
?>
<?php $msg->showMessage();?>
<form id="step-two" class="form-2" action="<?php echo $html->addLink(array('controller'=>'homes','action'=>'step_two_ajax'));?>" method="post">
	<div id="calendar">
		<span class="big title">
		<?php echo date('l',strtotime($date)).' '.date('j M Y',strtotime($date));?>
		</span>
		
		<div class="seperator"></div>
			
			<?php if(sizeof($blocks)>0){?>
			<div id="remarks">							
					<strong>These slots have been blocked by admin:</strong>
					<?php foreach ($blocks as $block){
							echo '<br/>';
							echo $block['time_from'].' to '.$block['time_to'];
							
					}?>
			</div>
			<?php }?>
			
			<div>
				<label>From</label>
				
				<?php echo $time->show(array('instance'=>'from'));?>
				<!-- <input type="text" name="time_from" class="time-from"/> -->
				<span class="append">(HH:ii:ss)</span>					
			</div>				
			
			<div>
				<label>To</label>
				<?php echo $time->show(array('instance'=>'to'));?>
				<!--  <input type="text" name="time_to" class="time-to"/>		-->
				<span class="append">(HH:ii:ss)</span>					
			</div>
	
		<div class="clear"></div>
	</div>					
	<div id="submit">		
		<input type="hidden" value="1" name="post"/>
		<input type="image" src="<?php echo $image->addFile('btn-next.png'); ?>"/>
		<!-- <input class="html-element"  type="submit" value="Next"/>-->
	</div>
</form>

<script>
$(document).ready(function(){
	$('.step').removeClass('current').addClass('inactive');
	$('.step-2').removeClass('inactive').addClass('current');
});
</script>