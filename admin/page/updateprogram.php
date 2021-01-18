<?php
if (isset($_GET["id"])) :
    $userId = $_GET['id'];
endif;
$lastProgram = $database->getData("program", 0, " WHERE program_id = $userId"); ?>
<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Program Güncelle</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Program Güncelle</li>
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
                    $program_name      = $database->filterSyntax($_POST['program_name']);
                    $program_num       = $database->filterSyntax($_POST['program_num']);

                    $lastSkill = $database->prepare("UPDATE program SET program_name=?,program_num=? WHERE program_id=?");
                    $lastSkill->execute(array($program_name, $program_num, $userId));

                    echo '
                        <div class="alert alert-success text-center text-dark">
                        Veriler Başarıyla Güncellendi !
                        </div>';
                    header("Refresh:2,url=control.php?page=program");
                else :
                ?>
                    <form action="" method="POST">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="program_name">Yetenek Adı</label>
                                    <input type="text" class="form-control" name="program_name" id="program_name" required value="<?= $lastProgram['program_name'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="program_num">Yetenek Puanı</label>
                                    <input type="text" class="form-control" name="program_num" id="program_num" required value="<?= $lastProgram['program_num'] ?>">
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