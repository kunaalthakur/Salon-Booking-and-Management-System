<?php

include_once __DIR__.'/../utils/app_config.php';
include_once __DIR__ . '/../utils/SessionManager.php';

use SaloonHub\Application\Utils\SessionManager;

$sessionManager = new SessionManager();

$sessionManager->removeAll();

header('Location: '.$app_name.'/index.php');

exit;

?>