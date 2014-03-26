<?php
require_once('includes/header.php');

$signed_in=false;

// if registration is happening:
if (isset($_POST['registration_email'])&&isset($_POST['first_name'])&&isset($_POST['last_name'])
&&isset($_POST['company'])&&isset($_POST['address'])):

	$password_hash = md5($_POST['password']);
	
	mysql_query("insert into users(email,first_name,last_name,company,address,city,postal_code,"
		."home_phone, cell_phone, gender_is_male,password) values('".
		mysql_real_escape_string($_POST['registration_email'])."','".
		mysql_real_escape_string($_POST['first_name'])."','".
		mysql_real_escape_string($_POST['last_name'])."','".
		mysql_real_escape_string($_POST['company'])."','".
		mysql_real_escape_string($_POST['address'])."','".
		mysql_real_escape_string($_POST['city'])."','".
		mysql_real_escape_string($_POST['postal_code'])."','".
		mysql_real_escape_string($_POST['home_phone'])."','".
		mysql_real_escape_string($_POST['cell_phone'])."',".
		intval($_POST['gender_is_male']).",'".
		mysql_real_escape_string($password_hash).
		"')"
	);
	$_SESSION['user_id']=intval(mysql_insert_id()); // get the auto-generated id for the previous insert.
	$signed_in=true;
	
elseif (isset($_POST['password'])&&isset($_POST['username'])): 
// logging in.

	$res = mysql_query("select * from users where username='".mysql_real_escape_string($_POST['username'])."'");
	
	if ($row = mysql_fetch_assoc($res)):
		$_SESSION['user_id']=intval($row['id']); // get the auto-generated id for the previous insert.
		$signed_in=true;
	endif;
	
endif;

if ($signed_in):
	header("Location: index.php");
endif;

?>
<!-----------------------------------------------------------------------------------Header End------------------------------------------------------------------------------------>

<style>
body {background-image:url('bg.jpg');}
</style>

<div id="main_top"></div>

<div id="main">
	<h2>LOGIN/REGISTRATION PAGE</h2>
    <div class="col_12 float_l">
	<h4>LOGIN</h4>
	<p>Already Registered! Please Login Here.</p>
		<div id="registration_form">
			   <form method="post" name="login" action="#">
							
							<label for="username">Username:</label> 
							<input type="text" id="username" name="username" class="validate-username required input_field" />
							<div class="cleaner h05"></div>
							<label for="author">Password:</label> 
							<input type="password" id="password" name="password" class="required input_field" />
							<div class="cleaner h10"></div>
							
							<input type="submit" value="Login" id="submit" name="submit" class="submit_btn float_l" />
				</form>
		</div>
	</div>
	
    <div class="col_12 float_r">
    	<h4>REGISTER HERE</h4>
        <p>(*) signed fields are required.</p>
        <div id="registration_form">
           <form method="post" name="registration" action="#">
                        <label for="registration_email">*Email:</label>
						<input type="text" id="registration_email" name="registration_email" 
							class="validate-email required input_field" />
                        <div class="cleaner h10"></div>
						<label for="first_name">*First Name:</label> 
						<input type="text" id="first_name" name="first_name" class="required input_field" />
                        <div class="cleaner h10"></div>
						<label for="last_name">*Last Name:</label> 
						<input type="text" id="last_name" name="last_name" class="required input_field" />
                        <div class="cleaner h10"></div>
                        <label for="comp">Company/Organization:</label> 
						<input type="text" id="company" name="company" class="input_field" />
						<div class="cleaner h10"></div>
						<label for="address">*Address Line 1:</label> 
						<input type="text" id="address" name="address" class="required input_field" />
                        <div class="cleaner h10"></div>
						<label for="city">*City/Town:</label> 
						<input type="text" id="author" name="city" class="required input_field" />
                        <div class="cleaner h10"></div>
						<label for="postal_code">*Postal Code:</label> 
						<input type="text" id="postal_code" name="postal_code" class="required input_field" />
                        <div class="cleaner h10"></div>
						<label for="hphone">Home Phone:</label> 
						<input type="text" name="home_phone" id="home_phone" class="input_field" />
						<div class="cleaner h10"></div>
						<label for="cell_phone">Cellphone:</label> 
						<input type="text" name="cell_phone" id="cell_phone" class="input_field" />
						<div class="cleaner h10"></div>
						<label for="gender">*Gender:</label> 
						<select name="gender_is_male">
							<option value="0">Female</option>
							<option value="1">Male</option>
						</select>
														
                        <div class="cleaner h10"></div>
						<label for="password">*Password:</label>
						<input type="password" id="password" name="password" class="required input_field" />
                        <div class="cleaner h10"></div>
						<label for="cpassword">*Confirm Password:</label> 
						<input type="password" id="cpassword" name="cpassword" class="required input_field" />
                        <div class="cleaner h10"></div>
						
                        
                        <input type="submit" value="Register" class="submit_btn float_l" />
						<input type="reset" value="Reset" class="submit_btn float_r" />
            </form>
        </div>
	</div>
    
    <div class="cleaner"></div>
</div> <!-- END of main -->

<?php
require_once('includes/footer.php');
?>