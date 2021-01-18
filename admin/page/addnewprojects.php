<?php $lastProjects = $database->getData("projects", 0); ?>
<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Proje Ekle</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Proje Ekle</li>
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
                    
                    $lastSkill = $database->prepare("INSERT INTO projects (projects_name,projects_time,projects_now,projects_desc,projects_url) VALUE (?,?,?,?,?)");
                    $lastSkill->execute(array($projects_name, $projects_time, $projects_now, $projects_desc,$projects_url));

                    echo '<div class="alert alert-success text-center text-dark">Veriler Başarıyla Eklendi !</div>';
                    header("Refresh:2,url=control.php?page=projects");
                else :
                ?>
                    <form action="" method="POST">

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projects_name">Proje Adı</label>
                                    <input type="text" class="form-control" name="projects_name" id="projects_name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projects_time">Proje Zamanı</label>
                                    <input type="text" class="form-control" name="projects_time" id="projects_time" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projects_url">Proje Url</label>
                                    <input type="text" class="form-control" name="projects_url" id="projects_url" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projects_name">Proje Devamlılığı</label>
                                    <select name="projects_now" id="projects_now" class="form-control" required>
                                        <option value="0">Eski Projeum</option>
                                        <option value="1">Şuanki Projeum</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="projects_name">Proje Açıklama</label>
                                    <textarea name="projects_desc" id="projects_desc" cols="30" rows="10" class="form-control" required></textarea>
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