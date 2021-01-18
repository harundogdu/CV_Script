<?php $lastProgram= $database->getData("program", 0); ?>
<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Program Ekle</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Program Ekle</li>
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

                    $lastSkill = $database->prepare("INSERT INTO program (program_name,program_num) VALUE (?,?)");
                    $lastSkill->execute(array($program_name,$program_num));

                    echo '<div class="alert alert-success text-center text-dark">Veriler Başarıyla Eklendi !</div>';
                    header("Refresh:2,url=control.php?page=program");
                else :
                ?>
                    <form action="" method="POST">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="program_name">Program Adı</label>
                                    <input type="text" class="form-control" name="program_name" id="program_name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="program_num">Program Puanı</label>
                                    <input type="text" class="form-control" name="program_num" id="program_num" required>
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