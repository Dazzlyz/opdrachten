<?php

function generateFormBody($post_result) 
{
	if ($_SERVER['REQUEST_METHOD'] == 'GET') 
	{ 		
		generateForm('contact', $post_result);	    
	}		
	if ($_SERVER['REQUEST_METHOD'] == 'POST') 
	{		
		$post_result = validatePostData($_POST, $post_result, 'getContactFields');	

		if (isResultArrayComplete($post_result))
		{
			showThankYou($post_result); 
		}
		else 
		{
			generateForm('contact', $post_result);	    
		}
	}	
}

?> 