<?php
session_start();
    include("sqlConnexion.php");
    if(isset($_POST['submit']))
    {
        $email = $_POST['email'];
        $passwd = $_POST['password'];
        $resultat_etud = mysqli_fetch_row(mysqli_query($con, "SELECT * FROM etudiant WHERE email_etudiant='$email' AND passwordetud='$passwd'"));
        if(!$resultat_etud)
        {
            $resultat_ens = mysqli_fetch_row(mysqli_query($con, "SELECT * FROM utilisateur WHERE email_utilisateur='$email' AND password_utilis='$passwd'"));
            if(!$resultat_ens)
            {
                $resultat_admin = mysqli_fetch_row(mysqli_query($con, "SELECT * FROM admin WHERE login='$email' AND password='$passwd'"));
                if(!$resultat_admin)
                {
                    
                    echo "<script> alert('l\'email ou le mot de passe est incorrecte !') </script>";
                }
                else
                {
                    session_start();
                    session_regenerate_id();
                    $_SESSION['loggedin'] = TRUE;
                    $_SESSION['nom'] = $resultat_admin[1];
                    $_SESSION['prenom'] = $resultat_admin[2];
                    $_SESSION['email'] = $resultat_admin[3];
                    $_SESSION['password'] = $resultat_admin[4];
                    header('Location: admin/homeAdmin.php');
                }
  
            }
            else
            {
              session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
         $_SESSION['id'] = $resultat_ens[0];
        $_SESSION['nom'] = $resultat_ens[1];
        $_SESSION['prenom'] = $resultat_ens[2];
        $_SESSION['Description'] = $resultat_ens[3];
        $_SESSION['Email'] = $resultat_ens[4];
        $_SESSION['telephone'] = $resultat_ens[5];
        $_SESSION['PPR'] = $resultat_ens[6];
        header('Location: Enseignant et fonctionnaire/homeEnseiFonc.php');
            }
        }
        else
        {
        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['id'] = $resultat_etud[0];
        $_SESSION['nom'] = $resultat_etud[2];
        $_SESSION['prenom'] = $resultat_etud[3];
        $_SESSION['cne'] = $resultat_etud[4];
        $_SESSION['email'] = $resultat_etud[5];
        $_SESSION['telephone'] = $resultat_etud[7];
        $_SESSION['id_etudiant'] = $id_etudiant;
        header('Location: etudiant/homeEtud.php');
        }
    }
?>