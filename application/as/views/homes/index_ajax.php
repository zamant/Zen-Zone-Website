<?php
$image = new Image();
$html = new Html();
$calendar = new Calendar();
$msg = new Message();
$form = new Form();
$msg->showMessage();


?>

<form action="<?php echo $html->addLink(array('controller'=>'homes','action'=>'index_ajax'),array($month,$year));?>" method="post">
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


<script>
$(document).ready(function(){
	$('.step').removeClass('current').addClass('inactive');
	$('.step-1').removeClass('inactive').addClass('current');
});
</script>