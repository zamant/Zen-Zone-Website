<?php
require_once('includes/header.php');
?>

<!--Initialize Fade Slide Show-->
	<script type="text/javascript">
		var mygallery=new fadeSlideShow({
		wrapperid: "fadeshow1", //ID of blank DIV on page to house Slideshow
		dimensions: [960, 360], //width/height of gallery in pixels. Should reflect dimensions of largest image
		imagearray: [
			["images/1.png"],
			["images/2.png"],
			["images/3.png"]
			 //<--no trailing comma after very last image element!
		],
		displaymode: {type:'auto', pause:2500, cycles:0, wraparound:false},
		persist: false, //remember last viewed slide and recall within same session?
		fadeduration: 500, //transition duration (milliseconds)
		descreveal: "ondemand",
		togglerid: ""
		})
	</script>
<!-----------------------------------------------------------------------------------Header End------------------------------------------------------------------------------------>


<!-----------------------------------------------------------------------------------Body Starts------------------------------------------------------------------------------------>
<div id="middle_wrapper">
	<div id="middle">
						
		<div id="fadeshow1"></div>						
				
	</div>
</div> <!-- END of slider -->

<div id="main_top"></div>
<div id="main">
    <h2>Welcome to Zen Zone</h2>
	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam varius varius sem a sollicitudin. Suspendisse aliquet turpis velit, sed varius urna eleifend eu. Quisque cursus ante aliquam libero scelerisque, sed pulvinar nisl dapibus. Aenean dolor est, mollis sodales erat eu, molestie ultrices lacus. Maecenas egestas molestie est in venenatis. Nam commodo porta eros, vel sollicitudin dui sodales eget. Sed posuere pellentesque nisl, a scelerisque purus dictum sit amet. Proin feugiat lacus vestibulum nibh tincidunt porttitor. Integer bibendum porta nisl non semper. Curabitur lobortis diam ut mi ultrices semper. Integer fringilla, erat ac imperdiet dictum, ante libero congue enim, suscipit porta ligula augue sed risus. Nam id porta tortor.<br /> <br />

Nulla ac commodo mauris, eu faucibus sapien. Suspendisse diam enim, egestas ac ipsum eget, dignissim molestie dui. Phasellus viverra feugiat nunc. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla ac pellentesque eros. Quisque ornare sapien sed fringilla fringilla. Morbi mattis nulla sed turpis sodales bibendum.<br /> <br />

Nunc fringilla suscipit mauris vitae tempus. Mauris iaculis enim velit, nec volutpat massa consectetur sed. Curabitur feugiat dolor a sem scelerisque, quis ultricies sem semper. Fusce sagittis adipiscing turpis, id blandit tellus. Pellentesque id odio quis turpis pellentesque luctus non non erat. Etiam dui nibh, gravida ut volutpat non, sodales in libero. Nulla rhoncus consectetur laoreet. Integer sollicitudin lacinia enim, vitae sodales nibh aliquet nec. Phasellus auctor, nisi elementum auctor auctor, elit augue semper augue, non ullamcorper metus sem id augue. Praesent ut nunc sit amet nisl facilisis fringilla imperdiet ac odio. Sed imperdiet, massa non molestie vestibulum, sem justo ornare mi, vitae mollis est nulla in diam. Nunc eget nisl ac metus consequat ultricies eget ac nibh.<br /> <br />

Mauris pellentesque lectus sit amet hendrerit vehicula. Quisque eleifend tristique lacinia. Proin ac ligula enim. Praesent faucibus tristique sem sit amet ultrices. Etiam eget diam rutrum purus imperdiet lacinia. Ut quis tellus posuere, tincidunt lorem consequat, ultrices eros. In ut neque tempor, rutrum velit nec, convallis orci. Vivamus molestie dolor a pellentesque vehicula. In volutpat elit a venenatis ultrices. Nulla sed accumsan est. Sed a eleifend arcu, vel luctus lorem. Curabitur dictum arcu sed magna condimentum lobortis. Aenean elementum metus id placerat vestibulum. Quisque aliquet laoreet lorem, et interdum quam ornare sed.<br /> <br />

    
    <div class="cleaner"></div>
</div> 

<!--------------------------------------------------------------------------------Body END-------------------------------------------------------------------------------------->

<!--------------------------------------------------------------------------------Footer Starts--------------------------------------------------------------------------------->
<?php
require_once('includes/footer.php');
?>