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
		  <li class="step step-2 inactive">
			<a href="#">
				<strong>Step 2</strong><br />Select a time slot</a>
		  </li>
		  <li class="step step-3 current">
			<a href="#">
				<strong>Step 3</strong><br />Enter your information</a>
		  </li>
		</ul>
	  </div>
</div>



<div id="main">	
		<?php $msg->showMessage();?>
		
		<div class="clear"></div>
		<?php echo $form->start(array('class'=>'form-3','id'=>'step-three','action'=>$html->addLink(array('controller'=>'homes','action'=>'step_three')))); ?>
		<div id="calendar">
			<div class="seperator"></div>
			
			
			
			<div class="clear"></div>
				<fieldset>
					<legend>Your Info</legend>
					<?php 
					$form->addField(array('label'=>'*Your Name:','name'=>'name','type'=>'text')); 
					$form->addField(array('label'=>'*Your Email Adderss:','name'=>'email','type'=>'text'));
					$form->addField(array('label'=>'*Your Contact Number:','name'=>'contact','type'=>'text'));
					$form->addField(array('label'=>'*Your Message:','name'=>'message','type'=>'textarea'));
					echo $form->show();
					?>
				</fieldset>
			<div class="clear"></div>
		</div>
			
		
		<div id="submit">		
			 <input type="hidden" name="post" value="1"/>
			 <input type="image" src="<?php echo $image->addFile('btn-next.png'); ?>"/>
		</div>
		<?php echo $form->end(); ?>
</div>

<?php 
include ROOT.'/views/includes/footer.php';
?>
