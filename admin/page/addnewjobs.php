<?php $lastJobs = $database->getData("jobs", 0); ?>
<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">İşler Ekle</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">İşler Ekle</li>
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

                    $lastSkill = $database->prepare("INSERT INTO jobs (jobs_name,jobs_time,jobs_now,jobs_desc) VALUE (?,?,?,?)");
                    $lastSkill->execute(array($jobs_name, $jobs_time, $jobs_now, $jobs_desc));

                    echo '<div class="alert alert-success text-center text-dark">Veriler Başarıyla Eklendi !</div>';
                    header("Refresh:2,url=control.php?page=jobs");
                else :
                ?>
                    <form action="" method="POST">

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jobs_name">İş Adı</label>
                                    <input type="text" class="form-control" name="jobs_name" id="jobs_name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jobs_time">İş Zamanı</label>
                                    <input type="text" class="form-control" name="jobs_time" id="jobs_time" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jobs_name">İş Devamlılığı</label>
                                    <select name="jobs_now" id="jobs_now" class="form-control" required>
                                        <option value="0">Eski İşim</option>
                                        <option value="1">Şuanki İşim</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="jobs_name">İş Açıklama</label>
                                    <textarea name="jobs_desc" id="jobs_desc" cols="30" rows="10" class="form-control" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 mx-auto text-center">
                                <button type="submit" name="btnSave" id="btnSave" class="btn btn-primary btn-lg btn-block">Ekle</button>
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