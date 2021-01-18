<?php $lastAboutMe = $database->getData("aboutme"); ?>
<?php $lastColor = $database->getData("settings", 0); ?>
<!-- Left Column -->
<div class="w3-third">
  <div class="w3-white w3-text-grey w3-card-4">
    <div class="w3-display-container">
      <img src="<?= $lastAboutMe['aboutme_photo'] ?>" style="width:100%" alt="Avatar">
      <div class="w3-display-bottomleft w3-container w3-text-black" >
      <?php
      if($lastColor['settings_color'] == "black"):
        $color = "white";
      else:
        $color = $lastColor['settings_color'];
      endif;
      
      ?>
        <h2  class=" w3-text-<?=$color?>"><?=$lastAboutMe['aboutme_name']?></h2>
      </div>
    </div>
    <div class="w3-container">
      <hr>
      <p>
        <i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-<?= $lastColor['settings_color'] ?>"></i>
        <?= $lastAboutMe['aboutme_job'] ?></p>
      <p>
        <i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-<?= $lastColor['settings_color'] ?>"></i><?= $lastAboutMe['aboutme_address'] ?></p>
      <p>
        <i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-<?= $lastColor['settings_color'] ?>"></i><?= $lastAboutMe['aboutme_mail'] ?></p>
      <p>
        <i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-<?= $lastColor['settings_color'] ?>"></i><?= $lastAboutMe['aboutme_phone'] ?></p>
      <hr>

      <p class="w3-large"><b><i class="fa fa-code fa-fw w3-margin-right w3-text-<?= $lastColor['settings_color'] ?>"></i>Yetenekler</b></p>

      <?php
      $sqlSkills = $database->getData("skills", 1);
      foreach ($sqlSkills as $data) {
        echo '
        <p>' . $data['skills_name'] . '</p>
          <div class="w3-light-grey w3-round-xlarge w3-small">
            <div class="w3-container w3-center w3-round-xlarge w3-'.$lastColor['settings_color'].' " style="width:' . $data['skills_num'] . '%">' . $data['skills_num'] . '%</div>
          </div>';
      }
      ?>
      <hr>
      <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-<?= $lastColor['settings_color'] ?>"></i>Program Bilgileri</b></p>

      <?php
      $sqlSkills = $database->getData("program", 1);
      foreach ($sqlSkills as $data) {
        echo '
        <p>' . $data['program_name'] . '</p>
          <div class="w3-light-grey w3-round-xlarge w3-small">
            <div class="w3-container w3-center w3-round-xlarge w3-'.$lastColor['settings_color'].'" style="width:' . $data['program_num'] . '%">' . $data['program_num'] . '%</div>
          </div>';
      }
      ?>
      <br>
      <hr>
      <p class="w3-large w3-text-theme"><b><i class="fa fa-globe fa-fw w3-margin-right w3-text-<?= $lastColor['settings_color'] ?>"></i>Diller</b></p>
      <?php
      $sqlLanguage = $database->getData("language", 1);
      foreach ($sqlLanguage as $data) {
        echo '
        <p>' . $data['language_name'] . '</p>
          <div class="w3-light-grey w3-round-xlarge">
            <div class="w3-round-xlarge w3-'.$lastColor['settings_color'].'" style="height:24px;width:' . $data['language_num'] . '%"></div>
          </div>';
      }
      ?>
      <br>

    </div>
  </div><br>
  <!-- End Left Column -->
</div>