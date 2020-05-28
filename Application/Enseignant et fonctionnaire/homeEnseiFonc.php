<?php

session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Location: ../index.html');
	exit;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Accueil</title>
		<link href="../style/home.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Annuaire ESTO</h1>
				<a href="profilEnseiFonc.php"><i class="fas fa-search"></i>Rechercher</a>
				<a href="profilEnseiFonc.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="../logout.php"><i class="fas fa-sign-out-alt"></i>Déconnexion</a>
			</div>
		</nav>
		<div class="content">
			<h2>Accueil</h2>
			<p>Bonjour, <?=$_SESSION['prenom']?>!</p>
		</div>
	</body>
</html>