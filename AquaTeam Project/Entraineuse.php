
<?php
session_start();

ini_set('display_errors','On');
error_reporting(E_ALL);

        // Include the pagination class
include 'pagination.class.php';

$myDB = new PDO("mysql:host=localhost;dbname=aquateam","root","");
if ($_SESSION["admin"] == 1) {
	?>
	<html>
	<head>
		<title>Entraineuse</title>
		<link rel="stylesheet" type="text/css" href="css/styleCMS.css">
	</head>
	<body>

		<div id="webContainer">
			<nav id='leftmenu'>

				

				<a href="Entraineuse.php" class="navi_text" >
					<div class="tabs" id="current">	
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
			<!-- //********************************************************************************************************************** -->

			<div class="mainDiv">
				<header>
					<h1>Nos entraineuses</h1>
				</header>
				<hr>

				<h2>Entraineuse en Chef</h2>
				<div class="form_container">
					<form method="post" enctype="multipart/form-data" class="trainer_form">
						<label>Name : </label>
						<input type="text" name="name_chef" size="33"><br>

						<label>Picture :</label>
						<input type="file" name="file" ><br>

						<input type="submit" name="chef_entraineuse" value="Add">

					</form>
				</div>


				<h2>Entraineuses</h2>
				<div class="form_container">
					<form method="post" enctype="multipart/form-data"  class="trainer_form">
						<label>Name : </label>
						<input type="text" name="sous_name" size="33"><br>

						<label>Picture :</label>
						<input type="file" name="file" ><br>

						<input type="submit" name="sous_entraineuse" value="Add">
					</form>
				</div>
				<hr>
				<div class="title_head">
					<h1>Delete a Trainer</h1>
				</div>
				<hr>






<!-- //**********************************************************************************************************************
-->
<?php

$get_all_trainers = $myDB ->query("SELECT * FROM trainers");

while($data = $get_all_trainers ->fetch()){ 
					        // some example data
	foreach (range(0,0) as $value) {

		$products[] = array(
			'ID' => $data["ID"],
			'Name' => $data["Name"],
			'Avatar' => $data["Avatar"]
			);

	}
}
?>
<?php
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

		?>
		<div id="delete_section">

			<table id="trainer_delete_table">
				<tr >
					<th class="left_corner">Trainers</th>
					<th>Title</th>
					<th>Picture</th>
					<th class="right_corner">Delete</th>
				</tr>
				
				<?php
				foreach ($productPages as $productArray) {


					echo "<tr>";
					echo "<td>".$productArray["Name"]."</td>";
					if ($productArray["ID"]==1) {
						echo "<td>Chef</td>";
						echo "<td><img class='trainer_img' src='imagesCMS/".$productArray["Avatar"]."'></td>";
						echo "<td><form method='post'><input type='submit' value='Delete' name='delete_submit'><input type='hidden' value='".$productArray['ID']."' name='hidden_ID'></form></td>";
					}else{
						echo "<td>Trainees</td>";
						echo "<td><img class='trainer_img' src='imagesCMS/".$productArray["Avatar"]."'></td>";
						echo "<td><form method='post'><input type='submit' value='Delete' name='delete_submit'><input type='hidden' value='".$productArray['ID']."' name='hidden_ID'></form></td>";
					}

					echo "</tr>";
				}

				?>
			</table>

			
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
}?>
</div>
</div>


</body>
</html>






<!-- //**********************************************************************************************************************
//**********************************************************************************************************************
//**********************************************************************************************************************
//**********************************************************************************************************************
//**********************************************************************************************************************
-->

<?php
$userflag = true;
$avatar = "";

	// ENTRAINEUSE EN CHEF**********************************************************************************************************************
if (isset($_POST["chef_entraineuse"])) {
	if ($_POST["name_chef"] != null || $_POST["name_chef"] != "") {
		if($_FILES["file"]["size"]<= 1000000){
	                            //test the extention
			$file_infos = pathinfo($_FILES["file"]["name"]);
			$extension_uploaded = $file_infos["extension"];
			$extension_authorize = array("jpg","jpeg","png","gif");

			if(in_array($extension_uploaded, $extension_authorize)){
	                                    //move the file to the right directory
				move_uploaded_file($_FILES["file"]["tmp_name"], "imagesCMS/". basename($_FILES["file"]["name"]));
				$userflag = true;
				$avatar = $_FILES["file"]["name"];
			}else{
				$userflag = false;
				echo "<script>alert('File is empty')</script>";
			};

			if ($userflag){
				$myDB = new PDO("mysql:host=localhost;dbname=aquateam","root","");
				$verify_chef = $myDB -> query("SELECT * FROM trainers WHERE ID = 1");
				$data = $verify_chef->fetch();
				if ($data["ID"]!=1) {
					$_POST["Avatar"] = $avatar;
					$_POST["ID"] = 1;
					$insert = $myDB -> prepare("INSERT INTO trainers(ID,Name,Avatar) VALUES(:ID,:Name,:Avatar)");
					$insert->execute(array(
						"ID" => $_POST["ID"],
						"Name" => $_POST["name_chef"],
						"Avatar" => $_POST["Avatar"]
						));

				}else{
					$_POST["Avatar"] = $avatar;
					$nameupd =  $_POST["name_chef"];
					$insert = $myDB -> exec("UPDATE trainers SET Name='$nameupd', Avatar='$avatar' WHERE ID = 1");

				}
				$verify_chef ->closeCursor();
				header("Location: Entraineuse.php");
				exit();
			}
		}

	}else{
		echo "<script>alert('Name is Empty')</script>";
	};

};
	// ENTRAINEUSES*************************************************************************************************************************
if (isset($_POST["sous_entraineuse"])) {
	if ($_POST["sous_name"] != null || $_POST["sous_name"] != "") {
		if($_FILES["file"]["size"]<= 1000000){
	                            //test the extention
			$file_infos = pathinfo($_FILES["file"]["name"]);
			$extension_uploaded = $file_infos["extension"];
			$extension_authorize = array("jpg","jpeg","png","gif");

			if(in_array($extension_uploaded, $extension_authorize)){
	                                    //move the file to the right directory
				move_uploaded_file($_FILES["file"]["tmp_name"], "imagesCMS/". basename($_FILES["file"]["name"]));
				$userflag = true;
				$avatar = $_FILES["file"]["name"];
			}else{
				$userflag = false;
				echo "<script>alert('File is empty')</script>";
			};

			if ($userflag){
				$_POST["Avatar"] = $avatar;
				$myDB1 = new PDO("mysql:host=localhost;dbname=aquateam","root","");
				$insert = $myDB1 -> prepare("INSERT INTO trainers(Name,Avatar) VALUES(:Name,:Avatar)");
				$insert->execute(array(
					"Name" => $_POST["sous_name"],
					"Avatar" => $_POST["Avatar"]
					));

			}
			header("Location: Entraineuse.php");
			exit();
		}

	}else{
		echo "<script>alert('Name is Empty')</script>";
	};

};	

// DELETE************************************************************************************************************
if (isset($_POST["delete_submit"])) {
	

	$id= $_POST['hidden_ID'];
	$delete = $myDB -> exec("DELETE FROM trainers WHERE ID='$id'");
	header("Location: AdminLogin.php");
	exit();
	
}

// END OF SESSION IF T ELSE**************************************************************************************************
}else{

	header("Location: AdminLogin.php");
	exit();
}
?>
