<?php require_once __DIR__ . '/../../application/utils/app_config.php'; ?>
<?php require_once __DIR__.'/../../application/auth/check_auth_session.php';?>

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
            <a href="index.php" class="brand-logo">
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
                                Users
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
                                    <a href="user_form.php" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#basicModal">Add User</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="user_tbl" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>User Name</th>
                                                <th>Mobile No</th>
                                                <th>Email Id</th>
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
                <p>Copyright © Designed &amp; Developed by <a href="javascript:void(0)">Furqan Raza</a> 2024</p>
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
    <script src="<?php echo $app_name; ?>/public/js/demo.js"></script>
    <script src="<?php echo $app_name; ?>/public/js/modal.js"></script>
    <script src="<?php echo $app_name; ?>/public/js/styleSwitcher.js"></script>
    <script src="<?php echo $app_name; ?>/public/js/ajax-form-request.js"></script>



    <script>
        function userFormsubmitHandler(Form_Id, event) {
            handleAjaxFormRequest(Form_Id, event, SuccesCallBack)
        }

        const SuccesCallBack = (data) => {
            $('#basicModal').modal('hide');
            user_list.ajax.reload();
        }

        /* get category list */
        var user_list;

        $(document).ready(function(){
            user_list = $("#user_tbl").DataTable({

                "ajax": {
                    'url': `<?php echo $app_name; ?>/application/master/user_master.php?action=get_user_list`,
                    'dataSrc': 'responseContent.all_user_list'
                },
                "aoColumnDefs": [{
                    "aTargets": [0],
                    "mData": "id",
                    "mRender": function(data, type, full, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },{
                    "aTargets": [5],
                    "mData": "id",
                    "mRender": function(data, type, full) {
                        var is_active = '';
                        if (full.status == 1) {
                            is_active = `<span class="badge light badge-success">Active</span>`
                        } else {
                            is_active = `<span class="badge light badge-danger">Inactive</span>`;
                        }
                        return is_active;
                    }
                }, {

                    "aTargets": [6],
                    "mData": "id",
                    "mRender": function(data, type, full) {
                        var edit_delete_btn = `<div class="d-flex">
                                                        <a href="user_form.php?super_id=${full.super_id}&action=get_user_by_id" class="btn btn-primary shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="fas fa-pencil-alt"></i></a>
                                                        <a href="javascript:void(0)" onclick="deleteUser(${full.super_id})" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                    </div>`;

                        return edit_delete_btn;
                    }
                }],
                'columns': [{
                        'data': 'sr_no'
                    },
                    {
                        'data': 'name'
                    },
                    {
                        'data': 'user_name'
                    },
                    {
                        'data': 'mobile_no'
                    },
                    {
                        'data': 'email_id'
                    },
                    {
                        'data': 'status'
                    },
                    {
                        'data': 'Action',
                        'searchable': false
                    }
                ]

            });
        });

        function deleteUser(super_id) {
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
                var url = `<?php echo $app_name; ?>/application/master/user_master.php`;
                $.post(url,{action:'delete_user',super_id:super_id},function(data){
                    Swal.fire({
                        title: "Deleted!",
                        text: "User has been deleted.",
                        icon: "success"
                    });
                    user_list.ajax.reload();
                })
                
            }
            });
            
        }
    </script>
</body>

</html>