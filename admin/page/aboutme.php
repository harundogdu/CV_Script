<?php $lastSettings = $database->getData("aboutme", 0); ?>
<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Hakkımda</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Hakkımda</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-md-12">
                <?php
                if (isset($_POST['btnSave'])) :
                    $aboutme_photo      = $database->filterSyntax($_POST['aboutme_photo']);
                    $aboutme_name       = $database->filterSyntax($_POST['aboutme_name']);
                    $aboutme_address    = $database->filterSyntax($_POST['aboutme_address']);
                    $aboutme_job        = $database->filterSyntax($_POST['aboutme_job']);
                    $aboutme_mail       = $database->filterSyntax($_POST['aboutme_mail']);
                    $aboutme_phone      = $database->filterSyntax($_POST['aboutme_phone']);

                    $database->setQuery("UPDATE aboutme SET ", "aboutme_photo=?,aboutme_name=?,aboutme_address=?,aboutme_job=?,aboutme_mail=?,aboutme_phone=?", array($aboutme_photo, $aboutme_name, $aboutme_address, $aboutme_job, $aboutme_mail, $aboutme_phone));
                    echo '<div class="alert alert-success text-center text-dark">Veriler Başarıyla Güncellendi !</div>';
                    header("Refresh:2,url=control.php?page=aboutme");
                else :
                ?>
                    <form action="" method="POST">

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="aboutme_photo">Hakkımda Fotoğrafı</label>
                                    <input type="text" class="form-control" name="aboutme_photo" id="aboutme_photo" required value="<?= $lastSettings['aboutme_photo'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="aboutme_name">Hakkımda İsim</label>
                                    <input type="text" class="form-control" name="aboutme_name" id="aboutme_name" required value="<?= $lastSettings['aboutme_name'] ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="aboutme_address">Hakkımda Adres</label>
                                    <input type="text" class="form-control" name="aboutme_address" id="aboutme_address" required value="<?= $lastSettings['aboutme_address'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="aboutme_job">Hakkımda İş</label>
                                    <input type="text" class="form-control" name="aboutme_job" id="aboutme_job" required value="<?= $lastSettings['aboutme_job'] ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="aboutme_mail">Hakkımda Mail</label>
                                    <input type="text" class="form-control" name="aboutme_mail" id="aboutme_mail" required value="<?= $lastSettings['aboutme_mail'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="aboutme_phone">Hakkımda Telefon</label>
                                    <input type="text" class="form-control" name="aboutme_phone" id="aboutme_phone" required value="<?= $lastSettings['aboutme_phone'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mx-auto text-center">
                                <button type="submit" name="btnSave" id="btnSave" class="btn btn-primary btn-lg btn-block">Güncelle</button>
                            </div>
                        </div>
                    </form>
                <?php
                endif;
                ?>
            </div>
        </div>
        <!-- End Page Content -->
    </div>
    <!-- End Container fluid  -->
</div>