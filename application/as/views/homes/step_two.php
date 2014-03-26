<?php 
include ROOT.'/views/includes/header.php';
?>



<div id="header">
	 <div class="steps">
		<ul>
		  <li class="step step-1 inactive">
			<a href="#">
				<strong>Step 1</strong><br />Choose a date</a>
		  </li>
		  <li class="step step-2 current">
			<a href="#">
				<strong>Step 2</strong><br />Select a time slot</a>
		  </li>
		  <li class="step step-3 inactive">
			<a href="#">
				<strong>Step 3</strong><br />Enter your information</a>
		  </li>
		</ul>
	  </div>
</div>



<div id="main">	
	<?php $msg->showMessage();?>
	
	
	<form id="step-two" class="form-2" action="<?php echo $html->addLink(array('controller'=>'homes','action'=>'step_two'));?>" method="post">
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
					<!--  <input type="text" class="time-from" name="time_from"/>-->
					<span class="append">(HH:ii:ss)</span>					
				</div>				
				
				<div>
					<label>To</label>
					<?php echo $time->show(array('instance'=>'to'));?>
							<!-- <input type="text" class="time-to" name="time_to"/>	-->	
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
</div>

<?php 
include ROOT.'/views/includes/footer.php';
?>
