<?php
if(isset($_POST["inscription"])){
 if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['ppr']) && !empty($_POST['telephone']) && !empty($_POST['email']) && !empty($_POST['description']) && !empty($_POST['password'])){
  //$ID_Etudiant = $_POST['ID_Etudiant'];
 $nom_utilisateur = $_POST['nom'];
 $prenom_utilisateur = $_POST['prenom'];
 $ppr_utilisateur = $_POST['ppr'];
 $telephone_utilisateur = $_POST['telephone'];
 $email_utilisateur = $_POST['email'];
 $description = $_POST['description'];
 $password_utilis = $_POST['password'];
 
 $conn = new mysqli('localhost', 'root', '') or die (mysqli_error()); 
 $db = mysqli_select_db($conn, 'annuaireesto') or die("DB Error"); 

 $query = mysqli_query($conn, "SELECT * FROM utilisateur WHERE nom_utilisateur='".$nom_utilisateur."'");
 $numrows = mysqli_num_rows($query);
 if($numrows == 0)
 {
 
 $sql = "INSERT INTO utilisateur(Nom_utilisateur,Prenom_utilisateur,description,email_utilisateur,telephone_utilisateur,ppr,password_utilis) VALUES('$nom_utilisateur','$prenom_utilisateur','$description','$email_utilisateur','$telephone_utilisateur','$ppr_utilisateur','$password_utilis')";
 $result = mysqli_query($conn, $sql);
 
 if($result){
  ?>
  <!--Javascript Alert -->
  <script>alert('Votre demande a bien été envoyé ');</script>
  <?php
 }
 else
 {
  ?>
  <!--Javascript Alert -->
  <script>alert('erreur lors de la création de cet utilisateur');</script>
  <?php
 }
 }
 else
 {
  ?>
  <!--Javascript Alert -->
  <script>alert('cet utilisateur existe! veuillez réessayer.');</script>
  <?php
 }
 }
 else
 {
 ?>
 <!--Javascript Alert -->
 <script>alert('Vous devez remplir tous les champs');</script>
 <?php
 }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Inscrivez-vous</title>
    <meta charset="utf-8">
</head>
<body>
  <meta s>
    <link href="../style/Inscription.css" rel="stylesheet" type="text/css" media="all">
     <form action="" method="post">
<div class="wrapper fadeInDown">
  <div id="formContent">
   
   
    <h2 class="inactive underlineHover">
    <a class="underlineHover" href="../index.html" title="Connectez-vous si vous avez un compte">Connexion </a> 
   </h2>
 <h2 class="active">
     Inscription 
    </h2>
    <div class="fadeIn first">
      <img src="../images/logo.png" id="icon" alt="User Icon"  />
    </div>

    <form>
     


</head>
<body>

  <div class="header-w3l">
    <h1>Inscrivez-vous !</h1>
  </div>

<div class="main-agileits">
  <h2 class="sub-head">Informations personelles</h2>
    <div class="sub-main">  
      <form action="" method="post">

        Vous êtes :<input type="radio" id="enseiFonct" name="description" value="enseiFonct" checked="">
        <label for="Enseigant">Enseigant ou fonctionnaire</label >
        <input type="radio" id="Etudiant" name="description" value="Etudiant" onclick = "document.location.href='../etudiant/InscripEtud.php'">
        <label for="Etudiant">Etudiant</label><br>

        <input placeholder="Veuillez taper votre nom" name="nom" class="nom" type="text" required=""> 
        <input placeholder="Veuillez taper votre prenom" name="prenom" class="name2" type="text" required="">
         <input placeholder="Veuillez taper votre PPR" name="ppr" class="name2" type="text" required="" title="Code national de l'etudiant">
        <input placeholder="Veuillez taper votre numero de telephone" name="telephone" class="telephone" type="text" required="">
        <input placeholder="E-mail" name="email" class="mail" type="email" required="">
        <select name="description" size="1">
          <option value="">--Description--</option>
          <option>Fonctionnaire</option>
          <option>Enseignant</option>
        </select>
        <input  placeholder="Taper un mot de passe" name="password" class="pass" type="password" required="">
        <input type="submit" value="S'inscrire" title="Confirmer l'inscription" name="inscription">
      </form>
    </div>
    <div class="clear"></div>
</div>
<div class="footer-w3">
  <p>&copy; 2020 Annuaire ESTO . All rights reserved | Design by<br>Ajli Zakaria</a></p>
</div>
    </form>


  </div>
</div>
</form>
</body>
</html>
