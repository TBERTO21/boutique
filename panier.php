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
     $noms= "SELECT * FROM produits WHERE reference='$reference'";
     $query = mysqli_query($connexion,$noms);		
     $array = mysqli_fetch_array($query);
     $nom = $array['nom'];
     $prix = $array['prix'];
     
     $panier= "SELECT * FROM panier WHERE id_utilisateurs='$utilisateur'AND reference='$reference'";
     $panie= mysqli_query($connexion,$panier);
     $pani = mysqli_fetch_array($panie);
$refe=$pani['reference'];
$quantite=$pani['quantite'];
     if(isset($refe))
     {
          $pa="UPDATE panier SET quantite = '$quantite' + 1 where id_utilisateurs='$utilisateur' AND reference='$reference'";
          $query = mysqli_query($connexion, $pa);

     }
     else
     {
          $allez = "INSERT INTO panier(reference,nom,id_utilisateurs,prix) values ('$reference','$nom','$utilisateur','$prix')";
          $query = mysqli_query($connexion, $allez);
     }
     header("Location: produit.php?id=$reference");

}
else
{
     header("Location: index.php");

}    
?>
						
				  
                 
