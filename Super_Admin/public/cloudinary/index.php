<?php
require("vendor/autoload.php");
require("config_cloudinary.php");
if(isset($_POST['simpan']))
{ 
$nama = $_POST['nama']; 
$slug = $_POST['slug']; 
$gambar = $_FILES['file']['name']; 
$file_tmp = $_FILES['file']['tmp_name']; 

\Cloudinary\Uploader::upload($file_tmp, 
  array("public_id" => $slug));
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


<?php 
//$api->delete_resources_by_prefix("nasir");
echo cl_image_tag("nasir");

?>

</form>



</body>
</html>