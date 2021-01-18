<?php $lastSchools = $database->getData("schools", 0); ?>
<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Okul Ekle</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Okul Ekle</li>
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

                    $lastSkill = $database->prepare("INSERT INTO schools (schools_name,schools_time,schools_now,schools_desc) VALUE (?,?,?,?)");
                    $lastSkill->execute(array($schools_name, $schools_time, $schools_now, $schools_desc));

                    echo '<div class="alert alert-success text-center text-dark">Veriler Başarıyla Eklendi !</div>';
                    header("Refresh:2,url=control.php?page=schools");
                else :
                ?>
                    <form action="" method="POST">

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="schools_name">Okul Adı</label>
                                    <input type="text" class="form-control" name="schools_name" id="schools_name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="schools_time">Okul Zamanı</label>
                                    <input type="text" class="form-control" name="schools_time" id="schools_time" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="schools_name">Okul Devamlılığı</label>
                                    <select name="schools_now" id="schools_now" class="form-control" required>
                                        <option value="0">Eski Okulum</option>
                                        <option value="1">Şuanki Okulum</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="schools_name">Okul Açıklama</label>
                                    <textarea name="schools_desc" id="schools_desc" cols="30" rows="10" class="form-control" required></textarea>
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