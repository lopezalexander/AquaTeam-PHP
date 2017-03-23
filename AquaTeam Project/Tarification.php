
<?php
session_start();
if ($_SESSION["admin"] == 1) {
	$myDB = new PDO("mysql:host=localhost;dbname=aquateam","root","");
	?>
	<html>
	<head>
		<title>Tarification</title>
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
					<div class="tabs">
						<span >Resultats</span>
					</div>
				</a>

				<a href="Tarification.php" class="navi_text">
					<div class="tabs"  id="current">
						<span >Tarification</span>
					</div>
				</a>

			</nav>

			<div class="mainDiv">
				<header>
					<h1>Tarification</h1>
				</header>
				<hr>

				<h2>Add a Tarification Informations</h2>
				<div class="form_container">
					<form method="post">
						<label>Group Name : </label>
						<input type="text" name="group_name" size="43"><br>

						<label>Hours :</label>
						<input type="text" name="hours" size="50"><br>

						<label>Resident Price :</label>
						<input type="text" name="ResidentPrice" size="42"><br>

						<label>Non-Resident Price :</label>
						<input type="text" name="NoResidentPrice" size="36"><br>

						<input type="submit" name="TarifSubmit" value="Add">

					</form>
				</div>
				<hr>
				<div class="title_head">
				<h2>Delete/Edit Tarification</h2>
				</div>
				<?php
				if (!isset($_POST["edit_tarif"])) {
					$showAll = $myDB -> query("SELECT * FROM tarification");
					?>
					<table id="trainer_delete_table">
						<tr>
							<th class="left_corner">GROUPS</th>
							<th>HOURS</th>
							<th>Residents</th>
							<th>Non-Resident</th>
							<th class="right_corner">Delete/Edit</th>

						</tr>
						<?php
						while ($data = $showAll -> fetch()) {
							echo "<tr>
							<td>".$data['Groups']."</td>
							<td>".$data['Hours']."</td>
							<td>".$data['Resident']."</td>
							<td>".$data['NonResident']."</td>
							<td><form method='post'><input type='submit' value='Delete' name='delete_tarif'><input type='submit' value='Edit' name='edit_tarif'><input type='hidden' value='".$data['ID']."' name='hidden_ID'></form></td>
							</tr>";
						}
						?>
					</table>
					<?php
				}else{
					$display_tarif_edit = $myDB -> query("SELECT * FROM tarification WHERE ID='".$_POST['hidden_ID']."'");

					$data = $display_tarif_edit ->fetch();
					?>
					<h2>Edit Tarification Informations</h2>
					
					<div class="form_container">
						<form method="post">
							<label>Group Name : </label>
							<input type="text" name="group_name" value="<?php echo $data['Groups']; ?>"><br>

							<label>Hours :</label>
							<input type="text" name="hours" value="<?php echo $data['Hours']; ?>"><br>

							<label>Resident Price :</label>
							<input type="text" name="ResidentPrice" value="<?php echo $data['Resident']; ?>"><br>

							<label>Non-Resident Price :</label>
							<input type="text" name="NoResidentPrice" value="<?php echo $data['NonResident']; ?>"><br>

							<input type="hidden" name="tarif_hidden_id1" value="<?php echo $data['ID']; ?>">
							<input type="submit" name="tarif_edit_submit" value="Edit">
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
//*****************NEW TARIF
//*******************************************************************************************************************************************

	if (isset($_POST["TarifSubmit"])) {
		if ($_POST["group_name"] != null || $_POST["group_name"] != "" || $_POST["hours"] != null || $_POST["hours"] != "" || $_POST["ResidentPrice"] != null || $_POST["ResidentPrice"] != "" || $_POST["NoResidentPrice"] != null || $_POST["NoResidentPrice"] != "") {

			
			$insert = $myDB -> prepare("INSERT INTO tarification(Groups,Hours,Resident,NonResident) VALUES(:Groups,:Hours,:Resident,:NonResident)");

			$insert ->execute(array(
				"Groups" => $_POST["group_name"],
				"Hours" => $_POST["hours"],
				"Resident" => $_POST["ResidentPrice"],
				"NonResident" => $_POST["NoResidentPrice"]
				));
			
		}else{
			echo "<script>alert('Missing Information')</script>";
		}
	}

//*******************************************************************************************************************************************
//*****************DELETE TARIF
//*******************************************************************************************************************************************
	if (isset($_POST["delete_tarif"])) {
		$ID = $_POST["hidden_ID"];
		$delete_tarif = $myDB -> exec("DELETE FROM tarification WHERE ID=".$ID);
		header("Location: Tarification.php");
		exit();
	}



//*******************************************************************************************************************************************
//*****************UPDATE TARIF
//*******************************************************************************************************************************************
	if (isset($_POST["tarif_edit_submit"])) {
		if ($_POST["group_name"] != null || $_POST["group_name"] != "" || $_POST["hours"] != null || $_POST["hours"] != "" || $_POST["ResidentPrice"] != null || $_POST["ResidentPrice"] != "" || $_POST["NoResidentPrice"] != null || $_POST["NoResidentPrice"] != "") {

			$ID= $_POST['tarif_hidden_id1'];
			$update_tarif = $myDB -> exec("UPDATE tarification SET Groups='".$_POST["group_name"]."',Hours='".$_POST["hours"]."',Resident='".$_POST["ResidentPrice"]."',NonResident='".$_POST["NoResidentPrice"]."' WHERE ID=".$ID);

			header("Location: Tarification.php");
			exit();
			
		}else{
			echo "<script>alert('Missing Information')</script>";
		}
	}


//*******************************************************************************************************************************************
//*****************GO BACK
//*******************************************************************************************************************************************

	if (isset($_POST["back"])) {
		header("Location: Tarification.php");
		exit();
	}


}else{

	header("Location: AdminLogin.php");
	exit();
}
?>
