<?php
if(isset($_POST['validermodificationetudiant']))
{
include("../sqlConnexion.php");

   
   $id_etudiant = $_POST['id_etudiant'];
   $nom_etudiant = $_POST['nom_etudiant'];
   $prenom_etudiant = $_POST['prenom_etudiant'];
   $cne_etudiant = $_POST['cne_etudiant'];
   $email_etudiant = $_POST['email_etudiant'];
   $passwordetud = $_POST['passwordetud'];
   $telephone_etudiant = $_POST['telephone_etudiant'];
           
   // mysql query to Update data
   $query = "UPDATE etudiant SET id_etudiant='".$id_etudiant."', nom_etudiant='".$nom_etudiant."', prenom_etudiant='".$prenom_etudiant."' , cne_etudiant='".$cne_etudiant."' , email_etudiant='".$email_etudiant."' , passwordetud='".$passwordetud."' , telephone_etudiant='".$telephone_etudiant."' WHERE id_etudiant = '".$id_etudiant."'";
   
   $result = mysqli_query($con, $query);
   
   if($result)
   {
    ?>
    <!--Javascript Alert -->
    <script>alert('Etudiant modifié');</script>
    <?php 
   }else{
    ?>
    <!--Javascript Alert -->
    <script>alert('Erreur de modification');</script>
    <?php 
   }
   mysqli_close($con);
}

?>
<?php
if(isset($_POST['validermodificationutilisateur']))
{
include("../sqlConnexion.php");

   
   $id_utilisateur = $_POST['id_utilisateur'];
   $nom_utilisateur = $_POST['nom_utilisateur'];
   $prenom_utilisateur = $_POST['prenom_utilisateur'];
   $description = $_POST['description'];
   $email_utilisateur = $_POST['email_utilisateur'];
   $telephone_utilisateur = $_POST['telephone_utilisateur'];
   $ppr = $_POST['ppr'];
   $password_utilis = $_POST['password_utilis'];
  
   
           
   // mysql query to Update data
   $query = "UPDATE utilisateur SET id_utilisateur='".$id_utilisateur."', nom_utilisateur='".$nom_utilisateur."', prenom_utilisateur='".$prenom_utilisateur."' , description='".$description."' , email_utilisateur='".$email_utilisateur."' , telephone_utilisateur='".$telephone_utilisateur."' , ppr='".$ppr."', password_utilis='".$password_utilis."' WHERE id_utilisateur = '".$id_utilisateur."'";
   
   $result = mysqli_query($con, $query);
   
   if($result)
   {
    ?>
    <!--Javascript Alert -->
    <script>alert('Modification réussite');</script>
    <?php 
   }else{
    ?>
    <!--Javascript Alert -->
    <script>alert('Erreur de modification');</script>
    <?php 
   }
   mysqli_close($con);
}

?>
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
				<a href="adminConsultation.php"><i class="fas fa-user"></i>Membres</a>
				<a href="../logout.php"><i class="fas fa-sign-out-alt"></i>Déconnexion</a>
			</div>
		</nav>
		<div class="content">
			<h2>Modifications des utilisateurs</h2>

		</div>
		<?php
		$mysqli = new mysqli('localhost', 'root', '', 'annuaireesto');
		$mysqli->set_charset("utf8");
		$requete = 'SELECT nom_etudiant,prenom_etudiant,cne_etudiant,email_etudiant,passwordetud,telephone_etudiant FROM etudiant';
		$resultat = $mysqli->query($requete);
        
        ?>
            <?php
$mysqli = new mysqli("localhost","root","","annuaireesto"); 
  
if(mysqli_connect_errno()){
  echo 'Conexion Failed : ', mysqli_connect_error();
  exit();
}
$query = "SELECT id_etudiant, cne_etudiant FROM etudiant ORDER BY cne_etudiant";
$query_ = "SELECT id_filiere, nom_filiere FROM filiere ORDER BY nom_filiere";
  $resultado=$mysqli->query($query);
  $resultado_=$mysqli->query($query_);
      ?>

        <h3>Modification Etudiant</h3>
        <form action="" method="post">
        <select name="id_etudiant" id="cbx_estado"><br>
        <option value="0">Id de la personne que vous voulez modifier </option><br>
        <?php while($row = $resultado->fetch_assoc()) { ?>
          <option value="<?php echo $row['id_etudiant']; ?>"><?php echo $row['id_etudiant']; ?></option><br>
        <?php } ?>
      </select><br> 
        
        <input type="text" id="modifnometudiant" name="nom_etudiant" placeholder="Nom " required><br>
        <input type="text" id="modifnometudiant" name="prenom_etudiant" placeholder="Prenom " required><br>
        <input type="text" id="modifnometudiant" name="cne_etudiant" placeholder="CNE " required><br>
        <input type="text" id="modifnometudiant" name="email_etudiant" placeholder="email " required><br>
        <input type="password" id="modifnometudiant" name="passwordetud" placeholder="mot de passe" required><br>
        <input type="text" id="modifnometudiant" name="telephone_etudiant" placeholder="telephone" required><br>
        <select name="Intitule_Filiere" id="cbx_esstado">
        <option value="0">Filiere a remplacer</option>
        <?php while($row = $resultado_->fetch_assoc()) { ?>
          <option value="<?php echo $row['nom_filiere']; ?>"><?php echo $row['nom_filiere']; ?></option>
        <?php } ?> 
      </select><br>
        

        <input type="submit" name="validermodificationetudiant" id="validermodificationetudiant" value="Valider">
                <form action="adminmodification.php" method="post">
        <input type="submit" name="annulermodificationetudiant" id="annulermodificationetudiant" value="Annuler">
</form>
<?php  

		$mysqli->close();
		?>
			<?php
		$mysqli = new mysqli('localhost', 'root', '', 'annuaireesto');
		$mysqli->set_charset("utf8");
		$requete = 'SELECT nom_utilisateur,prenom_utilisateur,description,email_utilisateur,telephone_utilisateur,ppr,password_utilis FROM utilisateur';
		$resultat = $mysqli->query($requete);
        
        ?>
        <h3>Modification des fonctionnaires et enseigants</h3>
            <?php
$mysqli = new mysqli("localhost","root","","annuaireesto"); 
  
if(mysqli_connect_errno()){
  echo 'Conexion Failed : ', mysqli_connect_error();
  exit();
}
$query = "SELECT id_utilisateur, ppr FROM utilisateur ORDER BY ppr";
  $resultado=$mysqli->query($query);

      ?>

      
        <form action="" method="post">
        <select name="id_utilisateur" id="cbx_estado"><br>
        <option value="0">Id de la personne que vous voulez modifier </option><br>
        <?php while($row = $resultado->fetch_assoc()) { ?>
          <option value="<?php echo $row['id_utilisateur']; ?>"><?php echo $row['id_utilisateur']; ?></option><br>
        <?php } ?>
      </select><br> 
        
        <input type="text" id="modifnometudiant" name="nom_utilisateur" placeholder="Nom " required><br>
        <input type="text" id="modifnometudiant" name="prenom_utilisateur" placeholder="Prenom " required><br>
        <input type="text" id="modifnometudiant" name="description" placeholder="description " required><br>
        <input type="text" id="modifnometudiant" name="email_utilisateur" placeholder="email " required><br>
        <input type="password" id="modifnometudiant" name="password_utilis" placeholder="mot de passe" required><br>
        <input type="text" id="modifnometudiant" name="telephone_utilisateur" placeholder="telephone" required><br>
        <input type="text" id="modifnometudiant" name="ppr" placeholder="PPR" required><br>
        

        <input type="submit" name="validermodificationutilisateur" id="validermodificationetudiant" value="Valider">
                <form action="adminmodification.php" method="post">
        <input type="submit" name="annulermodificationetudiant" id="annulermodificationetudiant" value="Annuler">
</form>
<?php  

		$mysqli->close();
		?>
	</body>
</html>