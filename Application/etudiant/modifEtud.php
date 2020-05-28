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
        <a href="homeEtud.php" id="recherche"><i class="fas fa-home"></i>Accueil</a>
        <a href="profileEtud.php"><i class="fas fa-search"></i>Rechercher</a>
        <a href="profileEtud.php"><i class="fas fa-user-cog"></i>Profile</a>
        <a href="../logout.php"><i class="fas fa-sign-out-alt"></i>Déconnexion</a>
      </div>
    </nav>
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

        <h3>Modifier votre compte</h3>
        <form action="" method="post">
        <select name="id_etudiant" id="cbx_estado"><br>
        <option value="0">Votre ID </option><br>
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
  </body>
</html>