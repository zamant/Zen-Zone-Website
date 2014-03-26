<ul id="menu">
	<li>
		<a href="<?php echo $html->addLink(array('controller'=>'users','action'=>'index'));?>">Admin Panel</a>
		<ul>
			<li><a href="<?php echo $html->addLink(array('controller'=>'bookings','action'=>'index'));?>">
				Appointments</a>
			</li>
			<li><a href="<?php echo $html->addLink(array('controller'=>'blocks','action'=>'index'));?>">
				Blocks</a></li>
			<li><a href="<?php echo $html->addLink(array('controller'=>'emails','action'=>'index'));?>">
				Email Templates</a></li>
			<li><a href="<?php echo $html->addLink(array('controller'=>'users','action'=>'settings'));?>">
				Setting</a></li>
			<li><a href="<?php echo $html->addLink(array('controller'=>'users','action'=>'logout'));?>">
				Logout</a></li>
		</ul>
	</li>
</ul>