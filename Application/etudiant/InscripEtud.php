<?php
if(isset($_POST["inscription"])){
 if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['cne'])  && !empty($_POST['filiere']) && !empty($_POST['email']) && !empty($_POST['telephone']) && !empty($_POST['password'])){
  //$ID_Etudiant = $_POST['ID_Etudiant'];
 $nom_filiere = $_POST['filiere'];
 $nom_etudiant = $_POST['nom'];
 $prenom_etudiant = $_POST['prenom'];
 $cne_etudiant = $_POST['cne'];
 $email_etudiant = $_POST['email'];
 $telephone_etudiant = $_POST['telephone'];
 $passwordetud = $_POST['password'];
 
include("../sqlConnexion.php");
 $query = mysqli_query($con, "SELECT * FROM etudiant WHERE nom_etudiant='".$nom_etudiant."'");
 $numrows = mysqli_num_rows($query);
 if($numrows == 0)
 {
 //Insert to Mysqli Query
 $sql = "INSERT INTO etudiant(id_filiere,Nom_Etudiant,Prenom_Etudiant,CNE_Etudiant,email_etudiant,passwordetud,telephone_etudiant) VALUES('$nom_filiere','$nom_etudiant','$prenom_etudiant','$cne_etudiant','$email_etudiant','$passwordetud','$telephone_etudiant')";
 $result = mysqli_query($con, $sql);
 //Result Message
 if($result){
  ?>
  <!--Javascript Alert -->
  <script>alert('Votre inscription sera mise en attente, veuillez attendre la confirmation ');</script>
  <?php
 }
 else
 {
  ?>
  <!--Javascript Alert -->
  <script>alert('Erreur de création!');</script>
  <?php
 }
 }
 else
 {
  ?>
  <!--Javascript Alert -->
  <script>alert('Cet etudiant existe déjà! veuillez reessayer.');</script>
  <?php
 }
 }
 else
 {
 ?>
 <!--Javascript Alert -->
 <script>alert('Vous devez remplir tous les champs !');</script>
 <?php
 }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Inscrivez-vous</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../style/Inscription.css" media="all">
</head>

<body>
    <meta s>
    
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
                <img src="../images/logo.png" id="icon" alt="User Icon" />
            </div>

            <form>
                

                <div class="header-w3l">
                    <h1>Inscrivez-vous !</h1>
                </div>

                <div class="main-agileits">
                    <h2 class="sub-head">Informations personelles</h2>
                    <div class="sub-main">
                        <form action="" method="post">
                            Vous êtes :
                            <input type="radio" id="enseignant" name="description" value="enseignant" onclick="document.location.href='../Enseignant et fonctionnaire/InscripEnsFonc.php'">
                            <label for="Enseigant">Enseigant ou fonctionnaire</label>
                            <input type="radio" id="Etudiant" name="description" value="Etudiant" checked>
                            <label for="Etudiant">Etudiant</label>
                            <br>
                            <input placeholder="Veuillez taper votre nom" name="nom" class="nom" type="text"required="">
                            <input placeholder="Veuillez taper votre prenom" name="prenom" class="name2" type="text" required="">
                            <input placeholder="Veuillez taper votre CNE" name="cne" class="name2" type="text" required="">
                               <?php
$mysqli = new mysqli("localhost","root","","annuaireesto"); 
	
if(mysqli_connect_errno()){
  echo 'Conexion Failed : ', mysqli_connect_error();
  exit();
}
$query = "SELECT nom_filiere,id_filiere FROM filiere ";

  $resultado=$mysqli->query($query);
      ?>

      <select name="filiere" id="cbx_estado">
				<option value="0">Selection Filiere</option>
				<?php while($row = $resultado->fetch_assoc()) { ?>
					<option value="<?php echo $row['id_filiere']?>"><?php echo $row['id_filiere'],$row['nom_filiere']; ?></option>
				<?php } ?>
			</select>
                            <input placeholder="Taper votre E-mail" name="email" class="mail" type="email" required="">
                            <input placeholder="Veuillez taper votre numero de telephone" name="telephone" class="telephone" type="text" required="">
                            <input placeholder="Taper un mot de passe" name="password" class="pass" type="password" required="">
                            <input type="submit" value="S'inscrire" title="confirmer votre inscription" name="inscription">
                        </form>

                    </div>
                    <div class="clear"></div>
                </div>
                <!--//main-->

                <!--footer-->
                <div class="footer-w3">
                    <p>&copy; 2020 Annuaire ESTO . All rights reserved | Design by
                        <br>Ajli Zakaria</a>
                    </p>
                </div>
            </form>

        </div>
    </div>
    </form>

    
</body>

</html>