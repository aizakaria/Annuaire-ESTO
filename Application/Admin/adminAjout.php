<?php
require('../sqlConnexion.php');
if(isset($_POST["submitetudiant"])){
  if( !empty($_POST['id_filiere']) && !empty($_POST['nom_etudiant']) && !empty($_POST['prenom_etudiant']) && !empty($_POST['cne_etudiant'])&& !empty($_POST['email_etudiant'])&& !empty($_POST['passwordetud']) && !empty($_POST['telephone_etudiant'])){
   

  $id_filiere = $_POST['id_filiere'];
  $nom_etudiant = $_POST['nom_etudiant'];
  $prenom_etudiant = $_POST['prenom_etudiant'];
  $cne_etudiant = $_POST['cne_etudiant'];
  $email_etudiant = $_POST['email_etudiant'];
  $passwordetud = $_POST['passwordetud'];  
  $telephone_etudiant = $_POST['telephone_etudiant'];


  
 
  //Selecting Database
  $query = mysqli_query($con, "SELECT * FROM etudiant WHERE nom_etudiant='".$nom_etudiant."'");
  $numrows = mysqli_num_rows($query);
  if($numrows == 0)
  {
  //Insert to Mysqli Query
  $sql = "INSERT INTO etudiant (id_filiere,nom_etudiant,prenom_etudiant,cne_etudiant,email_etudiant,passwordetud,telephone_etudiant) VALUES('$id_filiere','$nom_etudiant','$prenom_etudiant','$cne_etudiant','$email_etudiant','$passwordetud','$telephone_etudiant')";
   $result = mysqli_query($con, $sql);
  
  //Result Message
  if($result){
   ?>
   <!--Javascript Alert -->
   <script>alert('Etudiant inscrit avec succes');</script>
   <?php
  }
  else
  {
   ?>
   <!--Javascript Alert -->
   <script>alert('erreur d inscription!');</script>
   <?php
  }
  }
  else
  {
   ?>
   <!--Javascript Alert -->
   <script>alert('Ces donnees d Etudiant existent deja! Veuillez ressayer');</script>
   <?php
  }
  }
  else
  {
  ?>
  <!--Javascript Alert -->
  <script>alert('Il faut remplir tout les champs');</script>
  <?php
  }
 }
?>







<?php
require('../sqlConnexion.php');
if(isset($_POST["submitutilisateur"])){
  if( !empty($_POST['nom_utilisateur']) && !empty($_POST['prenom_utilisateur']) && !empty($_POST['description'])&& !empty($_POST['email_utilisateur'])&& !empty($_POST['telephone_utilisateur']) && !empty($_POST['ppr'])&& !empty($_POST['password_utilis'])){
   

  
  $nom_utilisateur = $_POST['nom_utilisateur'];
  $prenom_utilisateur = $_POST['prenom_utilisateur'];
  $description = $_POST['description'];
  $email_utilisateur = $_POST['email_utilisateur'];
  $telephone_utilisateur = $_POST['telephone_utilisateur'];  
  $ppr = $_POST['ppr'];
  $password_utilis = $_POST['password_utilis'];
 
  
  
 
  //Selecting Database
  $query = mysqli_query($con, "SELECT * FROM Utilisateur WHERE nom_utilisateur='".$nom_utilisateur."'");
  $numrows = mysqli_num_rows($query);
  if($numrows == 0)
  {
  //Insert to Mysqli Query
  $sql = "INSERT INTO utilisateur(nom_utilisateur,prenom_utilisateur,description,email_utilisateur,telephone_utilisateur,ppr,password_utilis) VALUES('$nom_utilisateur','$prenom_utilisateur','$description','$email_utilisateur','$telephone_utilisateur','$ppr','$password_utilis')";
   $result = mysqli_query($con, $sql);
  
  //Result Message
  if($result){
   ?>
   <!--Javascript Alert -->
   <script>alert('Utilisateur inscrit avec succes');</script>
   <?php
  }
  else
  {
   ?>
   <!--Javascript Alert -->
   <script>alert('erreur d inscription!');</script>
   <?php
  }
  }
  else
  {
   ?>
   <!--Javascript Alert -->
   <script>alert('Ces donnees existent deja! Veuillez ressayer');</script>
   <?php
  }
  }
  else
  {
  ?>
  <!--Javascript Alert -->
  <script>alert('Il faut remplir tout les champs');</script>
  <?php
  }
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
				<a href="adminConsultation.php"><i class="fas fa-user-cog"></i>Membres</a>
				<a href="../logout.php"><i class="fas fa-sign-out-alt"></i>Déconnexion</a>
			</div>
		</nav>
		      <div id="inscrire">

        <?php
$mysqli = new mysqli("localhost","root","","annuaireesto"); 
	
if(mysqli_connect_errno()){
  echo 'Conexion Failed : ', mysqli_connect_error();
  exit();
}

$query = "SELECT id_filiere, nom_filiere FROM filiere ORDER BY nom_filiere";
  $resultado=$mysqli->query($query);
      ?>

        
        <h3>AJOUT D'UN ETUDIANT</h3>
        <form action="" method="post">
        <input type="text" name="nom_etudiant" id="nom_etudiant" placeholder="Nom" required>
        <input type="text" name="prenom_etudiant" id="prm" placeholder="Prenom" required>
        <input type="text" name="cne_etudiant" id="CNE_Etudiant" placeholder="CNE" required>
        <input type="email" name="email_etudiant" id="Email_Etudiant" placeholder="Email" required>
        <input type="password" name="passwordetud" id="Password_Etudiant" placeholder="Mot de passe" required>
        <input type="text" name="telephone_etudiant" id="Numero de Telephone" placeholder="Numero de Telephone" required>
        <select name="id_filiere" id="cbx_estado">
				<option value="0">Selection de Filiere</option>
				<?php while($row = $resultado->fetch_assoc()) { ?>
					<option value="<?php echo $row['id_filiere']; ?>"><?php echo $row['nom_filiere']; ?></option>
				<?php } ?>
            </select>
            <input type="submit" name="submitetudiant" value="Enregistrer">
</form>
        <form action="menuadmin.php" method="post">
        <input type="submit" name="Annuler" id="anl" value="Annuler">
        </form>
        </div>
         <div id="inscrire">

        <?php
$mysqli = new mysqli("localhost","root","","annuaireesto"); 
	
if(mysqli_connect_errno()){
  echo 'Conexion Failed : ', mysqli_connect_error();
  exit();
}

/*$query = "SELECT ID_Filiere, Nom_Filiere FROM Filiere ORDER BY Nom_Filiere";
  $resultado=$mysqli->query($query);*/
      ?>

        
        <h3>AJOUT D'UN FONCTIONNAIRE OU ENSEIGANT</h3>
        <form action="" method="post">
        <input type="text" name="nom_utilisateur" id="nom" placeholder="Nom" required>
        <input type="text" name="prenom_utilisateur" id="prm" placeholder="Prenom" required>
        <!-- <input type="text" name="description" id="description" placeholder="Email" required> -->
        <input type="email" name="email_utilisateur" id="email_utilisateur" placeholder="email" required>
        <input type="text" name="telephone_utilisateur" id="Numero de Telephone" placeholder="Numero de Telephone" required>
        <input type="text" name="ppr" id="ppr" placeholder="PPR" required>
        <input type="password" name="password_utilis" id="password_utilis" placeholder="mot de passe" required>

        <select name="description" id="cbx_estado">
				<option value="0">Description</option>
				<option value="Enseigant">Enseigant</option>
				<option value="Fonctionnaire">Fonctionnaire</option>
				
            </select>
        <input type="submit" name="submitutilisateur" value="Enregistrer">
</form>
        <form action="menuadmin.php" method="post">
        <input type="submit" name="Annuler" id="anl" value="Annuler">
        </form>
        </div>
	</body>
	</html>
