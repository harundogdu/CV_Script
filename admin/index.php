<?php
session_start();
if (isset($_SESSION['oturum'])) :
    header("Location:control.php");
    die();
endif;
require_once '../class/vt.php';
$database = new Database();
$lastSettings = $database->getData("settings", 0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title><?= $lastSettings['settings_title'] ?></title>
    <meta name="description" content="Admintres is a Dashboard & Admin Site Responsive Template by hencework." />
    <meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Admintres Admin, Admintresadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
    <meta name="author" content="hencework" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- vector map CSS -->
    <link href="../vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->
    <link href="dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <!--Preloader-->
    <div class="preloader-it">
        <div class="la-anim-1"></div>
    </div>
    <!--/Preloader-->
    <div class="wrapper  pa-0">
        <!-- Main Content -->
        <div class="page-wrapper pa-0 ma-0 auth-page">
            <div class="container">
                <!-- Row -->
                <div class="table-struct full-width full-height">
                    <div class="table-cell vertical-align-middle auth-form-wrap">
                        <div class="auth-form  ml-auto mr-auto no-float card-view pt-30 pb-30">
                            <div class="row">
                                <?php

                                if (isset($_POST['btnSave'])) :

                                    $admin_user = $database->filterSyntax($_POST['admin_user']);
                                    $admin_psw  = $database->filterSyntax($_POST['admin_psw']);

                                    $database->loginControl($admin_user, $admin_psw);
                                else :
                                ?>
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="mb-30">
                                            <h3 class="text-center txt-dark mb-10">Admin Paneli Giriş Yap</h3>
                                            <h6 class="text-center nonecase-font txt-grey">Detayları Giriniz</h6>
                                        </div>
                                        <div class="form-wrap">
                                            <form action="" method="POST">
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="exampleInputEmail_2">Kullanıcı Adı</label>
                                                    <input type="text" class="form-control" required="" id="exampleInputEmail_2" name="admin_user" placeholder="Kullanıcı Adı Giriniz..">
                                                </div>
                                                <div class="form-group">
                                                    <label class="pull-left control-label mb-10" for="exampleInputpwd_2">Şifre</label>

                                                    <div class="clearfix"></div>
                                                    <input type="password" class="form-control" required="" id="exampleInputpwd_2" placeholder="Şifre Giriniz.." name="admin_psw">
                                                </div>
                                                <div class="form-group text-center">
                                                    <button type="submit" name="btnSave" class="btn btn-orange btn-rounded">Giriş Yap</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                <?php

                                endif;

                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Row -->
            </div>

        </div>
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->

    <!-- JavaScript -->

    <!-- jQuery -->
    <script src="../vendors/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>

    <!-- Slimscroll JavaScript -->
    <script src="dist/js/jquery.slimscroll.js"></script>

    <!-- Init JavaScript -->
    <script src="dist/js/init.js"></script>
</body>

</html>