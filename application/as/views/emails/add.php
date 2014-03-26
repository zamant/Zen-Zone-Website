<?php 
include ROOT.'/views/includes/header-admin.php';
//print_r($data);
?>


<div id="main" style="margin:0px;">
	<div id="calendar">
		<div class="clear"></div>
		
		<?php $msg->showMessage();?>
		
		<?php echo $form->start(array('class'=>'form-3','action'=>$html->addLink(array('controller'=>'emails','action'=>'add')))); ?>
			<fieldset>
				<legend>Add</legend>
				
				<div id="tags">					
					<strong>Available tags:</strong>
					<br/>
					{NAME} - name of the booker
					<br/>
					{EMAIL} - email of the booker
					<br/>
					{DATE} - date of the appointment
					<br/>
					{TIME_FROM} - from time of the appointment
					<br/>
					{TIME_TO} - to time of the appointment
					<br/>
					{CONTACT} -	contact number of the appointment
					<br/>
					{MESSAGE} -	message sent by the booker
					<br/>								
				</div>
				
				<?php 
				$opt = AppGlobal::$templateTypes;
				$form->addField(array('label'=>'*Name:','name'=>'name','type'=>'text')); 
				$form->addField(array('label'=>'*Type:','name'=>'type','type'=>'select','options'=>$opt)); 
				$form->addField(array('label'=>'*Content:','name'=>'content','type'=>'textarea')); 
				echo $form->show();
				?>
				<div>
					<input type="hidden" name="post" value="1"/>
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