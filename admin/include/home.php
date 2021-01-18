<?php

$row1 = $database->rowCountTable("settings");
$row2 = $database->rowCountTable("aboutme");
$row3 = $database->rowCountTable("jobs");
$row4 = $database->rowCountTable("language");
$row5 = $database->rowCountTable("program");
$row6 = $database->rowCountTable("projects");
$row7 = $database->rowCountTable("schools");
$row8 = $database->rowCountTable("skills");
$row9 = $database->rowCountTable("social_links");


?>
<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Dashboard</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">

            <div class="col-md-3">
                <div class="card p-30">
                    <div class="media">
                        <div class="media-left meida media-middle">
                            <span><i class="fa fa-user f-s-40 color-pink"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                            <h2><?= $row1 ?></h2>
                            <p class="m-b-0">Genel Ayarlar</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card p-30">
                    <div class="media">
                        <div class="media-left meida media-middle">
                            <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                            <h2><?= $row2 ?></h2>
                            <p class="m-b-0">Hakkımda Ayaları</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card p-30">
                    <div class="media">
                        <div class="media-left meida media-middle">
                            <span><i class="fa fa-user f-s-40 color-secondary"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                            <h2><?= $row3 ?></h2>
                            <p class="m-b-0">İŞ Ayarları</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card p-30">
                    <div class="media">
                        <div class="media-left meida media-middle">
                            <span><i class="fa fa-user f-s-40 color-info"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                            <h2><?= $row4 ?></h2>
                            <p class="m-b-0">Dil Ayarları</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card p-30">
                    <div class="media">
                        <div class="media-left meida media-middle">
                            <span><i class="fa fa-user f-s-40 color-primary"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                            <h2><?= $row5 ?></h2>
                            <p class="m-b-0">Program Ayarları</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card p-30">
                    <div class="media">
                        <div class="media-left meida media-middle">
                            <span><i class="fa fa-user f-s-40 color-dark"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                            <h2><?= $row6 ?></h2>
                            <p class="m-b-0">Projeler Ayarları</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card p-30">
                    <div class="media">
                        <div class="media-left meida media-middle">
                            <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                            <h2><?= $row7 ?></h2>
                            <p class="m-b-0">Okul Ayarları</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card p-30">
                    <div class="media">
                        <div class="media-left meida media-middle">
                            <span><i class="fa fa-user f-s-40 color-success"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                            <h2><?= $row8 ?></h2>
                            <p class="m-b-0">Yetenek Ayarları</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card p-30">
                    <div class="media">
                        <div class="media-left meida media-middle">
                            <span><i class="fa fa-user f-s-40 color-warning"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                            <h2><?= $row9 ?></h2>
                            <p class="m-b-0">Linkler Ayarları</p>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- End Page Content -->
    </div>
    <!-- End Container fluid  -->
</div>