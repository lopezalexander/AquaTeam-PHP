<?php
session_start();
if ($_SESSION["admin"] == 1) {
	?>
	<html>
	<head>
		<title>CMS PAGE</title>
		<link rel="stylesheet" type="text/css" href="css/styleCMS.css">
	</head>
	<body>

		<div id="webContainer">
			<nav id='leftmenu'>

				<a href="Entraineuse.php" class="navi_text">
					<div class="tabs">
						<span >Nos entraineuse</span>
					</div>
				</a>

				<a href="Communiques.php" class="navi_text">
					<div class="tabs">
						<span >Communiques</span>
					</div>
				</a>

				<a href="Photo.php" class="navi_text">
					<div class="tabs">
						<span >Photos</span>
					</div>
				</a>

				<a href="Journals.php" class="navi_text">
					<div class="tabs">
						<span >Journal</span>
					</div>
				</a>

				<a href="Resultats.php" class="navi_text">
					<div class="tabs">
						<span >Resultats</span>
					</div>
				</a>

				<a href="Tarification.php" class="navi_text">
					<div class="tabs">
						<span >Tarification</span>
					</div>
				</a>

			</nav>

			<div>
				<h1 style='font-size:80px;margin-top: 0px; font-style: italic;'>Welcome to the CMS</h1>
			</div>
			<hr>
		</div>



	</body>
	</html>
	<?php

}else{

	header("Location: AdminLogin.php");
	exit();
}
?>