<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Projeler</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Projeler</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info">
                    <span class="text-dark">Proje Ekle</span>
                    <a class="text-danger" href="control.php?page=addnewprojects"><i class="fa fa-plus pull-right fa-2x"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">Projeler</h3>
                <hr>
                <div class="row text-center">
                    <div class="col-5">
                        <h5>Proje Adı</h5>
                    </div>
                   <div class="col-5 border-left">
                        <h5>Proje Zamanı</h5>
                    </div> 
                    <div class="col-2 border-left">
                        <h5>İşlemler</h5>
                    </div> 
                </div>
                <hr>

                <?php
                $lastProjects = $database->getData("projects", 1);
                foreach ($lastProjects as $data) :
                ?>
                    <div class="row text-center">
                        <div class="col-5 my-2 bg-success p-2 text-white font-weight-bold border-right">
                            <?= $data['projects_name'] ?>
                        </div>
                        <div class="col-5 my-2 bg-success p-2 text-white font-weight-bold">
                            <?= $data['projects_time'] ?>
                        </div>
                        <div class="col-2 my-2 bg-light p-2">
                            <a href="control.php?page=updateprojects&id=<?= $data['projects_id'] ?>" class="btn btn-warning text-white">Düzenle</a>
                            <a href="control.php?page=deleteprojects&id=<?= $data['projects_id'] ?>" class="btn btn-danger text-white">Sil</a>                           
                        </div>
                    </div>
                <?php
                endforeach;
                ?>


            </div>
        </div>
        <!-- End Page Content -->
    </div>
    <!-- End Container fluid  -->
</div>