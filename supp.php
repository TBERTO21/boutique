<?php

session_start();
if (isset($_SESSION['login'])) 
{
     $login=$_SESSION['login'];
     $connexion = mysqli_connect("localhost", "root", "", "boutique");
     $u = "SELECT * FROM utilisateurs WHERE login='$login'";
     $ti = mysqli_query($connexion,$u);		
     $li = mysqli_fetch_array($ti);
     $utilisateur = $li["id"];
     $reference = $_GET['id'];
     $delet="DELETE FROM panier WHERE id_utilisateurs='$utilisateur'AND reference='$reference'";
     $quer= mysqli_query($connexion,$delet);
     header("Location:vpanier.php") ;
}

else 
        {
            header('Location: index.php');

          
        }