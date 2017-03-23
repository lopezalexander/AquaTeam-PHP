<?php
$myDB = new PDO("mysql:host=localhost;dbname=aquateam","root","");


$post = $myDB->query("SELECT * FROM communiques");
$myDB->query("SET NAMES 'UTF8'");

?>

<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" type="text/css" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Marmelad' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Marcellus+SC' rel='stylesheet' type='text/css'>

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
        <li><a href="communique.php" class="current">Communique</a></li>
        <li><a href="photos_videos.php">Photo/Video</a></li>
        <li><a href="resultat.php">Resultat</a></li>
        <li><a href="tarifs.php">Tarifs</a></li>
         <li><a href="contact.php">Contact</a></li>
    </ul>
	</nav>

	<div id="content">


		<div id="main_content">
			<?php

        ini_set('display_errors','On');
        error_reporting(E_ALL);

        // Include the pagination class
        include 'pagination.class.php';
        

while($data = $post ->fetch()){ 
        // some example data
          foreach (range(0,0) as $value) {

            $products[] = array(
              'Title' => $data["Title"],
              'Author' => $data["Author"],
              'Dates' => $data["Dates"],
              'Body' => $data["Body"]
            );
             
          }
          }
        // If we have an array with items
        if (count($products)) {

          // Create the pagination object
          $pagination = new pagination($products, (isset($_GET['page']) ? $_GET['page'] : 1), 2);
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
              // Show the information about the item
              echo '<div class="title_div"><p class="title_p"><b>'.$productArray['Title'].'</b></p></div> <div class="author_div"> <p class="author_p">'.$productArray['Author']."</p> <p class='posted_p'>posted ".$productArray['Dates'] ."</p></div> <div class='body_p'>".$productArray['Body'].'</div>';
              echo "<hr>";
            }

            // print out the page numbers beneath the results
            // echo $pageNumbers;  
            // Create the page numbers
            echo $pageNumbers = '<div class="numbers">'.$pagination->getLinks($_GET).'</div>';
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
