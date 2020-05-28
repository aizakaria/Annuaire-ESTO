<?php

session_start();
include("../sqlConnexion.php");

if (!isset($_SESSION['loggedin'])) {
	header('Location: ../index.html');
	exit;
}

$stmt = $con->prepare('SELECT login,password FROM admin WHERE id_admin = ?');

$stmt->bind_param('i', $_SESSION['id_utilisateur']);
$stmt->execute();
$stmt->bind_result($login,$password);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profile Page</title>
		<link href="../style/home.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Annuaire ESTO</h1>
				<a href="homeAdmin.php" id="recherche"><i class="fas fa-home"></i>Accueil</a>
				<a href="profilAdmin.php"><i class="fas fa-search"></i>Rechercher</a>
				
				<a href="../logout.php"><i class="fas fa-sign-out-alt"></i>Deconnexion</a>
			</div>
		</nav>
		<div class="content">
			<h2>Votre profil</h2>
			<div>
				<p>Information personelles:</p>
				<table>
					<tr>
						<td>Nom:</td>
						<td><?=$_SESSION['nom']?></td>
						
					</tr>
					<tr>
						<td>Prenom:</td>
						<td><?=$_SESSION['prenom']?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?=$_SESSION['email']?></td>
					</tr>
					<tr>
						<td>mot de passe:</td>
						<td><?=$_SESSION['password']?></td>
					</tr>
					
				</table>
			</div>
		</div>
	</body>
</html>
