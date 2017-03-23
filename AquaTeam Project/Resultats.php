
<?php
session_start();

ini_set('display_errors','On');
error_reporting(E_ALL);

        // Include the pagination class
include 'pagination.class.php';

date_default_timezone_set('Canada/Eastern'); // CDT

$current_date = date('d/m/Y -- H:i:s');

if ($_SESSION["admin"] == 1) {

	$myDB = new PDO("mysql:host=localhost;dbname=aquateam","root","");

	?>
	<!DOCTYPE HTML>
	<html>
	<head>
		<title>Resultats</title>
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
					<div class="tabs">
						<span >Journal</span>
					</div>
				</a>

				<a href="Resultats.php" class="navi_text">
					<div class="tabs"  id="current">
						<span >Resultats</span>
					</div>
				</a>

				<a href="Tarification.php" class="navi_text">
					<div class="tabs">
						<span >Tarification</span>
					</div>
				</a>

			</nav>

			<div class="mainDiv">
				<header>
					<h1>Resultats</h1>
				</header>
				<hr>

				<h2>Add Results</h2>
				<div class="form_container">
					<form method="post" enctype="multipart/form-data">
						<label>File PDF : </label>
						<input type="file" name="file"><br>

						<label>Author :</label>
						<input type="text" name="author" size="45"><br>

						<label>Version :</label>
						<input type="text" name="version" size="44"><br>

						<label>Url :</label>
						<input type="text" name="url" size="49"><br>

						<input type="submit" name="results_submit" value="Add">
					</form>
				</div>

				<hr>
				<div class="title_head">
					<h2>Delete/Edit Results</h2>
				</div>
				<?php
				if (!isset($_POST["result_edit"])) {
					
					$get_all_results = $myDB ->query("SELECT * FROM resultats");

					while($data = $get_all_results ->fetch()){ 
					        // some example data
						foreach (range(0,0) as $value) {

							$products[] = array(
								'ID' => $data["ID"],
								'FileName' => $data["FileName"],
								'Author' => $data["Author"],
								'Version' => $data["Version"],
								'Url' => $data["Url"],
								'Dates' => $data["Dates"]
								);

						}
					}

					if (count($products)) {

					          // Create the pagination object
						$pagination = new pagination($products, (isset($_GET['page']) ? $_GET['page'] : 1), 5);
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

								<div class="result_display">
									<div class="content_container">
										<span>File Name : <?php echo $productArray['FileName']; ?></span><br>
										<span>Author : <?php echo $productArray['Author']; ?></span><br>
										<span>Version : <?php echo $productArray['Version']; ?></span><br>
										<span>Url : <?php echo $productArray['Url']; ?></span><br>

									</div>
									<div class="edit_delete_container">
										<form method="post">
											<input type="hidden" name="result_hidden_id" value="<?php echo $productArray['ID']; ?>">
											<input type="submit" name="result_delete" value="DELETE"><br><br>
											<input type="submit" name="result_edit" value="EDIT">
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

				$display_edit =$myDB -> query("SELECT * FROM resultats WHERE ID='".$_POST['result_hidden_id']."'");

				$data = $display_edit ->fetch();
				?>
				<div class="form_container">

					<form method="post" enctype="multipart/form-data">

						<p>Modify the content to be edited.</p>

						<label>File Name : </label>
						<input type="file" name="file"><br>

						<label>Author :</label>
						<input type="text" name="author" value="<?php echo $data['Author']; ?>"><br>

						<label>Version :</label>
						<input type="text" name="version" value="<?php echo $data['Version']; ?>"><br>

						<label>Url :</label>
						<input type="text" name="url" value="<?php echo $data['Url']; ?>"><br>

						<input type="hidden" name="result_hidden_id1" value="<?php echo $data['ID']; ?>">
						<input type="submit" name="result_edit_confirm" value="Edit">
						<input type="submit" name="back" value="Go Back">

					</form>
				</div>
				<?php
			}
			?>

		</div>
	


</body>
</html>
<?php

//*******************************************************************************************************************************************
//*****************NEW RESULT
//*******************************************************************************************************************************************
$userflag = true;
$pdf = "";
if (isset($_POST["results_submit"])) {
	if ($_POST["author"] != null || $_POST["author"] != "" || $_POST["version"] != null || $_POST["version"] != "" || $_POST["url"] != null || $_POST["url"] != "") {
		if($_FILES["file"]["size"]<= 1000000){
	                            //test the extention
			$file_infos = pathinfo($_FILES["file"]["name"]);
			$extension_uploaded = $file_infos["extension"];
			$extension_authorize = array("pdf");

			if(in_array($extension_uploaded, $extension_authorize)){
	                                    //move the file to the right directory
				move_uploaded_file($_FILES["file"]["tmp_name"], "files/". basename($_FILES["file"]["name"]));
				$userflag = true;
				$pdf = $_FILES["file"]["name"];
			}else{
				$userflag = false;
				echo "<script>alert('File is empty')</script>";
			};


			if ($userflag){
				$_POST["Dates"] = $current_date;
				$_POST["PDF"] = $pdf;

				$add_results = $myDB -> prepare("INSERT INTO resultats(FileName,Author,Version,Url,Dates) VALUES(:FileName,:Author,:Version,:Url,:Dates)");
				$add_results ->execute(array(
					"FileName" => $_POST["PDF"],
					"Author" => $_POST["author"],
					"Version" => $_POST["version"],
					"Url" => $_POST["url"],
					"Dates" => $_POST["Dates"]
					));
				header("Location: Resultats.php");
				exit();
			}
		}
	}else{
		echo "<script>alert('Missing informations. Fill all fields.')</script>";
	}

}




//*******************************************************************************************************************************************
//*****************DELETE RESULT
//*******************************************************************************************************************************************

if (isset($_POST["result_delete"])) {

	$ID = $_POST["result_hidden_id"];
	$delete_journal = $myDB -> exec("DELETE FROM resultats WHERE ID=".$ID);
	header("Location: Resultats.php");
	exit();
}




//*******************************************************************************************************************************************
//*****************EDIT RESULT
//*******************************************************************************************************************************************

if (isset($_POST["result_edit_confirm"])) {
	if($_FILES["file"]["size"]<= 1000000){
	                            //test the extention
		$file_infos = pathinfo($_FILES["file"]["name"]);
		$extension_uploaded = $file_infos["extension"];
		$extension_authorize = array("pdf");

		if(in_array($extension_uploaded, $extension_authorize)){
	                                    //move the file to the right directory
			move_uploaded_file($_FILES["file"]["tmp_name"], "files/". basename($_FILES["file"]["name"]));
			$userflag = true;
			$pdf = $_FILES["file"]["name"];
		}else{
			$userflag = false;
			echo "<script>alert('File is empty')</script>";
		};
	}

	if ($userflag){
		$ID = $_POST["result_hidden_id1"];
		$_POST["Dates"] = $current_date;
		$_POST["PDF"] = $pdf;


		$update_journal = $myDB -> exec("UPDATE resultats SET FileName='".$_POST["PDF"]."',Author='".$_POST["author"]."',Version='".$_POST["version"]."',Url='".$_POST["url"]."',Dates='".$_POST["Dates"]."' WHERE ID=".$ID);
	}
	header("Location: Resultats.php");
	exit();
}


//*******************************************************************************************************************************************
//*****************GO BACK 
//*******************************************************************************************************************************************
if (isset($_POST["back"])) {
	header("Location: Resultats.php");
	exit();
}


}else{

	header("Location: AdminLogin.php");
	exit();
}
?>
