<?php

session_start();
include("../sqlConnexion.php");

if (!isset($_SESSION['loggedin'])) {
	header('Location: ../index.html');
	exit;
}

$stmt = $con->prepare('SELECT nom_utilisateur, prenom_utilisateur, description, email_utilisateur, telephone_utilisateur FROM utilisateur WHERE id_utilisateur = ?');

$stmt->bind_param('i', $_SESSION['id_utilisateur']);
$stmt->execute();
$stmt->bind_result($nom_utilisateur, $prenom_utilisateur, $description, $email_utilisateur, $telephone_utilisateur);
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
				<a href="homeEnseiFonc.php" id="recherche"><i class="fas fa-home"></i>Accueil</a>
				<a href="profilEnseiFonc.php"><i class="fas fa-search"></i>Rechercher</a>
				<a href="modifUtilisateur.php"><i class="fas fa-user-cog"></i>Parametre du compte</a>
				<a href="../logout.php"><i class="fas fa-sign-out-alt"></i>Déconnexion</a>
			</div>
		</nav>
		<div class="content">
			<h2>Votre profil</h2>
			<div>
				<p>Information personelles:</p>
				<table>
					<tr>
						<td>Votre ID:</td>
						<td><?=$_SESSION['id']?></td>
						
					</tr>
					<tr>
						<td>Nom:</td>
						<td><?=$_SESSION['nom']?></td>
						
					</tr>
					<tr>
						<td>Prenom:</td>
						<td><?=$_SESSION['prenom']?></td>
					</tr>
					<tr>
						<td>Description:</td>
						<td><?=$_SESSION['Description']?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?=$_SESSION['Email']?></td>
					</tr>
					<tr>
						<td>Telephone:</td>
						<td>+212<?=$_SESSION['telephone']?></td>
					</tr>
					<tr>
						<td>PPR:</td>
						<td><?=$_SESSION['PPR']?></td>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>