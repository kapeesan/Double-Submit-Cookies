<?php

require_once 'csrf_token.php';


$csrf_value = $_POST["csrf_token"];


if(isset($_POST['username']))
{
	if(csrf_token::check_csrf_token($csrf_value,$_COOKIE['csrf_cookie']))
	{
		
	 echo "Your form submitted sucessfully!";
		
	}
	else
	{
		echo "  Cross-Site Request Forgery Attack found and it's protected by double submit cookies ";
	}
}

?>