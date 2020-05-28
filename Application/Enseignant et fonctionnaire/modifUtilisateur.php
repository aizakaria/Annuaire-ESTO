<?php
if(isset($_POST['validermodificationetudiant']))
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
        <a href="profilEnseifonc.php"><i class="fas fa-user-cog"></i>Profile</a>
        <a href="../logout.php"><i class="fas fa-sign-out-alt"></i>Déconnexion</a>
      </div>
    </nav>
            <?php
$mysqli = new mysqli("localhost","root","","annuaireesto"); 
  
if(mysqli_connect_errno()){
  echo 'Conexion Failed : ', mysqli_connect_error();
  exit();
}
$query = "SELECT id_utilisateur, ppr FROM utilisateur ORDER BY ppr";
  $resultado=$mysqli->query($query);

      ?>

        <h3>Modifier votre compte</h3>
        <form action="" method="post">
        <select name="id_utilisateur" id="cbx_estado"><br>
        <option value="0">Votre ID </option><br>
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
        

        <input type="submit" name="validermodificationetudiant" id="validermodificationetudiant" value="Valider">
                <form action="adminmodification.php" method="post">
        <input type="submit" name="annulermodificationetudiant" id="annulermodificationetudiant" value="Annuler">
</form>
  </body>
</html>