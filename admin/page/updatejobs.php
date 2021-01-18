<?php
if (isset($_GET["id"])) :
    $userId = $_GET['id'];
endif;
$lastJobs = $database->getData("jobs", 0, " WHERE jobs_id = $userId"); ?>
<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">İş Güncelle</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">İş Güncelle</li>
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
                    $jobs_name       = $database->filterSyntax($_POST['jobs_name']);
                    $jobs_time       = $database->filterSyntax($_POST['jobs_time']);
                    $jobs_now        = $database->filterSyntax($_POST['jobs_now']);
                    $jobs_desc       = $database->filterSyntax($_POST['jobs_desc'], false);

                    $lastSkill = $database->prepare("UPDATE jobs SET jobs_name =?,jobs_time=?,jobs_now=?,jobs_desc=? WHERE jobs_id=?");
                    $lastSkill->execute(array($jobs_name, $jobs_time, $jobs_now, $jobs_desc, $userId));

                    echo '
                        <div class="alert alert-success text-center text-dark">
                        Veriler Başarıyla Güncellendi !
                        </div>';
                    header("Refresh:2,url=control.php?page=jobs");
                else :
                ?>
                    <form action="" method="POST">

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jobs_name">İş Adı</label>
                                    <input type="text" class="form-control" name="jobs_name" id="jobs_name" required value="<?= $lastJobs['jobs_name'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jobs_time">İş Zamanı</label>
                                    <input type="text" class="form-control" name="jobs_time" id="jobs_time" required value="<?= $lastJobs['jobs_time'] ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jobs_name">İş Devamlılığı</label>
                                    <select name="jobs_now" id="jobs_now" class="form-control" required>
                                        <?php
                                        $dataSelect = "";
                                        $dataSelect2 = "";
                                        if ($lastJobs['jobs_now'] == 1) :
                                            $dataSelect = "selected";
                                        else :
                                            $dataSelect2 = "selected";
                                        endif;
                                        ?>
                                        <option value="0" <?= $dataSelect2 ?>>Eski İşim</option>
                                        <option value="1" <?= $dataSelect ?>>Şuanki İşim</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="jobs_name">İş Açılama</label>
                                    <textarea name="jobs_desc" id="jobs_desc" cols="30" rows="10" class="form-control" required><?= $lastJobs['jobs_desc'] ?></textarea>
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