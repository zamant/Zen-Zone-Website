<?php 
include ROOT.'/views/includes/header-admin.php';
echo $js->addFile('action-email.js');
//print_r($data);
?>


<div id="main" style="margin:0px;">
	<div id="calendar">
		<div class="clear"></div>
		<?php $msg->showMessage();?>
		<?php echo $form->start(array('class'=>'form-3','action'=>$html->addLink(array('controller'=>'bookings','action'=>'reject')))); ?>
			<fieldset>
				<legend>Reject</legend>
				<div class="spin">&nbsp;&nbsp;</div>
				<?php 
				//print_r($emails);
				$form->addField(array('label'=>'Email template:','name'=>'name','type'=>'select','options'=>$emails)); 
				$form->addField(array('label'=>'*Email subject:','name'=>'subject','type'=>'text','value'=>AppGlobal::$templateTypes['REJECT'])); 
				$form->addField(array('label'=>'Email Preview:','name'=>'preview','type'=>'textarea')); 
				echo $form->show();
				?>				
				<div>
					<input type="hidden" name="post" value="1"/>
					<input id="template-url" type="hidden" name="link" value="<?php echo $html->addLink(array('controller'=>'emails','action'=>'template'));?>"/>
					<input id="booker" type="hidden" name="bookerId" value="<?php echo $bookerId;?>"/>
					<input class="action-button" type="submit" value="Submit"/>
				</div>
			</fieldset>
			
		<?php echo $form->end(); ?>
		
		
		<div class="clear">	</div>
		
	</div>	
</div>

<?php 
include ROOT.'/views/includes/footer.php';
?>