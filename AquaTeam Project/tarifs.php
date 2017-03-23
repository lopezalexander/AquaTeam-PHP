<?php
$myDB = new PDO("mysql:host=localhost;dbname=aquateam","root","");

$tarif = $myDB->query("SELECT * FROM tarification");
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
        <li><a href="resultat.php">Resultat</a></li>
        <li><a href="tarifs.php" class="current">Tarifs</a></li>
         <li><a href="contact.php">Contact</a></li>
    </ul>
	</nav>

	<div id="content">
		

		<div id="main_content">

			<table class="tbl_tarifs">
				<tr class="tr_info1">
					<th class="td_info">Groups</th>
					<th class="td_info">Hours</th>
					<th class="td_info">Residents</th>
					<th class="td_info">Non-Resident</th>
					

				</tr>
				<?php
				while ($data = $tarif -> fetch()) {
					echo "<tr class='tr_info'>
					<td class='td_groups'>".$data['Groups']."</td>
					<td class='td_numbers'>".$data['Hours']."</td>
					<td class='td_numbers'>".$data['Resident']."</td>
					<td class='td_numbers'>".$data['NonResident']."</td>
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
