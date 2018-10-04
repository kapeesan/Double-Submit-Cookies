<?php

	if(isset($_POST['username']) && isset($_POST['password']))
	{
		$user = $_POST['username'];
		$pwd =$_POST['password'];

		if (($user=='kapeesan') && ($pwd=='kapeesan'))
		{
			//echo "USER LOGIN SUCCESSFUL.";	
			session_start();
			$csrf_token_value = base64_encode(openssl_random_pseudo_bytes(32));
			$_SESSION['csrf_token'] = $csrf_token_value;
			$session_id = session_id();
			setcookie('session_cookie',$session_id,time()+60*60*24*30,'/');
			setcookie('csrf_cookie',$_SESSION['csrf_token'],time()+60*60*24*30,'/');
		}

		else
		{
			echo "Enter correct username and password";
			exit();
		}

	}

?>


<!DOCTYPE html>
<html lang="en-US" prefix="og: http://ogp.me/ns#">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no'>
        <title>Details Page</title>
        <link rel='stylesheet' href='https://themes.getbootstrap.com/wp-content/themes/bootstrap-marketplace/style.css?ver=1531597991' />
		
		
    </head>
    <body class="page-template-default page page-id-7 page-parent woocommerce woocommerce-account woocommerce-page dokan-theme-dokan">

		<main id="main" class="site-main main">
			<section class="section">
				<div class="container">
					<div class="row">
						<div class="container container--xs">
							<div class="woocommerce">



								<div id="signup_div_wrapper" style="margin-top:-100px !important">
								
									<h1 class="mb-1 text-center">Kindly fill all fields</h1>
									

    												

										<form method="post" action="submit.php" class="register">

											<p class="woocommerce-FormRow woocommerce-FormRow--first form-row form-row-first">
												<label for="reg_sr_firstname">Name <span class="required">*</span></label>
												<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="name" value="Kapeesan"  required/>
											</p>

											<p class="woocommerce-FormRow woocommerce-FormRow--last form-row form-row-last">
												<label for="reg_sr_lastname">Nationality <span class="required">*</span></label>
												<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="nationality" id="nationality" value="Srilankan"  required />
											</p>
			
			
											<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
												<label for="reg_email">contact No <span class="required">*</span></label>
												<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="contact" id="contact" value="0778956145" />
											</p>

											<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
												<label for="reg_password">Address <span class="required">*</span></label>
												<textarea class="woocommerce-Input woocommerce-Input--text input-text" name="phone" id="address">New kandy rd, Kaduwela. </textarea>
											</p>
											
											<p class="woocomerce-FormRow form-row">
												          
												<input type="submit" class="btn btn-brand btn-block btn-lg mb-4 mt-3" style="margin:0;background-color:#00bfff !important;" name="submit" value="Submit" />
											</p>
											
											
											
											<input type="hidden" name="csrf_token" value="" id="csrf_token"/>
    
										</form>
									

                                       
   

								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
        </main>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script>
			$(document).ready(function()
			{
				var name = "csrf_cookie" + "=";
				var cookie_value = "";
				var decoded_cookie = decodeURIComponent(document.cookie);
				var d = decoded_cookie.split(';');
				for(var i = 0; i <d.length; i++) 
				{
					var c = d[i];
					while (c.charAt(0) == ' ') 
					{
						c = c.substring(1);
					}
					if (c.indexOf(name) == 0) 
					{
						cookie_value = c.substring(name.length, c.length);
						document.getElementById("csrf_token").setAttribute('value', cookie_value);
					}
				}
			});
	   </script>
	   


	</body>
</html>