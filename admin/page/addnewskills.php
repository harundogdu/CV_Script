<?php $lastSkills = $database->getData("skills", 0); ?>
<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Yetenek Ekle</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Yetenek Ekle</li>
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
                    $skills_name      = $database->filterSyntax($_POST['skills_name']);
                    $skills_num       = $database->filterSyntax($_POST['skills_num']);

                    $lastSkill = $database->prepare("INSERT INTO skills (skills_name,skills_num) VALUE (?,?)");
                    $lastSkill->execute(array($skills_name,$skills_num));

                    echo '<div class="alert alert-success text-center text-dark">Veriler Başarıyla Güncellendi !</div>';
                    header("Refresh:2,url=control.php?page=skills");
                else :
                ?>
                    <form action="" method="POST">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="skills_name">Yetenek Adı</label>
                                    <input type="text" class="form-control" name="skills_name" id="skills_name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="skills_num">Yetenek Puanı</label>
                                    <input type="text" class="form-control" name="skills_num" id="skills_num" required>
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