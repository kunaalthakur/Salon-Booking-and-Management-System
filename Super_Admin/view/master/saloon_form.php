<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require_once __DIR__ . '/../../application/utils/app_config.php';
require_once __DIR__ . '/../../application/utils/form_functions.php';
require_once __DIR__ . '/../../application/auth/check_auth_session.php';
require_once __DIR__ . '/../../application/master/add_saloon.php';


?>
<style>
.modal-content{
    width: 125%;
}
.profile-picture {
  opacity: 0.75;
  height: 210px;
  width: 320px;
  position: relative;
  overflow: hidden;
  left: 17%;
  /* default image */
  /* background-image: url('https://tool.jobassam.in/img/preview.png'); */

  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  box-shadow: 0 8px 6px -6px black;
}
.file-uploader {
  /* make it invisible */
  opacity: 0;
  /* make it take the full height and width of the parent container */
  height: 100%;
  width: 100%;
  cursor: pointer;
  /* make it absolute */
  position: absolute;
  top: 0%;
  left: 0%;
}
.upload-icon {
  position: absolute;
  top: 45%;
  left: 50%;
  transform: translate(-50%, -50%);
  /* initial icon state */
  opacity: 0;
  transition: opacity 0.3s ease;
  color: #ccc;
  -webkit-text-stroke-width: 2px;
  -webkit-text-stroke-color: #bbb;
}
.profile-picture:hover .upload-icon {
  opacity: 1;
}
</style>

<div class="modal-header">
    <?php if ($saloon_id == 0) : ?>
        <h5 class="modal-title">Add New Saloon </h5>
    <?php else : ?>
        <h5 class="modal-title">Edit Saloon </h5>
    <?php endif; ?>
    <button type="button" class="btn-close" data-bs-dismiss="modal">
    </button>
</div>
<div class="modal-body">
    <div class="card">
        <form id="saloon_form" method="POST" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>" onsubmit="saloonFormsubmitHandler('saloon_form',event)">
            <div class="card-body" style="padding: 10px">

                <div class="row">

                    <div class="col-xl-12  col-md-12 mb-4">
                        <label class="form-label font-w600">Saloon Name<span class="text-danger scale5 ms-2">*</span></label>
                        <input type="text" class="form-control input-rounded saloon_name" placeholder="Saloon Name" value="<?php echo (isset($saloon_data['saloon_name']) ? $saloon_data['saloon_name'] : '') ?>" name="saloon_name" >
                    </div>
                
                    <div class="col-xl-6  col-md-6 mb-4">
                        <label class="form-label font-w600">Opening Time<span class="text-danger scale5 ms-2">*</span></label>
                        <input type="time" class="form-control input-rounded open_time" placeholder="opening time" value="<?php echo (isset($saloon_data['salon_opning_time']) ? $saloon_data['salon_opning_time'] : '') ?>" name="open_time">
                    </div>
                    <div class="col-xl-6  col-md-6 mb-4">
                        <label class="form-label font-w600">Closing Time<span class="text-danger scale5 ms-2">*</span></label>
                        <input type="time" class="form-control input-rounded close_time" placeholder="closing time" value="<?php echo (isset($saloon_data['salon_closing_time']) ? $saloon_data['salon_closing_time'] : '') ?>" name="close_time">
                    </div>
                    <div class="col-xl-6  col-md-6 mb-4">
                        <label class="form-label font-w600">Email id<span class="text-danger scale5 ms-2">*</span></label>
                        <input type="email" class="form-control input-rounded email" placeholder="Email id" value="<?php echo (isset($saloon_data['email_id']) ? $saloon_data['email_id'] : '') ?>" name="email">
                    </div>
                    <div class="col-xl-6  col-md-6 mb-4">
                        <label class="form-label font-w600">Mobile No.<span class="text-danger scale5 ms-2">*</span></label>
                        <input type="number" class="form-control input-rounded mobile" placeholder="Mobile no" onkeypress="if(this.value.length == 10){return false;}" value="<?php echo (isset($saloon_data['mobile_no']) ? $saloon_data['mobile_no'] : '') ?>" name="mobile">
                    </div>
                    <div class="col-xl-12  col-md-12 mb-4">
                        <label class="form-label font-w600">Address<span class="text-danger scale5 ms-2">*</span></label>
                        <input type="text" name="address" class="form-control input-rounded address" placeholder="Enter Address here..." value="<?php echo (isset($saloon_data['adress']) ? $saloon_data['adress'] : '') ?>">
                    </div>
                    <div class="col-xl-12  col-md-12 mb-4">
                        <label class="form-label font-w600">Status<span class="text-danger scale5 ms-2">*</span></label>
                        <div class="mb-3 mb-0 d-flex ">
                            <div>
                                <input type="radio" value="1" <?php echo (isset($saloon_data['is_active']) && $saloon_data['is_active'] == 1) ? "checked" : ""; ?> class="form-check-input" name="status">
                                <label class="form-check-label">
                                    Active
                                </label>
                            </div>
                            <div style="margin-left:25px">
                                <input type="radio" value="0" <?php echo (isset($saloon_data['is_active']) && $saloon_data['is_active'] == 0) ? "checked" : ""; ?> class="form-check-input" name="status">
                                <label class="form-check-label">
                                    Inactive
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12  col-md-12 mb-4">
                        <label class="form-label font-w600">Upload saloon image<span class="text-danger scale5 ms-2">*</span></label>
                        <div class="profile-picture">
                            <h1 class="upload-icon">
                                <i class="fa fa-plus fa-2x" aria-hidden="true"></i>
                            </h1>
                            <input
                                class="file-uploader"
                                type="file"
                                name="saloon_img"
                                onchange="upload()"
                                accept="image/*"
                            />
                            <input type="hidden" name="old_img" value="<?php echo (isset($saloon_data['img_path']) ? $saloon_data['img_path'] : '') ?>">
                        </div>
                    </div>
                    
                </div>
            </div>
            <input type="hidden" class="form-control input-rounded" name="saloon_id" value="<?php echo (isset($saloon_data['salon_id']) ? $saloon_data['salon_id'] : 0) ?>">
            <div class="card-footer text-end" style="padding: 10px 10px 10px;">
                <div>
                    <button class="btn btn-primary me-3" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-secondary" value="Submit" />
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    let img_url = <?php echo json_encode(
    isset($saloon_data['img_path']) 
    ? $CloudinaryPath . folder_dir . "restaurant_banner/" . $saloon_data['img_path'] 
    : 'https://tool.jobassam.in/img/preview.png'
  ); ?>;
  console.log(img_url);
    
    const profilePicture = document.querySelector('.profile-picture');
    profilePicture.style.backgroundImage = `url(${img_url})`;


    function upload(){
        const fileUploadInput = document.querySelector('.file-uploader');

        // using index [0] to take the first file from the array
        const image = fileUploadInput.files[0];

        // check if the file selected is not an image file
        if (!image.type.includes('image')) {
            return alert('Only images are allowed!');
        }

        // check if size (in bytes) exceeds 10 MB
        if (image.size > 10_000_000) {
            return alert('Maximum upload size is 10MB!');
        }

        const fileReader = new FileReader();
        fileReader.readAsDataURL(image);
        fileReader.onload = (fileReaderEvent) => {
            const profilePicture = document.querySelector('.profile-picture');
            profilePicture.style.backgroundImage = `url(${fileReaderEvent.target.result})`;
        }
    }
    
</script>