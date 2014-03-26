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
			<span class="current">Blocks</span>
		</div>
		
		<form action="<?php echo $html->addLink(array('controller'=>'blocks','action'=>'index'),array($month,$year));?>" method="post">
			<style>
			div#calendar{
				margin:0px; 
				clear:none;
			}
			</style>
			
				<?php 
				$calendar->setNaviHref($html->addLink(array('controller'=>'blocks','action'=>'index')));
				echo $calendar->show($month,$year,array('type'=>array('link'=>array('href'=>
																					($html->addLink(array('controller'=>'blocks','action'=>'summary')))
																					),
																	'checkbox')));
				?>
				
			<input type="hidden" value="1" name="post"/>			
			<div id="submit" style="margin:35px 0px; clear:both;">	
				<input style="margin-left:10px;" type="submit" value="Block" name="action_type" class="action-button"/> 
				<input type="submit" value="Unblock" name="action_type" class="action-button"/> 
			</div>	
		</form>
		
		<?php 
		if(sizeof($blocks)>0){
			foreach($blocks as $block){
				echo '<input type="hidden" class="blocks" value="'.$block['date'].'"/>';
			}
		}
		?>
	
	</div>
	
</div>

<?php 
include ROOT.'/views/includes/footer.php';
?>