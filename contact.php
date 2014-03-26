<?php
require_once('includes/header.php');
?>
<script
src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false">
</script>

<script src="js/contact.js" type="text/javascript" language="javascript">
</script>
<!-----------------------------------------------------------------------------------Header End------------------------------------------------------------------------------------>


<div id="main_top"></div>
<div id="main">
	<h2>Contact Information</h2>
    <div class="col_12 float_l">
    	<h4>Store/Office Location</h4>
        <h6><strong>Store Name</strong></h6>
          		140-280 Nam dictum lorem mollis,<br />
                Phasellus viverra faucibus, 14100<br />
                Laoreet non cursus tincidunt<br /><br />
				
		<strong>Phone:</strong> (000)-111-2222 <br />
        <strong>Email:</strong> <a href="mailto:info@company.com">info@company.com</a><br />
        
        <div class="cleaner h40"></div>  
        <h4>Direction to Our Location</h4>
		<div id="googleMap"></div> <br />
		<div class="cleaner h05"></div>
		<label for="address">Your address:</label> <input type="text" id="address" />
		
	  	<!--<iframe width="450" height="300" frameborder="3" scrolling="no" marginheight="3" marginwidth="3" src="https://maps.google.ca/maps?q=2920+peter+street&amp;ie=UTF8&amp;hq=&amp;hnear=2920+Peter+St,+Windsor,+Ontario+N9C+1G8&amp;gl=ca&amp;t=p&amp;ll=42.305499,-83.071232&amp;spn=0.019043,0.038538&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>-->
	</div>
	
    <div class="col_12 float_r">
    	<h4>Feel free to send us a message.</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc elementum aliquam leo, quis placerat metus fringilla eget. Pellentesque fringilla sagittis vehicula. Vivamus lacinia.</p>
        <div id="contact_form">
           <form method="post" name="contact" action="#">
                        
                        <label for="author">Name:</label> <input type="text" id="author" name="author" class="required input_field" />
                        <div class="cleaner h10"></div>
                        <label for="email">Email:</label> <input type="text" id="email" name="email" class="validate-email required input_field" />
                        <div class="cleaner h10"></div>
                        
						<label for="subject">Subject:</label> <input type="text" name="subject" id="subject" class="input_field" />

						<div class="cleaner h10"></div>
        
                        <label for="text">Message:</label> <textarea id="text" name="text" rows="0" cols="0" class="required"></textarea>
                        <div class="cleaner h10"></div>
                        
                        <input type="submit" value="Send" id="submit" name="submit" class="submit_btn float_l" />
						<input type="reset" value="Reset" id="reset" name="reset" class="submit_btn float_r" />
            </form>
        </div>
	</div>
    
    <div class="cleaner"></div>
</div> <!-- END of main -->

<?php
require_once('includes/footer.php');
?>