<?php
if (isset($_GET["id"])) :
    $userId = $_GET['id'];
endif;
$lastSchools = $database->getData("schools", 0, " WHERE schools_id = $userId"); ?>
<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Okul Güncelle</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Okul Güncelle</li>
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
                    $schools_name       = $database->filterSyntax($_POST['schools_name']);
                    $schools_time       = $database->filterSyntax($_POST['schools_time']);
                    $schools_now        = $database->filterSyntax($_POST['schools_now']);
                    $schools_desc       = $database->filterSyntax($_POST['schools_desc'], false);

                    $lastSkill = $database->prepare("UPDATE schools SET schools_name =?,schools_time=?,schools_now=?,schools_desc=? WHERE schools_id=?");
                    $lastSkill->execute(array($schools_name, $schools_time, $schools_now, $schools_desc, $userId));

                    echo '
                        <div class="alert alert-success text-center text-dark">
                        Veriler Başarıyla Güncellendi !
                        </div>';
                    header("Refresh:2,url=control.php?page=schools");
                else :
                ?>
                    <form action="" method="POST">

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="schools_name">Okul Adı</label>
                                    <input type="text" class="form-control" name="schools_name" id="schools_name" required value="<?= $lastSchools['schools_name'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="schools_time">Okul Zamanı</label>
                                    <input type="text" class="form-control" name="schools_time" id="schools_time" required value="<?= $lastSchools['schools_time'] ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="schools_name">Okul Devamlılığı</label>
                                    <select name="schools_now" id="schools_now" class="form-control" required>
                                        <?php
                                        $dataSelect = "";
                                        $dataSelect2 = "";
                                        if ($lastSchools['schools_now'] == 1) :
                                            $dataSelect = "selected";
                                        else :
                                            $dataSelect2 = "selected";
                                        endif;
                                        ?>
                                        <option value="0" <?= $dataSelect2 ?>>Eski Okulum</option>
                                        <option value="1" <?= $dataSelect ?>>Şuanki Okulum</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="schools_name">Okul Açıklama</label>
                                    <textarea name="schools_desc" id="schools_desc" cols="30" rows="10" class="form-control" required><?= $lastSchools['schools_desc'] ?></textarea>
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