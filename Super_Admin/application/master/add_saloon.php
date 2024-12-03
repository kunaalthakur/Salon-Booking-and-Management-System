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

$saloon_id = isset($_GET['saloon_id']) ? $_GET['saloon_id'] : 0;

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

      $action = (isset($_GET['action']) ? $_GET['action'] : '');

      if ($action == "get_all_saloons") {
            
            $all_saloon_sql = "SELECT *,DATE_FORMAT(salon_opning_time, '%h:%i %p') AS opening_time,DATE_FORMAT(salon_closing_time, '%h:%i %p') AS closing_time FROM salon_master;";  
            $saloon_get = $pdo->prepare($all_saloon_sql);      
            $saloon_get->execute();                            
            
 
            $saloon_list = $saloon_get->fetchAll(PDO::FETCH_ASSOC);


            echo Response::generateJSONResponse(200, 'Saloon List', ['saloon_list' => $saloon_list]);

      }
      else if($action == "get_salon_by_id") {


            $saloon_sql = "SELECT * FROM salon_master WHERE salon_id= :saloon_id";  
            $saloon_get = $pdo->prepare($saloon_sql);      
            $saloon_get->execute([
                  'saloon_id' => $saloon_id
            ]);                            
            
      
            $saloon_data = $saloon_get->fetch(PDO::FETCH_ASSOC);
            
      }

    //   $saloon_data=$MasterService->getCategoryById($category_id);
      
}


// POST request block

if ($_SERVER['REQUEST_METHOD'] == "POST") {

      $action = (isset($_POST['action']) ? $_POST['action'] : '');


      if ($action == 'delete_saloon') {

            $saloon_id = $_POST['saloon_id'];

            $delete_salon_sql = "DELETE FROM `salon_master` WHERE `salon_id`=:salon_id";
            $delete_salon = $pdo->prepare($delete_salon_sql);
            $delete_salon->execute([
                  'salon_id' => $saloon_id
            ]);

            if ($delete_salon) {
                  echo Response::generateJSONResponse(200, 'The saloon is Deleted.',['delete' => true]);
                  exit;
            }
            else{
                  echo Response::generateJSONResponse(401, 'Saloon deletion proccess Failed...',['delete' => false]);
                  exit;
            }

      }


      $rules = [

            'saloon_name' => ['required'],
            'open_time' => ['required'],
            'close_time' => ['required'],
            'email' => ['required'],
            'mobile' => ['required','min_length:10'],
            'address' => ['required']
            
      ];

      $validator = Validator::makeValidator($_POST, $rules, true);


      if ($validator->isValidationFailed()) {
            $error_collection = new Collection($validator->getErrorMessages());
            $error_collection->set("message_tittle", "Please correct below errors");
            echo Response::generateJSONResponse(400, 'Required all fields', $error_collection->values());
            exit;
      }

      $collection   = new Collection([]);

      $saloon_name = $_POST['saloon_name'];
      $open_time = $_POST['open_time'];
      $close_time = $_POST['close_time'];
      $email = $_POST['email'];
      $mobile = $_POST['mobile'];
      $address = $_POST['address'];
      $created_by = $sessionManager->get('logged_in_admin')['admin_id'];
      $is_active = $_POST['status'];
      $salon_id = $_POST['saloon_id'];

      // echo $salon_id;

      if (isset($_FILES['saloon_img']['name'])) {
            $img = $_FILES['saloon_img']['name'];
            $img_temp = isset($_FILES['saloon_img']['tmp_name']) ? $_FILES['saloon_img']['tmp_name'] : '';
            $img_path = explode('.', $img);
            $saloon_img = uniqid(rand(00000, 99999)) . $img_path[0];

      } else {
            $img = "";
            $saloon_img = "";
      }


      if ($salon_id == 0) {

            $saloon_details_sql = "SELECT * FROM `salon_master` WHERE email_id= :email OR mobile_no= :mobile_no ";

            $run_query = $pdo->prepare($saloon_details_sql);
            $run_query->execute([
            'email'       => $email,
            'mobile_no'   => $mobile
            ]);
      
            $get_saloon_details = $run_query->fetch(PDO::FETCH_ASSOC);
      
            if(!is_null($get_saloon_details) && !empty($get_saloon_details)){


                  $collection->set("message_tittle", "The saloon is already registered with this email id or mobile number.");

                  echo Response::generateJSONResponse(409, 'The saloon is already registered with this email id or mobile number.',$collection->values());
                  exit;
                  
            }
            
            if ($img != "") {
                  \Cloudinary\Uploader::upload($img_temp,   array("folder" => folder_dir . "restaurant_banner/", "public_id" => (string)$saloon_img));
            }

            $saloon_add_sql = "INSERT INTO `salon_master`(`saloon_name`, `img_path`, `salon_opning_time`, `salon_closing_time`, `adress`, `email_id`, `mobile_no`, `created_by`, `is_active`) VALUES (:saloon_name, :img_path,:salon_opning_time, :salon_closing_time, :adress, :email, :mobile, :created_by, :is_active)";

            $add_saloon = $pdo->prepare($saloon_add_sql);
            $add_saloon->execute([
                  'saloon_name' => $saloon_name, 
                  'img_path' => $saloon_img,
                  'salon_opning_time' => $open_time,
                  'salon_closing_time' => $close_time, 
                  'adress' => $address, 
                  'email' => $email, 
                  'mobile' => $mobile,
                  'created_by' => $created_by,
                  'is_active' => $is_active
            ]);

            if ($add_saloon) {
                  echo Response::generateJSONResponse(200, 'The saloon is registered successfully.',['registration' => true]);
                  exit;
            }
            else{
                  echo Response::generateJSONResponse(401, 'Saloon Registration Failed...',['registration' => false]);
                  exit;
            }
      }
      else {
            $saloon_update_img_sql = "UPDATE `salon_master` SET `saloon_name`=:saloon_name,`img_path`=:img_path,`salon_opning_time`=:opening_time,`salon_closing_time`=:closing_time,`adress`=:adress,`email_id`=:email,`mobile_no`=:mobile,`is_active`=:is_active WHERE `salon_id`=:salon_id";
            $saloon_update_sql = "UPDATE `salon_master` SET `saloon_name`=:saloon_name,`salon_opning_time`=:opening_time,`salon_closing_time`=:closing_time,`adress`=:adress,`email_id`=:email,`mobile_no`=:mobile,`is_active`=:is_active WHERE `salon_id`=:salon_id";
            
            $old_img = $_POST['old_img'];

            if ($img != '') {
                  // remove old img from cloudinary
                  \Cloudinary\Uploader::destroy(folder_dir . "restaurant_banner/" . (string)$old_img);
                  
                  // upload new img
                  \Cloudinary\Uploader::upload($img_temp,   array("folder" => folder_dir . "restaurant_banner/", "public_id" => (string)$saloon_img));

                  $update_salon = $pdo->prepare($saloon_update_img_sql);
                  $update_salon->execute([
                        'saloon_name' => $saloon_name, 
                        'img_path' => $saloon_img,
                        'opening_time' => $open_time,
                        'closing_time' => $close_time, 
                        'adress' => $address, 
                        'email' => $email, 
                        'mobile' => $mobile,
                        'is_active' => $is_active,
                        'salon_id' => $salon_id
                  ]);

                  if ($update_salon) {
                        echo Response::generateJSONResponse(200, 'Salon is updated successfully.',['update' => true]);
                        exit;
                  }
                  else{
                        echo Response::generateJSONResponse(401, 'Salon Update is Failed...',['update' => false]);
                        exit;
                  }

            }
            else {
                  
                  $update_salon = $pdo->prepare($saloon_update_sql);
                  $update_salon->execute([
                        'saloon_name' => $saloon_name, 
                        'opening_time' => $open_time,
                        'closing_time' => $close_time, 
                        'adress' => $address, 
                        'email' => $email, 
                        'mobile' => $mobile,
                        'is_active' => $is_active,
                        'salon_id' => $salon_id
                  ]);

                  if ($update_salon) {
                        echo Response::generateJSONResponse(200, 'Salon is updated successfully.',['update' => true]);
                        exit;
                  }
                  else{
                        echo Response::generateJSONResponse(401, 'Salon Update is Failed...',['update' => false]);
                        exit;
                  }

            }

            
      }
      

}
