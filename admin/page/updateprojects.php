<?php
if (isset($_GET["id"])) :
    $userId = $_GET['id'];
endif;
$lastprojects = $database->getData("projects", 0, " WHERE projects_id = $userId"); ?>
<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Proje Güncelle</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Proje Güncelle</li>
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
                    $projects_name       = $database->filterSyntax($_POST['projects_name']);
                    $projects_time       = $database->filterSyntax($_POST['projects_time']);
                    $projects_now        = $database->filterSyntax($_POST['projects_now']);
                    $projects_url        = $database->filterSyntax($_POST['projects_url']);
                    $projects_desc       = $database->filterSyntax($_POST['projects_desc'], false);

                    $lastSkill = $database->prepare("UPDATE projects SET projects_name =?,projects_time=?,projects_now=?,projects_desc=?,projects_url=? WHERE projects_id=?");
                    $lastSkill->execute(array($projects_name, $projects_time, $projects_now, $projects_desc, $projects_url, $userId));

                    echo '
                        <div class="alert alert-success text-center text-dark">
                        Veriler Başarıyla Güncellendi !
                        </div>';
                    header("Refresh:2,url=control.php?page=projects");
                else :
                ?>
                    <form action="" method="POST">

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projects_name">Proje Adı</label>
                                    <input type="text" class="form-control" name="projects_name" id="projects_name" required value="<?= $lastprojects['projects_name'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projects_time">Proje Zamanı</label>
                                    <input type="text" class="form-control" name="projects_time" id="projects_time" required value="<?= $lastprojects['projects_time'] ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projects_url">Proje Url</label>
                                    <input type="text" class="form-control" name="projects_url" id="projects_url" required value="<?= $lastprojects['projects_url'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projects_name">Proje Devamlılığı</label>
                                    <select name="projects_now" id="projects_now" class="form-control" required>
                                        <?php
                                        $dataSelect = "";
                                        $dataSelect2 = "";
                                        if ($lastprojects['projects_now'] == 1) :
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
                                    <label for="projects_name">Okul Açıklama</label>
                                    <textarea name="projects_desc" id="projects_desc" cols="30" rows="10" class="form-control" required><?= $lastprojects['projects_desc'] ?></textarea>
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