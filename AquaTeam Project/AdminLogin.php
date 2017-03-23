<?php
session_start();
$_SESSION["admin"] = 0;


?>


<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="css/styleCMS.css">
</head>
<body>


<div id="LoginFrame">

	<div id ="AdminLogin">
		<form id="admin_form" method="post">
			<h1>Admin</h1><br>

			<label for="admin_username"><b>Username :</b></label>
			<input type="text" name="admin_username"><br>

			<label for="admin_password"><b>Password :</b></label>
			<input type="password" name="admin_password"><br><br>

			<input type="submit" name="adminlogin">

		</form>
	</div>
</div>


<?php

if (isset($_POST['adminlogin'])) {

$myDB = new PDO("mysql:host=localhost;dbname=aquateam","root","");
$adminLogin = $myDB -> query("SELECT * FROM admin WHERE Username = '".$_POST["admin_username"]."'");


	while ($dataLog = $adminLogin -> fetch()) {
		if ($_POST["admin_username"]==$dataLog["Username"] && $_POST["admin_password"]==$dataLog["Password"] && $_POST["admin_username"]!="" && $_POST["admin_username"]!=null && $_POST["admin_password"]!="" && $_POST["admin_password"]!=null) {
			$_SESSION["admin"] = 1;

			header("Location: MainIndex.php");
			exit();

		
		}
	}
}


?>

</body>
</html>