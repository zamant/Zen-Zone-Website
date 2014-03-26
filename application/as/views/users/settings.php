<?php 
include ROOT.'/views/includes/header-admin.php';
?>

<div id="main">
	<div id="side">
	<?php include ROOT.'/views/includes/menu.php';?>
	</div>
	
	
	<div id="main">
		<div id="breadcrumb">
			<a href="<?php echo $html->addLink(array('controller'=>'users','action'=>'index'));?>">Home</a> 
			&gt;&gt; 
			<span class="current">Settings</span>
		</div>
		
		
		<div id="calendar" style="margin:0px; clear:none;">
			<?php $msg->showMessage();?>
			
			<div class="clear"></div>
		
			
		
			<?php echo $form2->start(array('class'=>'form-3','action'=>$html->addLink(array('controller'=>'users','action'=>'settings')))); ?>
			<fieldset style="padding-left: 10px; margin-top:-35px;">
				<legend>Change Admin Email</legend>
				<?php 
				$form2->addField(array('label'=>'Email:','name'=>'email','type'=>'text','value'=>$email)); 
				echo $form2->show();
				?>
				<div>
					<input type="hidden" value="1" name="post">
					<input type="hidden" value="e" name="action">
					<input type="submit" value="Submit" class="action-button">
				</div>
			</fieldset>
				
			<?php echo $form2->end(); ?>
			
			
			
			<?php echo $form->start(array('class'=>'form-3','action'=>$html->addLink(array('controller'=>'users','action'=>'settings')))); ?>
			<fieldset style="padding-left: 10px;">
				<legend>Change Password</legend>
				<?php 
				$form->addField(array('label'=>'Password:','name'=>'password','type'=>'password')); 
				$form->addField(array('label'=>'Confirm Password:','name'=>'password2','type'=>'password')); 
				echo $form->show();
				?>
				<div>
					<input type="hidden" value="1" name="post">
					<input type="hidden" value="p" name="action">
					<input type="submit" value="Submit" class="action-button">
				</div>
			</fieldset>
			<?php echo $form->end(); ?>
			
			
		</div>
			
	</div>
	
</div>

<?php 
include ROOT.'/views/includes/footer.php';
?>