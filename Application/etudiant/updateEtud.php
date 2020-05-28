<?php
session_start();
require('../sqlConnexion.php');

?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
  
    <link href="../css/test.css" rel='stylesheet' type='text/css'>  
</head>
<body>
<div id="h"><h1>Mon Compte</h1> </div>

                <?php
                $a=$_SESSION['cne_etudiant'];
                
        $requete = "SELECT * FROM etudiant where cne_etudiant='$a' ";
		$resultat = mysqli_query($con, $requete);
        
        ?>
                <?php
        while ($ligne = $resultat->fetch_assoc()) {
?>
<form method="POST" action="modifEtud.php">
        <div class="card">
            <div class="profile">
                <!-- <img src="../icone/me.jpg"><div class="border"></div><br> -->
            </div>
            <div class="numbers">
  
                    <label>Nom :            <?php echo $ligne['nom_etudiant'] ; ?></label><br>
                    <label>Prenom :         <?php echo $ligne['prenom_etudiant'] ; ?></label><br>
                    <label>CNE :    <?php echo $ligne['cne_etudiant'] ; ?></label><br>
                    <label>email  :          <?php echo $ligne['email_etudiant'] ; ?></label><br>
                    <label>mot de passe :      <?php echo $ligne['passwordetud'] ; ?></label><br>
                    <label>telephone_etudiant :      <?php echo $ligne['telephone_etudiant'] ; ?></label><br>
                
                <?php	
    }
    ?>
           
            <div class="divider"></div>
            </div>
           <input type="submit" name="modifieretudiant" value="Modifier"> <br>
</form>
<form mehod="POST" action="menuetudiant.php">
           <input type="submit" name="Annuler" value="Annuler">

           </form>
        </div>

</body>
</html>