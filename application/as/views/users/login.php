<?php 
include ROOT.'/views/includes/header-admin.php';
?>

<div id="main">
	
	

		
		<div id="calendar">
			
			<div class="clear"></div>
		
			<?php $msg->showMessage();?>
		
			<?php echo $form->start(array('class'=>'form-3','action'=>$html->addLink(array('controller'=>'users','action'=>'login')))); ?>
			<fieldset style="padding-left: 10px;">
				<?php 
				$form->addField(array('label'=>'Username:','name'=>'username','type'=>'text')); 
				$form->addField(array('label'=>'Password:','name'=>'password','type'=>'password')); 
				echo $form->show();
				?>
				<div>
					<input type="hidden" value="1" name="post">
					<input type="submit" value="Login" class="action-button">
				</div>
			</fieldset>
				
			<?php echo $form->end(); ?>
		</div>
		
	
</div>

<?php 
include ROOT.'/views/includes/footer.php';
?>