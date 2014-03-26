<?php 

include ROOT.'/views/includes/header-admin.php';
?>

<div id="main">
	<div id="side">
	<?php include ROOT.'/views/includes/menu.php';?>
	</div>
	
	
	<div id="main">
		
		<span class="big title">Weclome to admin page of Appointment System.</span>
		
		<ol class="list">
			<li>You can manage appintments easily from Appointments module.</li>
			<li>You can block/unblock certain easily days from Blocks module.</li>
			<li>You can define email message templates from Email Templates module.</li>
			<li>You can change admin password from Password module.</li>
		</ol>	
		
		
		
		<br/>
		<hr class="line"/>
		<br/>
		
		<span class="big title">Upcoming appointments: </span>
		<p class="common">
			<ul class="list">
				<?php 
				foreach($comings as $coming){
					echo '<li>';
					//echo $coming['time_from'].' to '.$coming['time_to'].' on '.$coming['date'].' with '.$coming['name'];
					echo '<a href="'.
									$html->addLink(array('controller'=>'bookings','action'=>'summary'),
														array(
															date('Y',strtotime($coming['date'])),
															date('m',strtotime($coming['date'])),
															date('j',strtotime($coming['date']))
														)
													)
									
								     .'">';
					echo $coming['time_from'].' to '.$coming['time_to'].' on '.$coming['date'].' with '.$coming['name'];
					 echo '</a>';
					echo '</li>';
				}
				?>
			</ul>
		</p>
		
		
		<br/>
		<hr class="line"/>	
		<br/>
		
		<span class="big title">Messages: </span>
		<p class="common">
		<span class="blue"><?php echo $numOfWaiting;?> appointments</span> <strong>are waiting for approvement:</strong>
		
		<?php if($waitings !=null){
				echo '<ul class="list">';
					foreach($waitings as $waiting){
						echo '<li>';
							echo '<a href="'.
									$html->addLink(array('controller'=>'bookings','action'=>'summary'),
														array(
															date('Y',strtotime($waiting['date'])),
															date('m',strtotime($waiting['date'])),
															date('j',strtotime($waiting['date']))
														)
													)
									
								     .'">';
							echo date('j M Y',strtotime($waiting['date'])).': <span class="blue">'.$waiting['numbers'].'</span> waiting for approvement';
						    echo '</a>';
						echo '</li>';
					}
				echo '</ul>';
		}?>
		
		</p>
		
		
		
		
	</div>
	
</div>

<?php 
include ROOT.'/views/includes/footer.php';
?>