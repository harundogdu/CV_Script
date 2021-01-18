<?php
if (isset($_GET["id"])) :
    $userId = $_GET['id'];
endif;
$lastLanguage = $database->getData("language", 0, " WHERE language_id = $userId"); ?>
<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Dil Güncelle</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dil Güncelle</li>
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
                    $language_name      = $database->filterSyntax($_POST['language_name']);
                    $language_num       = $database->filterSyntax($_POST['language_num']);

                    $lastSkill = $database->prepare("UPDATE language SET language_name=?,language_num=? WHERE language_id=?");
                    $lastSkill->execute(array($language_name, $language_num, $userId));

                    echo '
                        <div class="alert alert-success text-center text-dark">
                        Veriler Başarıyla Güncellendi !
                        </div>';
                    header("Refresh:2,url=control.php?page=language");
                else :
                ?>
                    <form action="" method="POST">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="language_name">Dil Adı</label>
                                    <input type="text" class="form-control" name="language_name" id="language_name" required value="<?= $lastLanguage['language_name'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="language_num">Dil Puanı</label>
                                    <input type="text" class="form-control" name="language_num" id="language_num" required value="<?= $lastLanguage['language_num'] ?>">
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