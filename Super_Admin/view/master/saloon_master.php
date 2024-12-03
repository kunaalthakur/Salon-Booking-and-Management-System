<?php 

require_once __DIR__ . '/../../application/utils/app_config.php';
require_once __DIR__ . '/../../application/auth/check_auth_session.php';

require_once __DIR__ .'/../../public/cloudinary/vendor/autoload.php';
require_once __DIR__ . '/../../public/cloudinary/config_cloudinary.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Jobick : Job Admin Bootstrap 5 Template">
    <meta property="og:title" content="Jobick : Job Admin Bootstrap 5 Template">
    <meta property="og:description" content="Jobick : Job Admin Bootstrap 5 Template">
    <meta property="og:image" content="https://jobick.dexignlab.com/xhtml/social-image.png">
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>Saloon Hub Admin</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="<?php echo $app_name; ?>/public/images/salon.png">
    <!-- Datatable -->
    <link href="<?php echo $app_name; ?>/public/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="<?php echo $app_name; ?>/public/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <!-- Sweet alert-->
    <link href="<?php echo $app_name; ?>/public/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

    <link href="<?php echo $app_name; ?>/public/css/style.css" rel="stylesheet">

</head>
<style>

.img_view {
    width: 160px;
    height: 140px;
}

/* Image Styling */
.img_view img {
    width: 100%;
    height: 100%;
    border-radius: 5px; /* Rounded corners */
}

/* Badge Styles */
.badge {
    padding: 5px 10px; /* Padding for badges */
    border-radius: 5px; /* Rounded corners for badges */
}


</style>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="<?php echo $app_name;?>/view/home.php" class="brand-logo">
                <img src="<?php echo $app_name; ?>/public/images/salon.png" style="width: 120px;">
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->


        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
                                All Saloons
                            </div>

                        </div>

                        <ul class="navbar-nav header-right">

                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                    <img src="<?php echo $app_name; ?>/public/images/profile.jpg" width="20" alt="">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#" class="dropdown-item ai-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        <span class="ms-2">Profile </span>
                                    </a>
                                    <a href="<?php echo $app_name; ?>/application/auth/logout.php" class="dropdown-item ai-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                            <polyline points="16 17 21 12 16 7"></polyline>
                                            <line x1="21" y1="12" x2="9" y2="12"></line>
                                        </svg>
                                        <span class="ms-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item">

                            </li>
                        </ul>

                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php require_once __DIR__ . '/../partials/side_bar.php'; ?>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!-- add supplier modal -->

        <?php require_once __DIR__ . '/../partials/model.php'; ?>

        <!-- end supplier modal -->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">


                <!-- row -->


                <div class="row">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"></h4>

                                <div class="text-center">
                                    <a href="saloon_form.php" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#basicModal">Add Saloon</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="saloon_tbl" class="display dataTable no-footer" style="min-width: 845px" role="grid" aria-describedby="example3_info">
                                        <thead>
                                            <tr role="row">
                                                <th>No</th>
                                                <th>Saloon name</th>
                                                <th>Saloon Image</th>
                                                <th>Opening Time</th>
                                                <th>Closing Time</th>
                                                <th>Email id</th>
                                                <th>Mobile No</th>
                                                <th>Address</th>
                                                <th>Status</th>
                                                <th>Action</th>                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
                                   
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">Furqan Raza</a> 2024</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>


    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?php echo $app_name; ?>/public/vendor/global/global.min.js"></script>
    <script src="<?php echo $app_name; ?>/public/vendor/chart.js/Chart.bundle.min.js"></script>
    <!-- Apex Chart -->
    <script src="<?php echo $app_name; ?>/public/vendor/apexchart/apexchart.js"></script>

     <!-- sweet alert -->
     <script src="<?php echo $app_name; ?>/public/vendor/sweetalert2/dist/sweetalert2.min.js"></script>

    <!-- Datatable -->
    <script src="<?php echo $app_name; ?>/public/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo $app_name; ?>/public/js/plugins-init/datatables.init.js"></script>

    <script src="<?php echo $app_name; ?>/public/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>

    <script src="<?php echo $app_name; ?>/public/js/custom.min.js"></script>
    <script src="<?php echo $app_name; ?>/public/js/dlabnav-init.js"></script>
    <script src="<?php echo $app_name; ?>/public/js/modal.js"></script>
    <script src="<?php echo $app_name; ?>/public/js/styleSwitcher.js"></script>
    <script src="<?php echo $app_name; ?>/public/js/ajax-form-request.js"></script>



    <script>
    
        function saloonFormsubmitHandler(Form_Id, event) {
            handleAjaxFormRequest(Form_Id, event, SuccesCallBack)
        }

        const SuccesCallBack = (data) => {
            console.log(data);
            $('#basicModal').modal('hide');
            saloon_list.ajax.reload();
        }

        var saloon_list;

        $(document).ready(function() {
            saloon_list = $("#saloon_tbl").DataTable({

                "ajax": {
                    'url': `<?php echo $app_name; ?>/application/master/add_saloon.php?action=get_all_saloons`,
                    'dataSrc': 'responseContent.saloon_list',
                    // 'success': function(response) {
                    //     console.log(response); // Check the structure of the response
                    // }
                    
                    
                },
                "aoColumnDefs": [{
                    "aTargets": [0],
                    "mData": "id",
                    "mRender": function(data, type, full, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },{
                    "aTargets": [2],
                    "mData": "id",
                    "mRender": function(data, type, full) {
                        var saloon_img = '';
                        if (full.img_path == "") {
                            saloon_img = `<div class="img_view">
                                            <img src="<?php echo $CloudinaryPath. folder_dir;?>restaurant_banner/no_image_available_twjy2t_d8chnb" >
                                        </div>`;
                        } else {
                            saloon_img = `<div class="img_view">
                                            <img src="<?php echo $CloudinaryPath. folder_dir;?>restaurant_banner/${full.img_path}" >
                                        </div>`;
                        }
                        return saloon_img;
                    }
                },{
                    "aTargets": [8],
                    "mData": "id",
                    "mRender": function(data, type, full) {
                        var is_active = '';
                        if (full.is_active == 1) {
                            is_active = `<span class="badge light badge-success">Active</span>`
                        } else {
                            is_active = `<span class="badge light badge-danger">Inactive</span>`;
                        }
                        return is_active;
                    }
                },{
                    "aTargets": [9],
                    "mData": "id",
                    "mRender": function(data, type, full) {
                        var edit_delete_btn = `<div class="d-flex">
                                                        <a href="saloon_form.php?saloon_id=${full.salon_id}&action=get_salon_by_id" class="btn btn-primary shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="fas fa-pencil-alt"></i></a>
                                                        <a href="javascript:void(0)" onclick="deleteSaloon(${full.salon_id})" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                    </div>`;

                        return edit_delete_btn;
                    }
                }],
                'columns': [{
                        'data': 'sr_no'
                    },
                    {
                        'data': 'saloon_name'
                    },
                    {
                        'data': 'img_path'
                    },
                    {
                        'data': 'opening_time'
                    },
                    {
                        'data': 'closing_time'
                    },
                    {
                        'data': 'email_id'
                    },
                    {
                        'data': 'mobile_no'
                    },
                    {
                        'data': 'adress'
                    },
                    {
                        'data': 'is_active'
                    },
                    {
                        'data': 'Action',
                        'searchable': false
                    }
                ]

            });
        });


        function deleteSaloon(saloon_id) {
            Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
            }).then((result) => {
            if (result.isConfirmed) {
                var url = `<?php echo $app_name; ?>/application/master/add_saloon.php`;
                $.post(url,{action:'delete_saloon',saloon_id:saloon_id},function(data){
                    Swal.fire({
                        title: "Deleted!",
                        text: "Saloon has been deleted.",
                        icon: "success"
                    });
                    saloon_list.ajax.reload();
                })
                
            }
            });
            
        }
    </script>
</body>

</html>