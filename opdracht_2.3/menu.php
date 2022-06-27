<?php 
// BASELINK constant nog een keer maken
// define('BASELINK', 'opdracht_x/index.php');

function getMenuItems(string $username = '') : array
{
	$items = [
		'home'		=> 'Home',
		'about' 	=> 'About me',
		'contact' 	=> 'Contact me'
	];
	if ($username)
	{
		return array_merge($items, ['logout' => 'Logout '.$username, 'change' => 'Change Password']);
	}
	return array_merge($items, ['login' => 'Login', 'register' => 'Register']);
}

function showMenuItem(string $page, string $title) : void
{
	echo '<li class="menu_item"><a href="index.php?page='.$page.'">'.$title.'</a></li>'.PHP_EOL;
}

function showMenu(array $items) : void
{
	echo '<ul class="menu">'.PHP_EOL;
	foreach ($items as $page => $title)
	{
		showMenuItem($page, $title);
	}
	echo '</ul>'.PHP_EOL;
}
?>