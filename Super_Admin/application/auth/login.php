<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require_once __DIR__ . '/../utils/db_config.php';

include_once __DIR__ . '/../utils/Response.php';
include_once __DIR__ . '/../utils/Validator.php';
include_once __DIR__ . '/../libraries/collection/Collection.php';
require_once __DIR__ . '/../utils/SessionManager.php';



use SaloonHub\Application\Utils\Response;

use SaloonHub\Application\Utils\Validator;

use SaloonHub\Application\Utils\SessionManager;

use PHPR\Collection;

$sessionManager = new SessionManager();

if ($_SERVER['REQUEST_METHOD'] == "POST") {

 if(isset($_POST['user_name']) && isset($_POST['password']))
 {
     
       $user=$_POST['user_name'];
       $passwd=$_POST['password'];

       $error_collection= new collection([]);

       $rules=[

          'user_name'=>['required'],
          'password'=>['required','min_length:6']

       ];
          
       $validator= Validator::makeValidator($_POST,$rules,true);
       
       if($validator->isValidationFailed())
       {
            $error_collection= new Collection($validator->getErrorMessages());

            $error_collection->set('message_tittle','Please correct below errors');

            echo Response::generateJSONResponse(400, "Auth Failed due to invalid data", $error_collection->values());

            exit;
       }

      $auth_sql = 'SELECT * FROM super_admin WHERE user_name=:user_name AND status=:status';

      $perform_auth = $pdo->prepare($auth_sql);
      $perform_auth->execute([
          'user_name' => $user,
          'status' => 1
      ]);
  
      $user = $perform_auth->fetch(PDO::FETCH_ASSOC);

      if (!is_null($user) && !empty($user)) {

            
        
            if (password_verify($passwd,$user['password'])) {

                  $user_data = [];
                  $user_data['admin_id']  =  $user['super_id'];
                  $user_data['fname'] = $user['first_name'];
                  $user_data['lname'] = $user['last_name'];
                  $user_data['user_name'] = $user['user_name'];
                  $user_data['mobile_no'] = $user['mobile_no'];
                  $user_data['email'] = $user['email_id'];
                  
                  $sessionManager->store('logged_in_admin',$user_data);

                  echo Response::generateJSONResponse(200, "Succesfully logged In", ['logged_in' => true]);
                  exit;
            }
            else {
                  
                  $error_collection->set("message_tittle",'Either UserName or Password is in correct..');
                  echo Response::generateJSONResponse(400, "Auth Failed due to incorrct auth data",$error_collection->values());
                  exit;
            }

      }
      else {
            $error_collection->set("message_tittle",'Either UserName or Password is in correct..');
            echo Response::generateJSONResponse(400, "Auth Failed due to incorrct auth data",$error_collection->values());
            exit;
      }
        

 }

}



?>