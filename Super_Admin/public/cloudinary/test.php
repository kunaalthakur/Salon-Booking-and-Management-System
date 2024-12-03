<?php
require("vendor/autoload.php");
require("config_cloudinary.php");
if(isset($_POST['simpan']))
{ 
$nama = $_POST['nama']; 
$slug = $_POST['slug']; 
$gambar = $_FILES['file']['name']; 
$file_tmp = $_FILES['file']['tmp_name']; 
// \Cloudinary\Uploader::upload($file_tmp, 
//   array("public_id" => $slug));
$old_img = '3082267365b3b08912salon_new';

$options = array(
  "folder" => folder_dir . "restaurant_banner/", // The folder where the image is stored
  "invalidate" => true,    // Whether or not to invalidate cached versions of the image (optional)
);

$public_id = folder_dir . "restaurant_banner/" . $old_img;
// Attempt to destroy the image using Cloudinary's Uploader class
try {
  $result = \Cloudinary\Uploader::destroy($public_id, $options);

  // Check the result of the destroy operation
  if (isset($result['result']) && $result['result'] === 'ok') {
      echo "Image successfully deleted from Cloudinary.";
  } else {
      echo "Failed to delete the image. Result: " . print_r($result, true);
  }
} catch (Exception $e) {
  echo 'Error: ' . $e->getMessage();
}

  // \Cloudinary\Uploader::destroy($old_img, [
  //   "folder" => folder_dir . "restaurant_banner/",
  //   "public_id" => (string)$old_img
  // ]);
} 



?>
<!DOCTYPE html>
<html>
<head>


    <!-- Your app title -->
    <title>Parter Panel - Items List</title>
  <style type="text/css">
{width: 200 ; margin-right: 10 ;}

  </style>
</head>

<body >

<form method="post" enctype="multipart/form-data">

<input type="text" name="nama" required="" placeholder="nama gambar"> 
<input type="text" name="slug" required="" placeholder="slug gambar">
<input type="file" name="file">
<input type="submit" name="simpan" value="Simpan">
</form>

<?php 
//$api->delete_resources_by_prefix("nasir");
// echo cl_image_tag("nasir");

?>

</form>



</body>
</html>