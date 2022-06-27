<?php

function generateBody($post_result, $page) 
{
	if ($_SERVER['REQUEST_METHOD'] == 'GET') 
	{ 	
		switch ($page)
		{	
			case 'contact' :
				generateForm('contact', $post_result, 'getContactFields');	    
			break;
			case 'register' :
				generateForm('register', $post_result, 'getRegisterFields');
			break;
			case 'login' :
				generateForm('login', $post_result, 'getLoginFields');	
			break;
			case 'change' :
				generateForm('change', $post_result, 'getChangePasswordFields');	
			break;
		}
	}		
	if ($_SERVER['REQUEST_METHOD'] == 'POST') 
	{	
		checkPostRequest($post_result, $page);		
	}	
}

function checkPostRequest($post_result, $page)
{
	switch ($page)
	{
		case 'contact' :
			$post_result = validatePostData($_POST, $post_result, 'getContactFields');	
			handlePost('contact', $post_result);					
		break;
		case 'register' :
			$register_post = validatePostData($_POST, $post_result, 'getRegisterFields');	
			handlePost('register', $register_post);					
		break;
		case 'login' :
			$login_post = validatePostData($_POST, $post_result, 'getLoginFields');	
			handlePost('login', $login_post);	
		break;
		case 'change' :
			$change_post = validatePostData($_POST, $post_result, 'getChangePasswordFields');	
			handlePost('change', $change_post);				
		break;			
	}		
}

// kijken naar wat uniek is voor veld
function handlePost($page, $result_array)
{
	switch($page)
	{
		case 'contact' :
			if (isResultArrayComplete($result_array))
			{
				showThankYou($result_array); 
			}
			else 
			{
				generateForm('contact', $result_array, 'getContactFields');	     
			}
		break;
		case 'register' :
			if (!isResultArrayComplete($result_array))
			// code bij succes op andere plek nu ook aanwezig
			{
				generateForm('register', $result_array, 'getRegisterFields');
			}	
			
		break;
		// elegantere oplossing? 
		case 'login' :	
			generateForm('login', $result_array, 'getLoginFields');					
		break;
		case 'change' :
			if (!isResultArrayComplete($result_array))
			{
				generateForm('change', $result_array, 'getChangePasswordFields');	
			}
		break;
	}
}
?>