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
			<a href="<?php echo $html->addLink(array('controller'=>'bookings','action'=>'index'));?>">Appointments</a> 
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
				<th scope="col">Name</th>
				<th scope="col">Email</th>
				<th scope="col">From Time</th>
				<th scope="col">From To</th>
				<th scope="col">Status</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		
		<tbody>
		 <?php foreach($data as $id=>$dt){
		 ?>
		  <tr <?php echo ($id+1)%2==0?'class="odd"':'';?>>
		 	<td><?php echo $dt['name']; ?></td>
			<td><?php echo $dt['email']; ?></td>
			<td><?php echo $dt['time_from']; ?></td>
			<td><?php echo $dt['time_to']; ?></td>
			<td><span class="status <?php echo strtolower($dt['status']);?>"><?php echo $dt['status']; ?></span></td>
			<td>
				<?php if($dt['status']!=AppGlobal::$bookingStatus['APPROVE']
							&&$dt['status']!=AppGlobal::$bookingStatus['REJECT']){?>
					<a class="fancybox" href="<?php echo $html->addLink(array('controller'=>'bookings','action'=>'approve'),$dt['id']);?>">Approve</a>
					/
				<?php }?>
				
				<?php if($dt['status']!=AppGlobal::$bookingStatus['APPROVE']
							&&$dt['status']!=AppGlobal::$bookingStatus['REJECT']){?>
					<a class="fancybox" href="<?php echo $html->addLink(array('controller'=>'bookings','action'=>'reject'),$dt['id']);?>">Reject</a>
					/
				<?php }?>
				
				
				<a class="delete" href="<?php echo $html->addLink(array('controller'=>'bookings','action'=>'delete'),
											array($dt['id'],date('Y',strtotime($dt['date'])),
															date('m',strtotime($dt['date'])),
															date('j',strtotime($dt['date']))
															));?>">Delete</a>
			</td>
		  </tr>
		 <?php 
		 }?>
		 </tbody>
		</table>
		
	</div>
	
</div>

<?php 
include ROOT.'/views/includes/footer.php';
?>