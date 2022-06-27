<?php

function generateRegisterBody($register_post) 
{
	if ($_SERVER['REQUEST_METHOD'] == 'GET') 
	{ 	
		generateForm('register', $register_post);	    
	}		
	if ($_SERVER['REQUEST_METHOD'] == 'POST') 
	{			
		$register_post = validatePostData($_POST, $register_post, 'getRegisterFields');	
		if (isResultArrayComplete($register_post) && $register_post['wachtwoord'] == $register_post['wachtwoord_controle'])
		// validatie stap maken checken of email al aanwezig is
		// daarna stap maken voor wachtwoorden gelijk
		// stuur naar login pagina bij succes
		{
			$register_data = implode('|', $register_post);
			addRegisterData($register_data);
			showThankYou($register_post); 			
		}
		else 
		{
			generateForm('register', $register_post);	
		}
	}	
}
?>