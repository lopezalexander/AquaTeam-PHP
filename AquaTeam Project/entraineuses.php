<?php
$myDB = new PDO("mysql:host=localhost;dbname=aquateam","root","");

$picture = $myDB->query("SELECT * FROM trainers");
$myDB ->query("SET NAMES 'UTF8'");


?>


<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Marmelad' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>

	<title>Entraineuses</title>
</head>
<body>

	<header>
			<div id="main_header">
				
			</div>
	</header>

	<nav class="horizontal-nav">
    <ul style="list-style-type: none;">
        <li><a href="index.php">Acceuil</a></li>
        <li><a href="entraineuse.php" class="current">Entraineuse</a></li>
        <li><a href="communique.php">Communique</a></li>
        <li><a href="photos_videos.php">Photo/Video</a></li>
        <li><a href="resultat.php">Resultat</a></li>
        <li><a href="tarifs.php">Tarifs</a></li>
        <li><a href="contact.php">Contact</a></li>
    </ul>
	</nav>

	<div id="content">
		

		<div id="main_content">
			<div class="chef">
				<h2>Entraîneuse en chef</h2>
				<?php

				$pic_chef = $myDB->query("SELECT * FROM trainers WHERE ID = 1");
				$data = $pic_chef->fetch();

				echo"<img src='images/".$data["Avatar"]."'><br><p class='entrChef_name'>".$data["Name"]."</p>";

				$pic_chef -> closeCursor();
				?>

				
				<p class="chef_des">Nageuse au début du Club, Véronique Lemay est notre entraîneuse en chef depu is bientôt 4 ans. Elle a acquis une formation en sport. </p>
			</div>
			<hr>
			
			<div id="entr">
				<h2 >Entraîneuses</h2>
				<table class="entraineuses_tbl">
<tr>
	<?php
	while ($data =$picture ->fetch()) {
			if ($data["ID"] <= 6 && $data["ID"] != 1) {
				echo "<td class='entraineuses_pic'><img src='images/".$data["Avatar"]."'><br><p class='entr_name'>".$data["Name"]."</p></td>";
			}
			if ($data["ID"] == 6 ) {
				echo "</tr>";
				echo "<tr>";
			}
			?>
			<?php
			if($data["ID"] > 6  && $data["ID"] <= 11){
				echo "<td class='entraineuses_pic'><img src='images/".$data["Avatar"]."'><br><p class='entr_name'>".$data["Name"]."</p></td>";
			}
			if ($data["ID"] == 11 ) {
				echo "</tr>";
				echo "<tr>";
			}
			?>
			<?php
			if($data["ID"] > 11  && $data["ID"] <= 16){
				echo "<td class='entraineuses_pic'><img src='images/".$data["Avatar"]."'><br><p class='entr_name'>".$data["Name"]."</p></td>";	
			}
			if ($data["ID"] == 16 ) {
				echo "</tr>";
				echo "<tr>";
			}
			?>
			<?php
			if($data["ID"] > 16  && $data["ID"] <= 21){
				echo "<td class='entraineuses_pic'><img src='images/".$data["Avatar"]."'><br><p class='entr_name'>".$data["Name"]."</p></td>";	
			}
			if ($data["ID"] == 21 ) {
				echo "</tr>";
			}
			?>
		
	<?php
	}
	?>
</table>

			</div>
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
