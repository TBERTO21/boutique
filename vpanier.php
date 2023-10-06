<html>

	<head>
		<meta charset="utf-8">
		<title>panier</title>

        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/style.css">
	</head>
	

    <body>
        <header> 
            <nav>
                <ul>
                    <?php include('header.php') ?>
                </ul>
            </nav>
        </header>

        <main> 

            <section class="xpanier">
        <?php
		if (isset($_SESSION['login']))
		{

				 $login=$_SESSION["login"];
		
				 
				$connexion = mysqli_connect("localhost", "root", "", "boutique");
                mysqli_set_charset ($connexion,'utf8');
              
                 $u = "SELECT * FROM utilisateurs WHERE login='$login'";
                 $ti = mysqli_query($connexion,$u);		
                 $li = mysqli_fetch_array($ti); 
                 $utilisateur = $li["id"];

                $sum = "SELECT SUM(prix*quantite) as prixtt FROM panier where id_utilisateurs='$utilisateur'";
                $mun = mysqli_query($connexion,$sum);		
                 $uti = "SELECT * FROM panier ORDER BY reference DESC ";

                $uti2 = mysqli_query($connexion,$uti);
                while ($summun = mysqli_fetch_array($mun))
                {
				while ($data = mysqli_fetch_array($uti2))
                           {   
                               $Total=$data['prix']*$data['quantite'];
                               echo'<article class="ypanier"><a href="produit.php?id=' , $data['reference'] , '">';
                               echo'<h2>'.$data["nom"].'</h2></a>';
                               echo '<p>Quantite:'.$data["quantite"].'</p>'; 
                               echo '<p>Total:'.$Total.' €</p>'; 
                               echo'<a href="supp.php?id='.$data['reference'].'"> Supprimer </a></article>';
                             

                           }
                           echo'<article class="total">';
                           echo'<h2>Prix total</h2>';
                           echo'<h2>'.$summun["prixtt"].'€</h2></article>';

                }
        }
        else 
        {
            header('Location: connexion.php');

          
        }
?>
            </section>
            <section  class="valider">
              <a href="commande.php"> Valider panier </a>
            </section>


</main> 

<footer>
    <div class="footer">
		<div id="mentions">
			<div>
				<a href="mentions.html">Mentions légales</a>
				<a href="contact.php">Contactez-nous</a>
			</div>
				<p>© 2020 Tous droits réservés T&I COMPANY</p>
		</div>
	</div>
	
</footer>

</body>
</html>