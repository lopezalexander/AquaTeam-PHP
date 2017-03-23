<?php
$myDB = new PDO("mysql:host=localhost;dbname=aquateam","root","");

$results = $myDB->query("SELECT * FROM resultats");
$myDB ->query("SET NAMES 'UTF8'");


	?>
	<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Marmelad' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>

	<title>Acceuil</title>
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
        <li><a href="photos_videos.php">Photo/Video</a></li>
        <li><a href="resultat.php" class="current">Resultat</a></li>
        <li><a href="tarifs.php">Tarifs</a></li>
         <li><a href="contact.php">Contact</a></li>
    </ul>
	</nav>

	<div id="content">
		

		<div id="main_content">

				<table class="hovertable">
					<tr>
						<th>Files</th>
						<th>Author</th>
						<th>Version</th>
						<th>Download</th>
					</tr>
					<?php
					while ($data = $results -> fetch()) {
						echo "<tr class='result_tr'>
							<td>".$data['FileName']."</td>
							<td>".$data['Author'].", ".$data['Dates']."</td>
							<td>".$data['Version']."</td>
							<td><a href='".$data['Url']."'><img src='images/download_arrow_small.png'></a></td>
							</tr>";
						}
						?>
				</table>
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
