<?php

//@session_start();

include_once __DIR__.'/../utils/app_config.php';
require_once __DIR__ . '/../utils/SessionManager.php';

use SaloonHub\Application\Utils\SessionManager;

$sessionManager = new SessionManager();


if( !$sessionManager->has('logged_in_admin') )

{	
		?>
	<script>
		window.location.href="<?php echo $app_name; ?>/index.php";
	</script>
	<?php
	// header('Location: '.$app_name.'/index.php');
  	exit;

}

// $userDetail= (array) $this->sessionManager->get('logged_in_admin');

// /**

//  * check weather logged in user role have given permission access

//  * @param  string $permission_name 

//  */

// function haveAccessWithRedirect($permission_name)

// {

// 	global $authManager;

// 	global $app_name;

	

// 	return $authManager->getLoggedInUser()->hasAccess($permission_name);

// }

// /**

//  * check weather logged in user role have given permission access

//  * @param  string $permission_name 

//  * @return boolean                  

//  */

// function haveAccess($permission_name)

// {

// 	global $authManager;

	

// 	return $authManager->getLoggedInUser()->hasAccess($permission_name);

// }



// /**

//  * Check wheather user is logged in or not

//  * @return boolean 

//  */

// function isUserLoggedIn()

// {

// 	global $authManager;



// 	return $authManager->isUserLoggedIn();

// }

// /**

//  * check weather logged in user is super or not

//  * @return boolean 

//  */

// function isSuper()

// {

// 	global $authManager;



// 	return $authManager->getLoggedInUser()->isSuper();

// }



// /**

//  * get logged in user

//  * @return User

//  */

// function getLoggedInUser()

// {

// 	global $authManager;



// 	return $authManager->getLoggedInUser();

// }

?>

