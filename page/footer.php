   <?php 
    $lastSocialLinks = $database->getData("social_links",0);
   ?>
   
   <!-- End Grid -->
   </div>
   <!-- End Page Container -->
   </div>
   <footer class="w3-container w3-<?=$lastColor['settings_color']?> w3-center w3-margin-top">
     <p>Beni Sosyal Medyadan Bulabilirsiniz !</p>
     <a style="margin:10px;padding:10px;font-size:18px;" href="<?=$lastSocialLinks['social_links_facebook']?>">
     <i class="fa fa-facebook-official w3-hover-opacity"></i></a>
     <a style="margin:10px;padding:10px;font-size:18px;" href="<?=$lastSocialLinks['social_links_instagram']?>">
     <i class="fa fa-instagram w3-hover-opacity"></i></a>
     <a style="margin:10px;padding:10px;font-size:18px;" href="<?=$lastSocialLinks['social_links_github']?>">
     <i class="fa fa-github w3-hover-opacity"></i></a>     
     <a style="margin:10px;padding:10px;font-size:18px;" href="<?=$lastSocialLinks['social_links_twitter']?>">
     <i class="fa fa-twitter w3-hover-opacity"></i></a>
     <a style="margin:10px;padding:10px;font-size:18px;" href="<?=$lastSocialLinks['social_links_linkedin']?>">
     <i class="fa fa-linkedin w3-hover-opacity"></i></a>
     <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank"><?= $lastSettings['settings_owner'] ?></a></p>
   </footer>

   </body>

   </html>