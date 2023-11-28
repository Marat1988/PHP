<?php
@session_start();
if (isset($_GET['page'])) {
	$page = $_GET['page'];
}
if (!isset($_GET['page'])) {
	$page = 1;
}
include_once("pages/classes/db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Fullball clubs</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet/less" href="css/style.less">
</head>

<body>
	<?php
	include_once('pages/menu.php');
	?>
	<main>
		<?php
		if (isset($_GET['page'])) {
			if ($page == 1) include_once("pages/stadiums.php");
			if ($page == 2) include_once("pages/coach.php");
			if (($page == 3) && (!isset($_SESSION['ruser']))) include_once("pages/registration.php");
			if (($page == 4) && (isset($_SESSION['radmin']))) include_once("pages/admin.php");
			if ($page == 5) include_once("pages/teams.php");
			if ($page == 6) include_once("pages/teamPlayerList.php");
			if ($page == 7) include_once("pages/pastGames.php");
			if ($page == 8) include_once("pages/calendar.php");
		} else {
			include_once("pages/stadiums.php");
		}
		?>
	</main>
	<script src="js/jquery-2.0.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/less.min.js"></script>
	<script src="js/myJs.js"></script>

</body>

</html>