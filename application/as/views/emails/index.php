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
			<a href="<?php echo $html->addLink(array('controller'=>'users','action'=>'index'));?>">Home</a> 
			&gt;&gt;
			<span class="current">Email Templates</span>
		</div>
		
		<?php $msg->showMessage();?>
		
		<div class="seperator" style="margin:5px 0px 5px 0px; width:531px;"></div>
		<table border="0" class="data" cellpadding="0" cellspacing="0">
		
		<thead>
			<tr>
				<th scope="col">Name</th>
				<th scope="col">Type</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		
		<tbody>
		 <?php foreach($data as $id=>$dt){
		 ?>
		  <tr <?php echo ($id+1)%2==0?'class="odd"':'';?>>
			<td><?php echo $dt['name']; ?></td>
			<td><?php echo $dt['type']; ?></td>
			<td>
				<a class="fancybox" href="<?php echo $html->addLink(array('controller'=>'emails','action'=>'edit'),$dt['id']);?>">Edit</a>
				/
				<a class="delete" href="<?php echo $html->addLink(array('controller'=>'emails','action'=>'delete'),$dt['id']);?>">Delete</a>
			</td>
		  </tr>
		 <?php 
		 }?>
		 </tbody>
		 
		</table>
		
		<br/>
		<a class="action-button fancybox" href="<?php echo $html->addLink(array('controller'=>'emails','action'=>'add'));?>">Add</a>	
		 		
	</div>
	
</div>

<?php 
include ROOT.'/views/includes/footer.php';
?>