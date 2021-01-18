<!-- Right Column -->
<div class="w3-twothird">	
	<!-- Eğitim -->
	<div class="w3-container w3-card w3-white w3-margin-bottom">
		<h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-<?=$lastColor['settings_color']?>"></i>Eğitim</h2>
		<?php
		$lastSchools = $database->getData("schools", 1,"ORDER BY schools_id ASC");
		foreach ($lastSchools as $data) {
			echo '
			<div class="w3-container">
				<h5 class="w3-opacity"><b>'.$data['schools_name'].'</b></h5>
					<h6 class="w3-text-'.$lastColor['settings_color'].'"><i class="fa fa-calendar fa-fw w3-margin-right"></i> 
					'. $data['schools_time'];
					if($data['schools_now'] == 1):
					echo '<span class="w3-tag w3-'.$lastColor['settings_color'].' w3-round">Halen Devam Ediyor</span>';			
					endif;
					echo'</h6>
					<p>'.$data['schools_desc'].'</p>
				<hr>
			</div>
				';
		}
		?>
	</div>

	<!-- İş Deneyimi -->
	<div class="w3-container w3-card w3-white w3-margin-bottom">
		<h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-<?=$lastColor['settings_color']?>"></i>İş Deneyimi</h2>

		<?php

		$lastWork = $database->getData("jobs", 1,"ORDER BY jobs_id DESC");

		foreach ($lastWork as $data) {
			echo '
			<div class="w3-container">
				<h5 class="w3-opacity"><b>'.$data['jobs_name'].'</b></h5>
					<h6 class="w3-text-'.$lastColor['settings_color'].'"><i class="fa fa-calendar fa-fw w3-margin-right"></i> 
					'. $data['jobs_time'];
					if($data['jobs_now'] == 1):
					echo '<span class="w3-tag w3-'.$lastColor['settings_color'].' w3-round">Halen Devam Ediyor</span>';					
					endif;
					echo'</h6>
					<p>'.$data['jobs_desc'].'</p>
				<hr>
			</div>
				';
		}
		?>
	</div>

	<!-- Projeler -->
	<div class="w3-container w3-card w3-white w3-margin-bottom">
		<h2 class="w3-text-grey w3-padding-16"><i class="fa fa-tasks fa-fw w3-margin-right w3-xxlarge w3-text-<?=$lastColor['settings_color']?>"></i>Projeler</h2>

		<?php

		$lastProjects = $database->getData("projects", 1,"ORDER BY projects_id DESC");

		foreach ($lastProjects as $data) {
			echo '
			<div class="w3-container">
				<h5 class="w3-opacity"><b>'.$data['projects_name'].'</b> <span style="margin-left:5px;" class="w3-tag w3-'.$lastColor['settings_color'].' w3-round"><a style="text-decoration:none;" href="'.$data['projects_url'].'" target="_blank">İncele</a></span></h5>
					<h6 class="w3-text-'.$lastColor['settings_color'].'"><i class="fa fa-calendar fa-fw w3-margin-right"></i> 
					'. $data['projects_time'];					
					echo'</h6>
					<p>'.$data['projects_desc'].'</p>
				<hr>
			</div>
				';
		}
		?>
	</div>

	
</div>