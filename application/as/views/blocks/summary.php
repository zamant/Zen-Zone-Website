<?php 
include ROOT.'/views/includes/header-admin.php';
//print_r($data);
?>

<div id="main">
	<div id="side">
	<?php include ROOT.'/views/includes/menu.php';?>
	</div>
	
	
	<div id="main">
		<div id="breadcrumb">
			<a href="<?php echo $html->addLink(array('controller'=>'admins','action'=>'index'));?>">Home</a> 
			&gt;&gt;
			<a href="<?php echo $html->addLink(array('controller'=>'blocks','action'=>'index'));?>">Blocks</a> 
			&gt;&gt; 
			<span class="current">Operation</span>
		</div>
		
		<?php $msg->showMessage();?>
		
		<span class="big title">
		<?php echo date('l',strtotime($date)).' '.date('j M Y',strtotime($date));?>
		</span>
		<div class="seperator" style="margin:5px 0px 5px 0px; width:531px;"></div>
		<table border="0" class="data" cellpadding="0" cellspacing="0">
		
		<thead>
			<tr>
				<th scope="col">Time From</th>
				<th scope="col">Time To</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		
		<tbody>
		 <?php foreach($data as $id=>$dt){
		 ?>
		  <tr <?php echo ($id+1)%2==0?'class="odd"':'';?>>
			<td><?php echo $dt['time_from']; ?></td>
			<td><?php echo $dt['time_to']; ?></td>
			<td>
				
				<a class="delete" href="<?php echo $html->addLink(array('controller'=>'blocks','action'=>'delete'),
											array($dt['id'],$dt['date']));?>">Delete</a>
			</td>
		  </tr>
		 <?php 
		 }?>
		 </tbody>
		</table>
		
				
		<br/>
		<a class="action-button fancybox" href="<?php echo $html->addLink(array('controller'=>'blocks','action'=>'add'),$date);?>">Add</a>
		
	</div>
	
</div>

<?php 
include ROOT.'/views/includes/footer.php';
?>