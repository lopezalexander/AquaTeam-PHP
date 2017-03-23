
<?php
session_start();

ini_set('display_errors','On');
error_reporting(E_ALL);

        // Include the pagination class
include 'pagination.class.php';

if ($_SESSION["admin"] == 1) {

	$myDB = new PDO("mysql:host=localhost;dbname=aquateam","root","");
	?>
	<html>
	<head>
		<title>Journal</title>
		<link rel="stylesheet" type="text/css" href="css/styleCMS.css">
	</head>
	<body>

		<div id="webContainer">
			<nav id='leftmenu'>

		

				<a href="Entraineuse.php" class="navi_text" >
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
					<div class="tabs" id="current">
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
			<!--  ********************************************************************************************************************************************** -->
			<!--  ********************************************************************************************************************************************** -->
			<!--  ********************************************************************************************************************************************** -->

			<div class="mainDiv">
				<header>
					<h1>Journal</h1>
				</header>
				<hr>

				<h2>Articles</h2>
				<div class="form_container">
					<form method="post" enctype="multipart/form-data">
						<label>Title : </label>
						<input type="text" name="title" size="45"><br>

						<label>Description : </label>
						<textarea rows="5" cols="40" name="textarea"></textarea><br>

						<label>Url Link 1 :</label>
						<input type="text" name="link" size="41" ><br>

						<label>Url Link 2 :</label>
						<input type="text" name="linksecond" size="41" ><br>

						<label>Source :</label>
						<input type="text" name="source" size="45" ><br>

						<label>Source Date :</label>
						<input type="date" name="dates" ><br>

						<input type="submit" name="journal_submit" value="Add">

					</form>
				</div>


				<!--  ********************************************************************************************************************************************** -->
				<!--  ********************************************************************************************************************************************** -->
				<!--  ********************************************************************************************************************************************** -->
				<hr>



				<div class="title_head">
					<h2>Delete/Edit Journal</h2>
				</div>

				<?php
				if (!isset($_POST["journal_edit"])) {
					
					$get_all_journal = $myDB ->query("SELECT * FROM journal");

					while($data = $get_all_journal ->fetch()){ 
					        // some example data
						foreach (range(0,0) as $value) {

							$products[] = array(
								'ID' => $data["ID"],
								'Title' => $data["Title"],
								'Source' => $data["Source"],
								'Description' => $data["Description"],
								'Url' => $data["Url"],
								'Url2' => $data["Url2"],
								'Dates' => $data["Dates"]
								);

						}
					}

					if (count($products)) {

					          // Create the pagination object
						$pagination = new pagination($products, (isset($_GET['page']) ? $_GET['page'] : 1), 3);
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




								<div class="journal_display">
									<div class="content_container">
										<span>Title : <?php echo $productArray['Title']; ?></span><br><br>
										<span>Description : <?php echo $productArray['Description']; ?></span><br><br>
										<span>Url : <?php echo $productArray['Url']; ?></span><br><br>
										<?php
										if ($productArray['Url2'] != "" || $productArray['Url2'] != null) {
											?>
											<span>Url 2: <?php echo $productArray['Url2']; ?></span><br><br>
											<?php
										}
										?>

										<span>Source : <?php echo $productArray['Source']." - -  ".$productArray['Dates']; ?></span><br><br>	
									</div>
									<div class="edit_delete_container">
										<form method="post">
											<input type="hidden" name="journal_hidden_id" value="<?php echo $productArray['ID']; ?>">
											<input type="submit" name="journal_delete" value="DELETE"><br><br>
											<input type="submit" name="journal_edit" value="EDIT">
										</form>
									</div>
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
			}else{

				$display_edit =$myDB -> query("SELECT * FROM journal WHERE ID='".$_POST['journal_hidden_id']."'");

				$data = $display_edit ->fetch();
				?>

				<div class="form_container">
					<form method="post" enctype="multipart/form-data">
						<p>Modify the content to be edited.</p>

						<label>Title : </label>
						<input type="text" name="title1" value="<?php echo $data['Title']; ?>"><br><br>

						<label>Description : </label>
						<textarea rows="5" cols="40" name="textarea1"><?php echo $data['Description']; ?></textarea><br>

						<label>Url Link 1 :</label>
						<input type="text" name="link1" size="41"  value="<?php echo $data['Url']; ?>"><br><br>
						<?php
						if ($data['Url2'] != "" || $data['Url2'] != null) {
							?>
							<label>Url Link second :</label>
							<input type="text" name="linksecond" size="41" value="<?php echo $data['Url2']; ?>" ><br><br>
							<?php
						}
						?>
						<label>Source :</label>
						<input type="text" name="source1" size="42"  value="<?php echo $data['Source']; ?>"><br><br>

						<label>Source Date :</label>
						<input type="date" name="dates1" ><br>

						<input type="hidden" name="journal_hidden_id1" value="<?php echo $data['ID']; ?>">
						<input type="submit" name="journal_submit1" value="Edit">
						<input type="submit" name="back" value="Go Back">

					</form>
				</div>


				<?php
			}
			?>


		</div>
	</div>


</body>
</html>


<?php

//*******************************************************************************************************************************************
//*****************NEW JOURNAL ARTICLE
//*******************************************************************************************************************************************

if (isset($_POST["journal_submit"])) {
	if ($_POST["title"] != null || $_POST["title"] != "" || $_POST["textarea"] != null || $_POST["textarea"] != "" || $_POST["link"] != null || $_POST["link"] != "" || $_POST["source"] != null || $_POST["source"] != "") {
		if ($_POST["linksecond"] != "" || $_POST["linksecond"] != null ) {
			$add_journal = $myDB -> prepare("INSERT INTO journal(Title,Description,Source,Url,Url2,Dates) VALUES(:Title,:Description,:Source,:Url,:Url2,:Dates)");
			$add_journal ->execute(array(
				"Title" => $_POST["title"],
				"Description" => $_POST["textarea"],
				"Source" => $_POST["source"],
				"Url" => $_POST["link"],
				"Url2" => $_POST["linksecond"],
				"Dates" => $_POST["dates"]
				));
		}else{
			$add_journal = $myDB -> prepare("INSERT INTO journal(Title,Description,Source,Url,Dates) VALUES(:Title,:Description,:Source,:Url,:Dates)");
			$add_journal ->execute(array(
				"Title" => $_POST["title"],
				"Description" => $_POST["textarea"],
				"Source" => $_POST["source"],
				"Url" => $_POST["link"],
				"Dates" => $_POST["dates"]
				));

		}







	}else{
		echo "<script>alert('Missing informations. Fill all fields.')</script>";
	}

}
//*******************************************************************************************************************************************
//*****************DELETE ARTICLE
//*******************************************************************************************************************************************
if (isset($_POST["journal_delete"])) {
	$ID = $_POST["journal_hidden_id"];
	$delete_journal = $myDB -> exec("DELETE FROM journal WHERE ID=".$ID);
	header("Location: Journals.php");
	exit();
}
//*******************************************************************************************************************************************
//*****************EDIT ARTICLE
//*******************************************************************************************************************************************
if (isset($_POST["journal_submit1"])) {
	$ID = $_POST["journal_hidden_id1"];

	if ($_POST["linksecond"] != "" || $_POST["linksecond"] != null ) {
		$update_journal = $myDB -> exec("UPDATE journal SET Title='".$_POST["title1"]."',Description='".$_POST["textarea1"]."',Source='".$_POST["source1"]."',Url='".$_POST["link1"]."', Url2='".$_POST["linksecond"]."',Dates='".$_POST["dates1"]."' WHERE ID=".$ID);
	}else{
		$update_journal = $myDB -> exec("UPDATE journal SET Title='".$_POST["title1"]."',Description='".$_POST["textarea1"]."',Source='".$_POST["source1"]."',Url='".$_POST["link1"]."',Dates='".$_POST["dates1"]."' WHERE ID=".$ID);

	}
	header("Location: Journals.php");
	exit();
}
//*******************************************************************************************************************************************
//*****************GO BACK 
//*******************************************************************************************************************************************
if (isset($_POST["back"])) {
	header("Location: Journals.php");
	exit();
}




}else{

	header("Location: AdminLogin.php");
	exit();
}
?>
