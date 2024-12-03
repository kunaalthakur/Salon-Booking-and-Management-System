<?php
require_once __DIR__ . '/../../application/utils/app_config.php';
require_once __DIR__ . '/../../application/utils/form_functions.php';
require_once __DIR__ . '/../../application/auth/check_auth_session.php';
require_once __DIR__ . '/../../application/master/user_master.php';

?>

<div class="modal-header">

        <h5 class="modal-title">Add User </h5>

    <button type="button" class="btn-close" data-bs-dismiss="modal">
    </button>
</div>
<div class="modal-body">
    <div class="card">
        <form id="user_form" method="POST" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>" onsubmit="userFormsubmitHandler('user_form',event)">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-6 col-md-6 mb-4">
                        <label class="form-label font-w600">Name<span class="text-danger scale5 ms-2">*</span></label>
                        <input type="text" onkeypress="return onlyAlphabets(event)" class="form-control input-rounded name" placeholder="Name" value="<?php echo (isset($user_data['name']) ? $user_data['name'] : '') ?>" name="name">

                    </div>
                    <div class="col-xl-6  col-md-6 mb-4">
                        <label class="form-label font-w600">User Name<span class="text-danger scale5 ms-2">*</span></label>
                        <input type="text" class="form-control input-rounded user_name" placeholder="User Name" value="<?php echo (isset($user_data['user_name']) ? $user_data['user_name'] : '') ?>" name="user_name">
                    </div>
                    <div class="col-xl-6  col-md-6 mb-4">
                        <label class="form-label font-w600">Password<span class="text-danger scale5 ms-2">*</span></label>
                        <input type="password" class="form-control input-rounded password" placeholder="Password" value="" name="password">
                    </div>
                    <div class="col-xl-6  col-md-6 mb-4">
                        <label class="form-label font-w600">Mobile No<span class="text-danger scale5 ms-2">*</span></label>
                        <input type="number" class="form-control input-rounded mobile" onkeypress="if(this.value.length == 10){return false;}" placeholder="Mobile no" value="<?php echo (isset($user_data['mobile_no']) ? $user_data['mobile_no'] : '') ?>" name="mobile">
                    </div>
                    <div class="col-xl-6  col-md-6 mb-4">
                        <label class="form-label font-w600">Email Id<span class="text-danger scale5 ms-2">*</span></label>
                        <input type="email" class="form-control input-rounded email" placeholder="Email Id" value="<?php echo (isset($user_data['email_id']) ? $user_data['email_id'] : '') ?>" name="email">
                    </div>
                    <!-- <div class="col-xl-6  col-md-6 mb-4">
                        <label class="form-label font-w600">Role<span class="text-danger scale5 ms-2">*</span></label>
                        <select name="role_name" id="role" class="form-control input-rounded">
                            <option value="" disabled selected>--Select User Roll--</option>
                            <option value="1">Admin</option>
                            <option value="2">Editer</option>
                        </select>
                    
                    </div> -->
                    <div class="col-xl-6  col-md-6 mb-4">
                        <label class="form-label font-w600 status">Status<span class="text-danger scale5 ms-2">*</span></label>
                        <div class="mb-3 mb-0 d-flex ">
                            <div>
                                <input type="radio" value="1" checked class="form-check-input" <?php echo (isset($saloon_data['is_active']) && $saloon_data['is_active'] == 1) ? "checked" : ""; ?> name="status">
                                <label class="form-check-label">
                                    Active
                                </label>
                            </div>
                            <div style="margin-left:25px">
                                <input type="radio" value="0" class="form-check-input" <?php echo (isset($saloon_data['is_active']) && $saloon_data['is_active'] == 0) ? "checked" : ""; ?> name="status">
                                <label class="form-check-label">
                                    Inactive
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" class="form-control input-rounded" name="super_id" value="<?php echo (isset($user_data['super_id']) ? $user_data['super_id'] : 0) ?>">
            <div class="card-footer text-end">
                <div>
                    <button class="btn btn-primary me-3" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-secondary" value="Submit" />
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    function onlyAlphabets(event) {
        var charCode = event.which || event.keyCode;
        // Allow only alphabetic characters (A-Z, a-z)
        if ((charCode >= 65 && charCode <= 90) || (charCode >= 97 && charCode <= 122)) {
            return true; // Allow letter
        }
        return false; // Block other keys (like numbers, symbols, etc.)
    }

</script>