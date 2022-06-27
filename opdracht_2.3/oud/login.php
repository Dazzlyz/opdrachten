<?php

function generateLoginBody($login_post) 
{
	if ($_SERVER['REQUEST_METHOD'] == 'GET') 
	{ 		
	    generateForm('login', $login_post);
	}		
	if ($_SERVER['REQUEST_METHOD'] == 'POST') 
	{			
		$login_post = validatePostData($_POST, $login_post, 'getLoginFields');	
		$login_data = getArrayFromFile();
				
		// is login correct met formulier? zet dan session naar ingelogd. 
		if (isResultArrayComplete($login_post))
		{
			showThankYou($login_post); 
		}			
		else 
		{
			 generateForm('login', $login_post);		
		}
	}	
}
?>