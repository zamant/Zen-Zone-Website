<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>Appointment System Admin Panel</title>
<?php 
$css = new Css();
$image = new Image();
$html = new Html();
$calendar = new Calendar();
$msg = new Message();
$js = new Js();
$form = new Form();
$form2 = new Form();
$time = new Time();
echo $css->addFile('style_b.css');
echo $css->addFile('custom.css');
echo $js->addFile('jquery-1.4.4.min.js');
echo $js->addFile('app-admin.js');

echo $css->addFile('fancybox/jquery.fancybox-1.3.4.css');
echo $js->addFile('fancybox/jquery.fancybox-1.3.4.pack.js');

if(isset($restrict)&&AppGlobal::getVar('uid')==null){
	header('Location:'.$html->addLink(array('controller'=>'users','action'=>'login')));
}

?>

<script>
$(document).ready(function(){
	$('.delete').click(function(){
		if(confirm('Are you sure ?')){
			return true;
		}
		return false;
	});
});

</script>
</head>
<body>
	<h1 style="text-align: center;font-size:40px">Zen Zone - Admin Panel</h1>