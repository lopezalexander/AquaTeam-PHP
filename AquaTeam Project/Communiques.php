
<?php
session_start();

date_default_timezone_set('Canada/Eastern'); // CDT

ini_set('display_errors','On');
error_reporting(E_ALL);

        // Include the pagination class
include 'pagination.class.php';



$current_date = date('d/m/Y -- H:i:s');
$myDB = new PDO("mysql:host=localhost;dbname=aquateam","root","");

if ($_SESSION["admin"] == 1) {
	?>
	<html>
	<head>
		
		<title>Communiques</title>
		<link rel="stylesheet" type="text/css" href="css/styleCMS.css">

		<link rel="stylesheet" href="css/colorbox.css"/>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

		<script src="JS/jquery.colorbox.js"></script>

		<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
		<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>


		<script>
		$(document).ready(function(){
			$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
			$(".inline").colorbox({inline:true, width:"50%"});
		});
		</script>
	</head>
	<body>

		<div id="webContainer">
			<nav id='leftmenu'>

	
				
				<a href="Entraineuse.php" class="navi_text" >
					<div class="tabs" >	
						<span >Nos entraineuse</span>
					</div>
				</a>

				<a href="Communiques.php" class="navi_text">
					<div class="tabs" id="current">
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



			<div class="mainDiv">
				<header>
					<h1>Communiques</h1>
				</header>
				<hr>

				<h2>New Communiques</h2>
				<div class="form_container">
					<form method="post" enctype="multipart/form-data">
						<label>Title : </label>
						<input type="text" name="title" size="45"><br>

						<label>Author : </label>
						<input type="text" name="author" size="43"><br>

						<label>Message :</label>
						<textarea cols="40" rows="6" id="message_body" maxlength="4000" name="message" ></textarea><br>

						<input type="submit" name="submitCom" value="Add">
					</form>
				</div>

				<hr>
				<div class="title_head">
					<h2>Delete/Edit Communiques</h2>
				</div>
				
				<?php
				if (!isset($_POST['edit_msg'])) {

					$get_all_msg = $myDB ->query("SELECT * FROM communiques");

					while($data = $get_all_msg ->fetch()){ 
					        // some example data
						foreach (range(0,0) as $value) {

							$products[] = array(
								'ID' => $data["ID"],
								'Title' => $data["Title"],
								'Author' => $data["Author"],
								'Dates' => $data["Dates"],
								'Body' => $data["Body"]
								);

						}
					}

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
								?>
								<div class="message_display">
									<div class="content_container">
										<span>Title : <?php echo $productArray['Title']; ?></span><br>
										<span>Author : <?php echo $productArray['Author']." - -  ".$productArray['Dates']; ?></span><br>
										<span>Body : <?php echo $productArray['Body']; ?></span><br>
									</div>

									<div class="edit_delete_container">
										<form method="post">
											<input type="hidden" name="hidden_ID" value="<?php echo $productArray["ID"]; ?>">
											<input type="submit" name="delete_msg" value="DELETE"><br>
											<input type="submit" name="edit_msg" value="EDIT">
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
				?><div class="form_container">
				<?php
				$get_all_msg = $myDB -> query("SELECT * FROM communiques WHERE ID='".$_POST['hidden_ID']."'");
				$data = $get_all_msg ->fetch();
				?>


				<form method="post" enctype="multipart/form-data">
					<h3>EDIT message</h3>
					<label>Title : </label>
					<input type="text" name="title" value="<?php echo $data['Title']; ?>"><br>

					<label>Author : </label>
					<input type="text" name="author" value="<?php echo $data['Author']; ?>"><br>

					<label>Message :</label>
					<textarea cols="40" rows="6" id="message_body" maxlength="4000" name="message" ><?php echo $data['Body']; ?></textarea><br>


					<input type="hidden" name="message_hidden_id" value="<?php echo $data['ID']; ?>">
					<input type="submit" name="submit_edit" value="Edit">
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
//***********************************************************************************************************
//**********	NEW MESSAGE
//***********************************************************************************************************


$userflag = true;
$image = "";
if (isset($_POST['submitCom'])) {
	if ($_POST["title"] != null || $_POST["title"] != "" || $_POST["message"] != null || $_POST["message"] != "" || $_POST["author"] != null || $_POST["author"] != "") {

			// if(!$_FILES["file"]["size"]){
			// 	$userflag = true;
			// 	$image = "";
			// }else{	
			// 	if($_FILES["file"]["size"]<= 1000000){
	  //                           //test the extention
			// 		$file_infos = pathinfo($_FILES["file"]["name"]);
			// 		$extension_uploaded = $file_infos["extension"];
			// 		$extension_authorize = array("jpg","jpeg","png","gif");

			// 		if(in_array($extension_uploaded, $extension_authorize)){
	  //           	                        //move the file to the right directory
			// 			move_uploaded_file($_FILES["file"]["tmp_name"], "images/". basename($_FILES["file"]["name"]));
			// 			$image = $_FILES["file"]["name"];
			// 		}
			// 	}
			// }

		if ($userflag){
				//$_POST["Image"] = $image;
			$_POST["Dates"] = $current_date;

			$insert = $myDB -> prepare("INSERT INTO communiques(Title,Author,Dates,Body) VALUES(:Title,:Author,:Dates,:Body)");
			$insert->execute(array(
				"Title" => $_POST["title"],
				"Author" => $_POST["author"],
				"Dates" => $_POST["Dates"],
				"Body" => $_POST["message"]
				));

		}


	}else{
		echo "<script>alert('Missing informations : Message or Title')</script>";
	};
}

//***********************************************************************************************************
//**********	DELETE
//***********************************************************************************************************

if (isset($_POST["delete_msg"])) {
	$ID = $_POST["hidden_ID"];

	
	$delete_message = $myDB -> exec("DELETE FROM communiques WHERE ID=".$ID);

}


//***********************************************************************************************************
//*********UPDATE
//***********************************************************************************************************
if (isset($_POST['submit_edit'])) {
	if ($_POST["title"] != null || $_POST["title"] != "" || $_POST["message"] != null || $_POST["message"] != "" || $_POST["author"] != null || $_POST["author"] != "") {

			// if(!$_FILES["file"]["size"]){
			// 	$userflag = true;
			// 	$image = "";
			// }else{	
			// 	if($_FILES["file"]["size"]<= 1000000){
	  //                           //test the extention
			// 		$file_infos = pathinfo($_FILES["file"]["name"]);
			// 		$extension_uploaded = $file_infos["extension"];
			// 		$extension_authorize = array("jpg","jpeg","png","gif");

			// 		if(in_array($extension_uploaded, $extension_authorize)){
	  //           	                        //move the file to the right directory
			// 			move_uploaded_file($_FILES["file"]["tmp_name"], "images/". basename($_FILES["file"]["name"]));
			// 			$image = $_FILES["file"]["name"];
			// 		}
			// 	}
			// }

		if ($userflag){
				//$_POST["Image"] = $image;
			$_POST["Dates"] = $current_date;
			$ID = $_POST["message_hidden_id"];
			$update_message = $myDB -> exec("UPDATE communiques SET Title='".$_POST["title"]."',Author='".$_POST["author"]."',Dates='".$_POST["Dates"]."',Body='".$_POST["message"]."',Image='".$_POST["Image"]."' WHERE ID =".$ID);
			header("Location: Communiques.php");
			exit();	
		}


	}else{
		echo "<script>alert('Missing informations : Message or Title')</script>";
	};
}
//*******************************************************************************************************************************************
//*****************GO BACK 
//*******************************************************************************************************************************************
if (isset($_POST["back"])) {
	header("Location: Communiques.php");
	exit();
}

}else{

	header("Location: AdminLogin.php");
	exit();
}
?>
