<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Diller</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Diller</li>
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
                    <span class="text-dark">Dil Ekle</span>
                    <a class="text-danger" href="control.php?page=addnewlanguage"><i class="fa fa-plus pull-right fa-2x"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">Diller</h3>
                <hr>
                <div class="row text-center">
                    <div class="col-5">
                        <h5>Dil Adı</h5>
                    </div>
                   <div class="col-5 border-left">
                        <h5>Dil Puanı</h5>
                    </div> 
                    <div class="col-2 border-left">
                        <h5>İşlemler</h5>
                    </div> 
                </div>
                <hr>

                <?php
                $lastLanguage = $database->getData("language", 1);
                foreach ($lastLanguage as $data) :
                ?>
                    <div class="row text-center">
                        <div class="col-5 my-2 bg-success p-2 text-white font-weight-bold border-right">
                            <?= $data['language_name'] ?>
                        </div>
                        <div class="col-5 my-2 bg-success p-2 text-white font-weight-bold">
                            <?= $data['language_num'] ?>
                        </div>
                        <div class="col-2 my-2 bg-light p-2">
                            <a href="control.php?page=updatelanguage&id=<?= $data['language_id'] ?>" class="btn btn-warning text-white">Düzenle</a>
                            <a href="control.php?page=deletelanguage&id=<?= $data['language_id'] ?>" class="btn btn-danger text-white">Sil</a>                           
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