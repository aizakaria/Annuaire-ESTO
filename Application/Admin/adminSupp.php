<?php
require('../sqlConnexion.php');
if(isset($_POST["submit"])){
  if(!empty($_POST['CNE_Etudiant'])){
   
  $CNE_Etudiant = $_POST['CNE_Etudiant'];
  //Selecting Database
  $query = mysqli_query($con, "SELECT *FROM Etudiant WHERE CNE_Etudiant='".$CNE_Etudiant."'");
  $numrows = mysqli_num_rows($query);
  if($numrows)
  {
  //Insert to Mysqli Query
  $sql = "DELETE FROM Etudiant WHERE CNE_Etudiant='".$CNE_Etudiant."'";
   $result = mysqli_query($con, $sql);
  
  //Result Message
  if($result){
   ?>
   <!--Javascript Alert -->
   <script>alert('Suppression de l etudiant avec succes');</script>
   <?php
  }
  else
  {
   ?>
   <!--Javascript Alert -->
   <script>alert('erreur de suppression!');</script>
   <?php
  }
  }
  else
  {
   ?>
   <!--Javascript Alert -->
   <script>alert('Ces donnees d etudiant n existent plus! Veuillez ressayer');</script>
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
require('../sqlconnexion.php');
if(isset($_POST["submit"])){
  if(!empty($_POST['ppr'])){
   
  $ppr = $_POST['ppr'];
  //Selecting Database
  $query = mysqli_query($con, "SELECT *FROM Utilisateur WHERE ppr='".$ppr."'");
  $numrows = mysqli_num_rows($query);
  if($numrows)
  {
  //Insert to Mysqli Query
  $sql = "DELETE FROM Utilisateur WHERE ppr='".$ppr."'";
   $result = mysqli_query($con, $sql);
  
  //Result Message
  if($result){
   ?>
   <!--Javascript Alert -->
   <script>alert('Suppression du fonctionnaire avec succes');</script>
   <?php
  }
  else
  {
   ?>
   <!--Javascript Alert -->
   <script>alert('erreur de suppression!');</script>
   <?php
  }
  }
  else
  {
   ?>
   <!--Javascript Alert -->
   <script>alert('Ces donnees de fonctionnaires n existent plus! Veuillez ressayer');</script>
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
	        <div id="suppression">

        <?php
$mysqli = new mysqli("localhost","root","","annuaireesto"); 
  
if(mysqli_connect_errno()){
  echo 'Conexion Failed : ', mysqli_connect_error();
  exit();
}

$query = "SELECT ID_Etudiant, CNE_Etudiant FROM Etudiant ORDER BY CNE_Etudiant";
  $resultado=$mysqli->query($query);
      ?>

        
        <h2>SUPPRESSION D'ETUDIANT</h1>
        <h3>Choisir le CNE de l'etudiant</h2>
        <form action="" method="post">
        <select name="CNE_Etudiant" id="cbx_estado">
        <option value="0">Selection du CNE</option>
        <?php while($row = $resultado->fetch_assoc()) { ?>
          <option value="<?php echo $row['CNE_Etudiant']; ?>"><?php echo $row['CNE_Etudiant']; ?></option>
        <?php } ?>
            </select><br>
        <input type="submit" name="submit" value="Enregistrer">
        <form action="adminConsultation.php" method="post">
        <input type="submit" name="Annuler" id="anl" value="Annuler">
        </form>
        </div>



<!-----------------------------------------------------------------------------------------------------------MODIF PROF OU FONCTIONNAIRE ---------------------------------------------------->
        <?php
$mysqli = new mysqli("localhost","root","","annuaireesto"); 
  
if(mysqli_connect_errno()){
  echo 'Conexion Failed : ', mysqli_connect_error();
  exit();
}

$query = "SELECT ID_Utilisateur, ppr FROM Utilisateur";
  $resultado=$mysqli->query($query);
      ?>

        
        <h2>SUPPRESSION D'UN FONCTIONNAIRE</h2>
        <h3>Choisir le PPR a supprimer</h3>
        <form action="" method="post">
        <select name="ppr" id="cbx_estado">
        <option value="0">Selection du PPR</option>
        <?php while($row = $resultado->fetch_assoc()) { ?>
          <option value="<?php echo $row['ppr']; ?>"><?php echo $row['ppr']; ?></option>
        <?php } ?>
            </select><br>
        <input type="submit" name="submit" value="Enregistrer">

        <form action="adminConsultation.php" method="post">
        <input type="submit" name="Annuler" id="anl" value="Annuler">
        </form>
        </div>
        
	</body>
</html>