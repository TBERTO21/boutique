<html>
	<head>
		<meta charset="utf-8">
		<title>mon compte</title>

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
                   <h2> Récapitulatif des commandes</h2>
                  
                           
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
                   
                                   $sum = "SELECT SUM(prix*quantite) as prixtt FROM vpanier where id_utilisateurs='$utilisateur'";
                                   $mun = mysqli_query($connexion,$sum);

                                      
                                    $uti = "SELECT DISTINCT date FROM vpanier WHERE id_utilisateurs='$utilisateur' ORDER BY date desc  ";
                                    $uti2 = mysqli_query($connexion,$uti);

                                  

                                   while ($summun = mysqli_fetch_array($mun))
                                    {
                                        while ($dat = mysqli_fetch_array($uti2))
                                            {   
                                                $date=$dat['date'];  
                                                 $pano = "SELECT id_panier FROM vpanier WHERE date='$date'AND id_utilisateurs='$utilisateur' order by id_panier desc ";
                                                $panoo = mysqli_query($connexion,$pano);
                                                $data2 = mysqli_fetch_array($panoo);
                                                echo '<section><p class="date">Commande du '. $date.'</p>';
                                                $ut="SELECT * from vpanier where date='$date' AND id_utilisateurs='$utilisateur'ORDER BY date desc ";
                                                $ut2 = mysqli_query($connexion,$ut);
                                                
                                                while ( $data= mysqli_fetch_array($ut2))
                                                {
                                                    $Total=$data['prix']*$data['quantite'];
                                                    echo'<article class="ypanier"><a href="produit.php?id=' , $data['reference'] , '">';
                                                    echo'<h2>'.$data["nom"].'</h2></a>';
                                                    echo '<p>Quantite:'.$data["quantite"].'</p>'; 
                                                    echo '<p>Total:'.$Total.' €</p></article>'; 
                                                    
                                                  
                                                } 
                                                   $idpaa=$data2['id_panier'];
                                                    $co="SELECT prix from commande where id_panier='$idpaa'";
                                                    $coco = mysqli_query($connexion,$co);
                                                    $comu= mysqli_fetch_array($coco);                      
                                                    echo '<article class="pprix"> Prix total: '.$comu['prix'].'€';
                                                     echo'</article></section>';
                                 

                                                                  
                                            }                                           

                                    }
                           }
                           else 
                           {
                               header('Location: index.php');
                   
                             
                           }
                   ?>
                               
                

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