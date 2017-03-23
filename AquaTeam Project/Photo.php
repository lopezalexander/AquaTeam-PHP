
<?php
date_default_timezone_set('Canada/Eastern'); // CDT

$current_date = date('d/m/Y -- H:i:s');

$myDB = new PDO("mysql:host=localhost;dbname=aquateam","root","");

session_start();
if ($_SESSION["admin"] == 1) {
	
	?>
	<html>
	<head>
		<title>Photos</title>
		<link rel="stylesheet" type="text/css" href="css/styleCMS.css">

		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
		<link rel="stylesheet" href="/resources/demos/style.css" />

		<script>
		$(function() {
			$( "#accordion" ).accordion();
		});
		</script>

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
					<div class="tabs" id="current">
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
					<h1>Photos Albums</h1>
				</header>
				<hr>
				<!-- ************************************************************************************************************ -->


				<div class="form_container">
					<form method="post" enctype="multipart/form-data">
						<label>Album Title : </label>
						<input type="text" name="title" size="45"><br>

						<label>Author :</label>
						<input type="text" name="author" size="45" ><br>

						<label>Photo Album :</label>
						<input type="file" name="file[]" multiple="true" size="41" ><br>

						<input type="submit" name="photo_submit" value="Add">

					</form>
				</div>

				<hr>
				<!-- ************************************************************************************************************ -->
				<div class="title_head">
					<h1>Delete a Photo</h1>
				</div>
				<?php

				$get_photo = $myDB -> query("SELECT * FROM photos");
				?>
				<div id="accordion">
					<?php
					while ($data = $get_photo->fetch()) {
						$array_photo= explode(",", $data["PhotoName"]);
						//echo count($array_photo);
						?>
						<div id="photo_div">
						<h3 id="photo_h3"><?php echo $data["AlbumTitle"];?></h3>

						
							
						</div>

						<div class="inside_accordion">
							<form method="post" class="header_form">
								<input type="hidden" name="delete_album_ID" value="<?php echo $data['ID'];?>">
								<input type="submit" name="delete_album_submit" value="DELETE Album">
							</form>
							<table id="photo_table">
								
							<?php
							for ($i=1; $i < count($array_photo); $i+= 3) { 
								echo "<tr>";
								echo "<td><img src='imagesCMS/photo album/".$array_photo[$i]."'><br><span class='name_display'>".$array_photo[$i]."</span></td>";
								if (($i+1) < count($array_photo)) {
									echo "<td><img src='imagesCMS/photo album/".$array_photo[$i+1]."'><br><span class='name_display'>".$array_photo[$i+1]."</span></td>";
								}
								if (($i+2) < count($array_photo)) {
									echo "<td><img src='imagesCMS/photo album/".$array_photo[$i+2]."'><br><span class='name_display'>".$array_photo[$i+2]."</span></td>";
								}
								
								
								echo "</tr>";
							}
							?>
							
						</table>
						<form method="post" class="header_form">
								<input type="hidden" name="delete_album_ID" value="<?php echo $data['ID'];?>">
								<input type="submit" name="delete_album_submit" value="DELETE Album">
							</form>
						
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
		

	</body>
	</html>
	<!-- ************************************************************************************************************ -->

	<?php
	$userflag = true;
	$photos = array();
//*******************************************************************************************************************************************
	// ENTRAINEUSE EN CHEF**********************************************************************************************************************
	//*******************************************************************************************************************************************

	if (isset($_POST["photo_submit"])) {
		var_dump($_FILES);
		if ($_POST["title"] != null || $_POST["title"] != "" || $_POST["author"] != null || $_POST["author"] != "") {

			for ($i=0; $i < count($_FILES["file"]["size"]); $i++) {			
				if($_FILES["file"]["size"][$i] >= 1000000000000){
					echo "<script>alert('Files Size not accceptable')</script>";
					break;
				}
			        //test the extention
				$file_infos = pathinfo($_FILES["file"]["name"][$i]);
				$extension_uploaded = $file_infos["extension"];
				$extension_authorize = array("jpg","jpeg","png","gif","JPG");

				if(in_array($extension_uploaded, $extension_authorize)){
	                                    //move the file to the right directory
					move_uploaded_file($_FILES["file"]["tmp_name"][$i], "imagesCMS/photo album/". basename($_FILES["file"]["name"][$i]));
					$userflag = true;
					array_push($photos, $_FILES["file"]["name"][$i]);
				}else{
					$userflag = false;
					echo "<script>alert('Files not accceptable')</script>";
				};
				
			}

		//var_dump($photos);

			if ($userflag){
				$stringed = "";
				foreach ($photos as $key) {
					$stringed = $stringed.",".$key;
				}
				$_POST["photos"] = $stringed;
				$_POST["Dates"] = $current_date;
				
				$insert = $myDB -> prepare("INSERT INTO photos(AlbumTitle,Author,PhotoName,Dates) VALUES(:AlbumTitle,:Author,:PhotoName,:Dates)");
				$insert->execute(array(
					"AlbumTitle" => $_POST["title"],
					"Author" => $_POST["author"],
					"PhotoName" => $_POST["photos"],
					"Dates" => $_POST["Dates"]
					));

				header("Location: Photo.php");
				exit();
			}


		}else{
			echo "<script>alert('Name is Empty')</script>";
		};

	};


//*******************************************************************************************************************************************
//*****************DELETE RESULT
//*******************************************************************************************************************************************

if (isset($_POST["delete_album_submit"])) {
	$ID = $_POST["delete_album_ID"];
	$delete_album = $myDB -> exec("DELETE FROM photos WHERE ID=".$ID);
	header("Location: Photo.php");
	exit();
}



//**********************************************************************************************************************
//**********************************************************************************************************************
//**********************************************************************************************************************



}else{

	header("Location: AdminLogin.php");
	exit();

}
?>