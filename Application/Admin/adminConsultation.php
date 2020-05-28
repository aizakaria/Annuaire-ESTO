<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Espace Administrateur</title>
		<link href="../style/home.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Annuaire ESTO</h1>
				<a href="homeAdmin.php" id="recherche"><i class="fas fa-home"></i>Accueil</a>
				<a href="profilAdmin.php"><i class="fas fa-search"></i>Rechercher</a>
				<!-- <a href="adminModif.php"><i class="fas fa-user-cog"></i>Modifier les membres</a> -->
        <div id="menu">
<ul>
   <a href=""><i class="fas fa-user-cog"></i>Modifier les membres</a>
    <ul><br>
      <li><a href="adminAjout.php">Ajout</a></li>
      <li><a href="adminModif.php">Modification</a></li>
      <li><a href="adminsupp.php">Suppression</a></li>
    
    </ul>
  </li>
</ul>
</div>
				<a href="../logout.php"><i class="fas fa-sign-out-alt"></i>Déconnexion</a>
			</div>
		</nav>
		<div class="content">
			<h2>Liste des membres</h2>

		</div>
		<?php
		$mysqli = new mysqli('localhost', 'root', '', 'annuaireesto');
		$mysqli->set_charset("utf8");
		$requete = 'SELECT nom_etudiant,prenom_etudiant,cne_etudiant,email_etudiant,passwordetud,telephone_etudiant FROM etudiant';
		$resultat = $mysqli->query($requete);
        
        ?>
        <h3>Les etudiants</h3>
 <table border="2" cellpadding="0" cellspacing="1">
            <tr>

              <th>Nom </th>
              <th>Prenom</th>
              <th>CNE</th>
              <th>Email</th>
              <th>Mot de passe</th>
              <th>Telephone</th>
            </tr>
        <?php
        
        while ($ligne = $resultat->fetch_assoc()) {

?>
            <tr>
              <td><?php echo $ligne['nom_etudiant'] ; ?> </td>
              <td><?php echo $ligne['prenom_etudiant'] ; ?> </td>
              <td><?php echo $ligne['cne_etudiant'] ; ?> </td>
              <td><?php echo $ligne['email_etudiant'] ; ?> </td>
              <td><?php echo $ligne['passwordetud'] ; ?> </td>
              <td>+212<?php echo $ligne['telephone_etudiant'] ; ?> </td>
            </tr>

<?php
		//	echo $ligne['ID_Departement'].' '.$ligne['Intitule_DEPT'].'<br>';
        }
        ?>
</table>
<?php  

		$mysqli->close();
		?>
			<?php
		$mysqli = new mysqli('localhost', 'root', '', 'annuaireesto');
		$mysqli->set_charset("utf8");
		$requete = 'SELECT nom_utilisateur,prenom_utilisateur,description,email_utilisateur,telephone_utilisateur,ppr,password_utilis FROM utilisateur';
		$resultat = $mysqli->query($requete);
        
        ?>
        <h3>Les Enseignant et fonctionnaire</h3>
 <table border="2" cellpadding="0" cellspacing="1">
            <tr>

              <th>Nom </th>
              <th>Prenom</th>
              <th>Description</th>
              <th>Email</th>
              <th>Mot de passe</th>
              <th>Telephone</th>
              <th>PPR</th>
            </tr>
        <?php
        
        while ($ligne = $resultat->fetch_assoc()) {

?>
            <tr>
              <td><?php echo $ligne['nom_utilisateur'] ; ?> </td>
              <td><?php echo $ligne['prenom_utilisateur'] ; ?> </td>
              <td><?php echo $ligne['description'] ; ?> </td>
              <td><?php echo $ligne['email_utilisateur'] ; ?> </td>
              <td><?php echo $ligne['password_utilis'] ; ?> </td>
              <td>+212<?php echo $ligne['telephone_utilisateur'] ; ?> </td>
              <td><?php echo $ligne['ppr'] ; ?> </td>
            </tr>

<?php
		//	echo $ligne['ID_Departement'].' '.$ligne['Intitule_DEPT'].'<br>';
        }
        ?>
</table>
<?php  

		$mysqli->close();
		?>
	</body>
</html>