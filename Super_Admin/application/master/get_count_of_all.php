<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require_once __DIR__ . '/../utils/db_config.php';


require_once __DIR__ . '/../libraries/collection/Collection.php';
require_once __DIR__ . '/../utils/Response.php';


use SaloonHub\Application\Utils\Response;
use PHPR\Collection;

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

      
    $all_count_sql = "SELECT (SELECT COUNT(*) FROM salon_master) AS salon_count, (SELECT COUNT(*) FROM booking_master) AS booking_count, (SELECT COUNT(*) FROM customer_master) AS customer_count;";  
    $all_count = $pdo->prepare($all_count_sql);      
    $all_count->execute();                            
    

    $all_count_list = $all_count->fetchAll(PDO::FETCH_ASSOC);


    echo Response::generateJSONResponse(200, 'All Count List', ['all_count_list' => $all_count_list]);

      
}