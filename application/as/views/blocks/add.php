<?php 
include ROOT.'/views/includes/header-admin.php';
//print_r($data);
?>

<div id="main" style="margin:0px;">
	<div id="calendar">
		<div class="clear"></div>
		
		<?php $msg->showMessage();?>
		
		<?php echo $form->start(array('class'=>'form-3','action'=>
			$html->addLink(array('controller'=>'blocks','action'=>'add')))); ?>
			<fieldset>
				<legend>Add</legend>				
				
				<div>
					<label>From</label>
					<?php echo $time->show(array('instance'=>'from'));?>
					<span class="append">(HH:ii:ss)</span>					
				</div>	
				
				<div>
					<label>To</label>
					<?php echo $time->show(array('instance'=>'to'));?>
					<span class="append">(HH:ii:ss)</span>					
				</div>	
				
				
				<div>
					<input type="hidden" name="post" value="1"/>
					<input type="hidden" name="date" value="<?php echo $date;?>"/>
					<input class="action-button" type="submit" value="Submit"/>
				</div>
				
			</fieldset>
			
		<?php echo $form->end(); ?>
		
		
		<div class="clear"></div>
	</div>	
</div>

<?php 
include ROOT.'/views/includes/footer.php';
?>