<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Programlar</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Programlar</li>
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
                    <span class="text-dark">Program Ekle</span>
                    <a class="text-danger" href="control.php?page=addnewprogram"><i class="fa fa-plus pull-right fa-2x"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">Programlar</h3>
                <hr>
                <div class="row text-center">
                    <div class="col-5">
                        <h5>Program Adı</h5>
                    </div>
                   <div class="col-5 border-left">
                        <h5>Program Puanı</h5>
                    </div> 
                    <div class="col-2 border-left">
                        <h5>İşlemler</h5>
                    </div> 
                </div>
                <hr>

                <?php
                $lastProgram = $database->getData("program", 1);
                foreach ($lastProgram as $data) :
                ?>
                    <div class="row text-center">
                        <div class="col-5 my-2 bg-success p-2 text-white font-weight-bold border-right">
                            <?= $data['program_name'] ?>
                        </div>
                        <div class="col-5 my-2 bg-success p-2 text-white font-weight-bold">
                            <?= $data['program_num'] ?>
                        </div>
                        <div class="col-2 my-2 bg-light p-2">
                            <a href="control.php?page=updateprogram&id=<?= $data['program_id'] ?>" class="btn btn-warning text-white">Düzenle</a>
                            <a href="control.php?page=deleteprogram&id=<?= $data['program_id'] ?>" class="btn btn-danger text-white">Sil</a>                           
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