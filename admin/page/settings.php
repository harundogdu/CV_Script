<?php $lastSettings = $database->getData("settings", 0); ?>
<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Genel Ayarlar</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Genel Ayarlar</li>
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
                    $settings_base      = $database->filterSyntax($_POST['settings_base']);
                    $settings_title     = $database->filterSyntax($_POST['settings_title']);
                    $settings_keyw      = $database->filterSyntax($_POST['settings_keyw']);
                    $settings_owner     = $database->filterSyntax($_POST['settings_owner']);
                    $settings_desc      = $database->filterSyntax($_POST['settings_desc'], false);
                    $settings_color     = $database->filterSyntax($_POST['settings_color']);
                    $settings_author    = $database->filterSyntax($_POST['settings_author']);



                    $database->setQuery("UPDATE settings SET ", "settings_base=?,settings_title=?,settings_keyw=?,settings_owner=?,settings_desc=?,settings_color=?,settings_author=?", array($settings_base, $settings_title, $settings_keyw, $settings_owner, $settings_desc, $settings_color, $settings_author));
                    echo '<div class="alert alert-success text-center text-dark">Veriler Başarıyla Güncellendi !</div>';
                    header("Refresh:2,url=control.php?page=settings");
                else :
                ?>
                    <form action="" method="POST">

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="settings_base">Site Base Adresi</label>
                                    <input type="text" class="form-control" name="settings_base" id="settings_base" required value="<?= $lastSettings['settings_base'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="settings_title">Site Title Adresi</label>
                                    <input type="text" class="form-control" name="settings_title" id="settings_title" required value="<?= $lastSettings['settings_title'] ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="settings_keyw">Site Keywords</label>
                                    <input type="text" class="form-control" name="settings_keyw" id="settings_keyw" required value="<?= $lastSettings['settings_keyw'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">                                  
                                    <label for="settings_color">Site Tema Renk</label>
                                    <select name="settings_color" id="settings_color" class="form-control">
                                        <?php 
                                        
                                        function colorFind($key,$val){
                                            if($val == $key):
                                                echo "selected";
                                            endif;
                                        }                                       
                                        
                                        ?>
                                        <option value="teal" <?=colorFind("teal",$lastSettings['settings_color'])?>>Su Yeşili</option>
                                        <option value="red" <?=colorFind("red",$lastSettings['settings_color'])?>>Kırmızı</option>
                                        <option value="pink" <?=colorFind("pink",$lastSettings['settings_color'])?>>Pembe</option>
                                        <option value="purple" <?=colorFind("purple",$lastSettings['settings_color'])?>>Mor</option>
                                        <option value="aqua" <?=colorFind("aqua",$lastSettings['settings_color'])?>>Turkuaz</option>
                                        <option value="lime" <?=colorFind("lime",$lastSettings['settings_color'])?>>Lime Yeşil</option>
                                        <option value="green" <?=colorFind("green",$lastSettings['settings_color'])?>>Yeşil</option>
                                        <option value="blue" <?=colorFind("blue",$lastSettings['settings_color'])?>>Mavi</option>
                                        <option value="deep-orange" <?=colorFind("deep-orange",$lastSettings['settings_color'])?>>Turuncu</option>
                                        <option value="indigo" <?=colorFind("indigo",$lastSettings['settings_color'])?>>Lacivert</option>
                                        <option value="khaki" <?=colorFind("khaki",$lastSettings['settings_color'])?>>Açık Sarı</option>
                                        <option value="black" <?=colorFind("black",$lastSettings['settings_color'])?>>Siyah</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="settings_owner">Site Owner</label>
                                    <input type="text" class="form-control" name="settings_owner" id="settings_owner" required value="<?= $lastSettings['settings_owner'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="settings_author">Site Author</label>
                                    <input type="text" class="form-control" name="settings_author" id="settings_author" required value="<?= $lastSettings['settings_author'] ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="settings_desc">Site Açıklama</label>
                                    <textarea name="settings_desc" id="settings_desc" class="form-control" required><?= $lastSettings['settings_desc'] ?></textarea>
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