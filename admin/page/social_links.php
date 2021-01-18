<?php $lastLinks = $database->getData("social_links", 0); ?>
<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Sosyal Medya Ayarları</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Sosyal Medya Ayarları</li>
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
                    $social_links_facebook  =$database->filterSyntax($_POST['social_links_facebook']);
                    $social_links_instagram =$database->filterSyntax($_POST['social_links_instagram']);
                    $social_links_twitter   =$database->filterSyntax($_POST['social_links_twitter']);
                    $social_links_linkedin  =$database->filterSyntax($_POST['social_links_linkedin']);
                    $social_links_github    =$database->filterSyntax($_POST['social_links_github']);

                    $database->setQuery("UPDATE social_links SET ", "social_links_facebook=?,social_links_instagram=?,social_links_twitter=?,social_links_linkedin=?,social_links_github=?", array($social_links_facebook, $social_links_instagram, $social_links_twitter, $social_links_linkedin, $social_links_github));
                    echo '<div class="alert alert-success text-center text-dark">Veriler Başarıyla Güncellendi !</div>';
                    header("Refresh:2,url=control.php?page=social_links");
                else :
                ?>
                    <form action="" method="POST">

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="social_links_facebook">Facebook Adresi</label>
                                    <input type="text" class="form-control" name="social_links_facebook" id="social_links_facebook" required value="<?= $lastLinks['social_links_facebook'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="social_links_instagram">İnstagram Adresi</label>
                                    <input type="text" class="form-control" name="social_links_instagram" id="social_links_instagram" required value="<?= $lastLinks['social_links_instagram'] ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="social_links_twitter">Twitter Adresi</label>
                                    <input type="text" class="form-control" name="social_links_twitter" id="social_links_twitter" required value="<?= $lastLinks['social_links_twitter'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="social_links_linkedin">Linkedin Adresi</label>
                                    <input type="text" class="form-control" name="social_links_linkedin" id="social_links_linkedin" required value="<?= $lastLinks['social_links_linkedin'] ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="social_links_github">Github Adresi</label>
                                    <input type="text" class="form-control" name="social_links_github" id="social_links_github" required value="<?= $lastLinks['social_links_github'] ?>">
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