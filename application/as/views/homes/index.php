<?php 
include ROOT.'/views/includes/header.php';
?>
   <h2 style="text-align: center;margin-top: 15px">Book An Appointment Here</h2>

<div id="header">
	 <div class="steps">
		<ul>
		  <li class="step step-1 current">
			<a href="#">
				<strong>Step 1</strong><br />Choose a date</a>
		  </li>
		  <li class="step step-2 inactive">
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
	<form action="<?php echo $html->addLink(array('controller'=>'homes','action'=>'index'),array($month,$year));?>" method="post">
		<?php 
			$calendar->setNaviHref($html->addLink(array('controller'=>'homes','action'=>'index')));
			echo $calendar->show($month,$year,array('type'=>array('radio')));
		?>
		
		<div id="submit">		
				<input type="image" src="<?php echo $image->addFile('btn-next.png'); ?>"/> 
				<input type="hidden" value="1" name="post"/>
		</div>	
		
	</form>
	
	
	<div id="remarks" style="margin:80px auto; clear:both;">						
			<strong >Red cell indicates that certain time slots have been blocked on this date.</strong>
	</div>

	<?php 
	if(sizeof($blocks)>0){
		foreach($blocks as $block){
			echo '<input type="hidden" class="blocks" value="'.$block['date'].'"/>';
		}
	}
	?>
	
	
</div>




<?php 
include ROOT.'/views/includes/footer.php';
?>