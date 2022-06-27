<?
function testReadArray()
{
	$file =fopen("users/users.txt", "r");
	$keys = fgets($file);
	$read_keys = explode('|', $keys);
	$values = file_get_contents("users/users.txt", null, null, 28, null);
	$read_values = explode('|', $values);
	// eerste lijn naar keys
	// 2de lijn naar values
	
	
	fclose($file);
	// echo'ed alle waardes in wachtwoorden, manier vinden om op index te zoeken en wachtwoord aan e-mail te koppelen voor inlog check
	// en naam op te halen bij inlog voor weergave in menu
	$test_array = makeReadValues($read_keys, $read_values);
	foreach ($test_array as $key => $values)
	{
			echo $values['[wachtwoord]'];
	}
}

function getArrayFromFile()
{
	$file =fopen("users/users.txt", "r");
	$keys = fgets($file);
	$read_keys = explode('|', $keys);
	$values = file_get_contents("users/users.txt", null, null, 28, null);
	$read_values = explode('|', $values);
	// eerste lijn naar keys
	// 2de lijn naar values
	
	$read_array = makeReadValues($read_keys, $read_values);	
	fclose($file);
}
// genereer array via loop aan de hand van waardes in readvalues
// indien mogelijk array in arrays.php plaatsen voor overzicht

function makeReadValues($read_keys, $read_values) : array
{
	return array
	('0' => array($read_keys[0] => $read_values[0],
				  $read_keys[1] => $read_values[1],
				  $read_keys[2] => $read_values[2]
				  ),
	 // '1' => array($read_keys[0] => $read_values[3],
				  // $read_keys[1] => $read_values[4],
				  // $read_keys[2] => $read_values[5]
				  // ),
	 // '2' => array($read_keys[0] => $read_values[6],
				  // $read_keys[1] => $read_values[7],
				  // $read_keys[2] => $read_values[8]
				  // ),
	 // '3' => array($read_keys[0] => $read_values[9],
				  // $read_keys[1] => $read_values[10],
				  // $read_keys[2] => $read_values[11]
				  // ),
	 // '4' => array($read_keys[0] => $read_values[12],
				  // $read_keys[1] => $read_values[13],
				  // $read_keys[2] => $read_values[14]
				  // ),
	 // '5' => array($read_keys[0] => $read_values[15],
				  // $read_keys[1] => $read_values[16],
				  // $read_keys[2] => $read_values[17]
				  // ),
	);
}
?>