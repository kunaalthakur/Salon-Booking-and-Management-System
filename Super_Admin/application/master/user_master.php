<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require_once __DIR__ . '/../utils/db_config.php';

require_once __DIR__ . '/../utils/Validator.php';
require_once __DIR__ . '/../libraries/collection/Collection.php';
require_once __DIR__ . '/../utils/Response.php';
require_once __DIR__ . '/../utils/SessionManager.php';
require_once __DIR__ . '/../../public/cloudinary/vendor/autoload.php';
require_once __DIR__ . '/../../public/cloudinary/config_cloudinary.php';


use SaloonHub\Application\Utils\Validator;
use SaloonHub\Application\Utils\Response;
use PHPR\Collection;
use SaloonHub\Application\Utils\SessionManager;

$sessionManager = new SessionManager();

$user_id = isset($_GET['super_id']) ? $_GET['super_id'] : 0;

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

      $action = (isset($_GET['action']) ? $_GET['action'] : '');

      if ($action == "get_user_list") {
            
            $all_user_sql = "SELECT * FROM `super_admin`;";  
            $all_user = $pdo->prepare($all_user_sql);      
            $all_user->execute();                            
            
 
            $all_user_list = $all_user->fetchAll(PDO::FETCH_ASSOC);


            echo Response::generateJSONResponse(200, 'All User List', ['all_user_list' => $all_user_list]);

      }
      else if($action == "get_user_by_id") {


            $user_sql = "SELECT * FROM super_admin WHERE super_id= :super_id";  
            $user_get = $pdo->prepare($user_sql);      
            $user_get->execute([
                  'super_id' => $user_id
            ]);                            
            
      
            $user_data = $user_get->fetch(PDO::FETCH_ASSOC);

            // print_r($user_data);
            
      }

      
}


// POST request block

if ($_SERVER['REQUEST_METHOD'] == "POST") {

      $action = (isset($_POST['action']) ? $_POST['action'] : '');

    if ($action == 'delete_user') {

        $user_id_del = $_POST['super_id'];


        $user_delete_sql = "DELETE FROM `super_admin` WHERE super_id=:super_id";

        $user_delete = $pdo->prepare($user_delete_sql);
        $user_delete->execute([
                'super_id' => $user_id_del
        ]);

        if ($user_delete) {
                echo Response::generateJSONResponse(200, 'User is deleted successfully.',['delete' => true]);
                exit;
        }
        else{
                echo Response::generateJSONResponse(401, 'User is not deleted...',['delete' => false]);
                exit;
        }
    }
      $rules = [

            'name' => ['required'],
            'user_name' => ['required'],
            // 'password' => ['required'],
            'mobile' => ['required','numeric','min_length:10'],
            'email' => ['required','email'], //'email'
            'status' => ['required']
            
      ];

      $validator = Validator::makeValidator($_POST, $rules, true);


      if ($validator->isValidationFailed()) {
            $error_collection = new Collection($validator->getErrorMessages());
            $error_collection->set("message_tittle", "Please correct below errors");
            echo Response::generateJSONResponse(400, 'Required all fields', $error_collection->values());
            exit;
      }

      $collection   = new Collection([]);

      $name = $_POST['name'];
      $user_name = $_POST['user_name'];
      $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
      $email = $_POST['email'];
      $mobile = $_POST['mobile'];
      $created_by = $sessionManager->get('logged_in_admin')['admin_id'];
      $is_active = $_POST['status'];
      $super_id = $_POST['super_id'];

      // echo $super_id;

      if ($super_id == 0) {

            $user_details_sql = "SELECT * FROM `super_admin` WHERE email_id= :email OR mobile_no= :mobile_no ";

            $run_query = $pdo->prepare($user_details_sql);
            $run_query->execute([
            'email'       => $email,
            'mobile_no'   => $mobile
            ]);
      
            $get_user_details = $run_query->fetch(PDO::FETCH_ASSOC);
      
            if(!is_null($get_user_details) && !empty($get_user_details)){


                  $collection->set("message_tittle", "User is already registered with this email id or mobile number.");

                  echo Response::generateJSONResponse(409, 'User is already registered with this email id or mobile number.',$collection->values());
                  exit;
                  
            }
            

            $user_add_sql = "INSERT INTO `super_admin`(`name`, `user_name`, `password`, `mobile_no`, `email_id`, `created_by`, `status`) VALUES (:name,:user_name,:password,:mobile_no,:email_id,:created_by,:status)";

            $add_user = $pdo->prepare($user_add_sql);
            $add_user->execute([
                  'name' => $name, 
                  'user_name' => $user_name,
                  'password' => $password,
                  'mobile_no' => $mobile, 
                  'email_id' => $email, 
                  'created_by' => $created_by,
                  'status' => $is_active
            ]);

            if ($add_user) {
                  echo Response::generateJSONResponse(200, 'User is created successfully.',['registration' => true]);
                  exit;
            }
            else{
                  echo Response::generateJSONResponse(401, 'User is not created...',['registration' => false]);
                  exit;
            }
      }
      else {
            
            $user_update_sql = "UPDATE `super_admin` SET `name`=:fname,`user_name`=:user_name,`mobile_no`=:mobile,`email_id`=:email,`status`=:is_active WHERE `super_id`=:user_id";
            $user_update_with_pass_sql = "UPDATE `super_admin` SET `name`=:fname,`user_name`=:user_name,`password`=:passwd,`mobile_no`=:mobile,`email_id`=:email,`status`=:is_active WHERE `super_id`=:user_id";

            if ($password != "") {

                  $update_user = $pdo->prepare($user_update_with_pass_sql);
                  $update_user->execute([
                        'fname' => $name, 
                        'user_name' => $user_name,
                        'passwd' => $password,
                        'mobile' => $mobile, 
                        'email' => $email, 
                        'is_active' => $is_active,
                        'user_id' => $super_id
                  ]);

                  if ($update_user) {
                        echo Response::generateJSONResponse(200, 'User is updated successfully.',['update' => true]);
                        exit;
                  }
                  else{
                        echo Response::generateJSONResponse(401, 'User Update is Failed...',['update' => false]);
                        exit;
                  }
            }
            else{

                  $update_user = $pdo->prepare($user_update_sql);
                  $update_user->execute([
                        'fname' => $name, 
                        'user_name' => $user_name,
                        'mobile' => $mobile, 
                        'email' => $email, 
                        'is_active' => $is_active,
                        'user_id' => $super_id
                  ]);

                  if ($update_user) {
                        echo Response::generateJSONResponse(200, 'User is updated successfully.',['update' => true]);
                        exit;
                  }
                  else{
                        echo Response::generateJSONResponse(401, 'User Update is Failed...',['update' => false]);
                        exit;
                  }  
            }
      }


}
