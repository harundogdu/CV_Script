<?php $lastLanguage= $database->getData("language", 0); ?>
<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Dil Ekle</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dil Ekle</li>
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

                    $lastSkill = $database->prepare("INSERT INTO language (language_name,language_num) VALUE (?,?)");
                    $lastSkill->execute(array($language_name,$language_num));

                    echo '<div class="alert alert-success text-center text-dark">Veriler Başarıyla Eklendi !</div>';
                    header("Refresh:2,url=control.php?page=language");
                else :
                ?>
                    <form action="" method="POST">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="language_name">Dil Adı</label>
                                    <input type="text" class="form-control" name="language_name" id="language_name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="language_num">Dil Puanı</label>
                                    <input type="text" class="form-control" name="language_num" id="language_num" required>
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