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
			<span class="current">Appointments</span>
		</div>		
			<style>
				div#calendar{
					margin:0px; 
					clear:none;
				}
			</style>			
			<?php 
			/* TO DO: red for appointment dates */
			$calendar->setNaviHref($html->addLink(array('controller'=>'bookings','action'=>'index')));
			echo $calendar->show($month,$year,
				array('type'=>array('link'=>array('href'=>
					($html->addLink(array('controller'=>'bookings','action'=>'summary')))
				))));
			?>
	</div>
	
</div>

<?php 
if(sizeof($blocks)>0){
	foreach($blocks as $block){
		echo '<input type="hidden" class="blocks" value="'.$block['date'].'"/>';
	}
}
?>

<?php 
include ROOT.'/views/includes/footer.php';
?>