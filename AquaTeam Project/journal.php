<?php
ini_set('display_errors','On');
error_reporting(E_ALL);

        // Include the pagination class
include 'pagination.class.php';

$myDB = new PDO("mysql:host=localhost;dbname=aquateam","root","");
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
			<li><a href="#">Acceuil</a></li>
			<li><a href="entraineuses.php">Entraineuse</a></li>
			<li><a href="communique.php">Communique</a></li>
			<li><a href="photos_videos.php">Photo/Video</a></li>
			<li><a href="resultat.php">Resultat</a></li>
			<li><a href="taris.php">Tarifs</a></li>
			<li><a href="contact.php">Contact</a></li>
		</ul>
	</nav>

	<div id="content">
		

		<div id="main_content">

			<?php
			$get_journals = $myDB -> query("SELECT * FROM journal");


			while($data = $get_journals ->fetch()){ 
					        // some example data
				foreach (range(0,0) as $value) {

					$products[] = array(
						'ID' => $data["ID"],
						'Title' => $data["Title"],
						'Description' => $data["Description"],
						'Source' => $data["Source"],
						'Url' => $data["Url"],
						'Url2' => $data["Url2"],
						'Dates' => $data["Dates"]
						);

				}
			}
			if (count($products)) {

					          // Create the pagination object
				$pagination = new pagination($products, (isset($_GET['page']) ? $_GET['page'] : 1), 6);
					          // Decide if the first and last links should show
				$pagination->setShowFirstAndLast(false);
					          // You can overwrite the default seperator
				$pagination->setMainSeperator(' | ');
					          // Parse through the pagination class
				$productPages = $pagination->getResults();

					          // If we have items 
				if (count($productPages) != 0) {						
					            // Loop through all the items in the array
					foreach ($productPages as $productArray) {
						?>


						<div>
							<h2 class="journal_title"><?php echo $productArray["Title"];?></h2>

							<div class="journal_desc"><strong><?php echo $productArray["Description"];?></strong></div><br>
							<div class="journal_link"><a href='<?php echo $productArray["Url"];?>'><?php echo $productArray["Url"];?></a><br>
								<a href='<?php echo $productArray["Url"];?>'><?php echo $productArray["Url2"];?></a></div>
								<div class="journal_source">Source : <?php echo $productArray["Source"];?> <?php echo $productArray["Dates"];?></div>

							</div>

							<?php
						}

				            // print out the page numbers beneath the results
				            // echo $pageNumbers;  
				            // Create the page numbers
						?><div class="pagination"><?php
						echo $pageNumbers = '<div class="numbers">'.$pagination->getLinks($_GET).'</div>';
						?>
					</div>
					<?php
				}
			}
			?>
		</div>

		

	</div>




	<footer id="footer_content">		
		<div class="btm_left">
			<h4><a href="http://www.youtube.com/user/AquaRythme">YouTube Aqua-Rythme</a></h4>			
		</div>

		<div class="btm_center">
			<h4 ><a  class="current" href="journal.php">Articles de Journal</a></h4>
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
