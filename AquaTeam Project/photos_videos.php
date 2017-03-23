<?php


$myDB = new PDO("mysql:host=localhost;dbname=aquateam","root","");

$albums = $myDB->query('SELECT *  FROM photos');

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Marmelad' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>

	<title>Acceuil</title>

	<link rel="stylesheet" href="assets/css/jd.gallery.css" type="text/css" media="screen" charset="utf-8" />
	<script src="assets/scripts/mootools-1.2.1-core-yc.js" type="text/javascript"></script>
	<script src="assets/scripts/mootools-1.2-more.js" type="text/javascript"></script>
	<script src="assets/scripts/jd.gallery.js" type="text/javascript"></script>
	<script src="assets/scripts/jd.gallery.set.js" type="text/javascript"></script>

	<script type="text/javascript">
	window.addEvent('domready', function() {
		document.myGallerySet = new gallerySet($('myGallerySet'), {
			timed: false
		});
	});
	</script>
</head>
<body>

	<header>
		<div id="main_header">

		</div>
	</header>

	<nav class="horizontal-nav">
		<ul style="list-style-type: none;">
			<li><a href="index.php">Acceuil</a></li>
			<li><a href="entraineuses.php">Entraineuse</a></li>
			<li><a href="communique.php">Communique</a></li>
			<li><a href="photos_videos.php" class="current">Photo/Video</a></li>
			<li><a href="resultat.php">Resultat</a></li>
			<li><a href="tarifs.php">Tarifs</a></li>
			<li><a href="contact.php">Contact</a></li>
		</ul>
	</nav>

	<div id="content">


		<div id="main_content">
			<div id"pv_title">
				<div class="photo_title"><h1><a href="#">PHOTOS</a></h1></div>
				<div class="video_title"><h1><a href="video.php">VIDEOS</a></h1></div>
			</div>
			<div id="myGallerySet">
				<?php 
				while($data = $albums->fetch()){
					$photos = explode(",", $data['PhotoName']);
					$album_num = 1;
					?>
					<div id="gallery<?php echo $album_num; ?>" class="galleryElement">
						<h2><?php echo $data['AlbumTitle']; ?></h2>
						<?php
						foreach ($photos as $value) {
							if($value != ''){
								?>	

								<div class="imageElement">
									<h3><?php echo $data['AlbumTitle']; ?></h3>
									<p>Date: <?php echo $data['Dates']; ?> Author: <?php echo $data['Author']; ?></p>
									<img src="imagesCMS/photo album/<?php echo $value; ?>" class="full" />
									<img src="imagesCMS/photo album/<?php echo $value; ?>" class="thumbnail" />
								</div>


								<?php 
							}
						}
						echo '</div>';
						$album_num++;
					}?>
				</div>
			 </div>

				<div class="pv_info">
					<p>Vous pouvez désormais commander des photos. Il suffit de remplir 
						le formulaire au bas de la page et de le remettre avec votre
						paiement à Jean-Philippe Ménard les dimanches soirs entre 17h00 et 18h00.</p>
						<p>Chaque impression est réalisée sur une feuille 8.5" x 11" ce qui permet d'avoir les combos (même photo)suivants : </p>

						<ul>
							<li><strong>Combo 1 :</strong> une photo de format 8" x 10"</li>
							<li><strong>Combo 2 :</strong>  une photo de fomtar 5" x 7" et deux photos de format 3.5" x 5"</li>
							<li><strong>Combo 3 :</strong>  une photo de format 5" x 7" et quatre photos de format 2.5" x 3,5"</li>
							<li><strong>Combo 4 :</strong> deux photos de format 5" x 7"</li>
							<li>Il y a aussi une possibilité pour un format 13" x 19". Ce dernier doit être validé par notre développeur.</li>
						</ul>

						<p>IMPORTANT : Le numéro des photos est situé au centre en haut.</p>

					</div>



			</div>




			<footer id="footer_content">		
				<div class="btm_left">
					<h4><a href="http://www.youtube.com/user/AquaRythme">YouTube Aqua-Rythme</a></h4>			
				</div>

				<div class="btm_center">
					<h4><a href="journal.php">Articles de Journal</a></h4>
				</div>

				<div class="btm_right">
					<h4><a href="planduSite.php">Plan du Site</a></h4>
				</div>
				<div class="copyright">
					<p>Copyrights &copy; John Benoualid &amp; Alex Lopez 2013 - The End of Time. All rights reserved.</p>
				</div>

			</footer>
		</body>
		</html>
