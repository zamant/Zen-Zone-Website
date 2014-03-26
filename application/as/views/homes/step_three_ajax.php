<?php
$image = new Image();
$html = new Html();
$calendar = new Calendar();
$msg = new Message();
$form = new Form();
?>
		
<div class="clear"></div>
<?php $msg->showMessage();?>

<?php echo $form->start(array('class'=>'form-3','id'=>'step-three','action'=>$html->addLink(array('controller'=>'homes','action'=>'step_three_ajax')))); ?>
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

<script>
$(document).ready(function(){
	$('.step').removeClass('current').addClass('inactive');
	$('.step-3').removeClass('inactive').addClass('current');
});
</script>