<html>
	<head>
		<meta charset="utf-8">
		<title>commande</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/style.css">
	</head>
    <body>
        <header> 
            <nav>
                <ul>
                    <?php include('header.php');
                        
                        $panier1= "SELECT * FROM panier ";
                        $panie2= mysqli_query($connexion,$panier1);
                        $pani1 = mysqli_fetch_array($panie2);
        if (isset($pani1['reference']))
		{
            $connexion = mysqli_connect("localhost", "root", "", "boutique");
            $login=$_SESSION['login'];
            $u = "SELECT * FROM utilisateurs WHERE login='$login'";
            $ti = mysqli_query($connexion,$u);		
            $li = mysqli_fetch_array($ti);
            $utilisateur = $li["id"]; 
            $carte= "SELECT * FROM carte WHERE id_utilisateur='$utilisateur'";
            $cart= mysqli_query($connexion,$carte);
            $car = mysqli_fetch_array($cart);
       

            $car1 = mysqli_num_rows($cart); 
            if(isset($_POST["valide"]))
					{
						$login=$_SESSION['login'];
                        $connexion = mysqli_connect("localhost", "root", "", "boutique");
                        
						$sql = "SELECT * FROM utilisateurs WHERE login='$login'";
						$req = mysqli_query($connexion, $sql);
                        $req2 = mysqli_num_rows($req);
                        
                        $nom=$_POST["nom"];
                        $prenom=$_POST["prenom"];
                        $tel = $_POST["tel"];
                        $adresse = $_POST["adresse"];
                        $ville = $_POST["ville"];
                        $codepo = $_POST["codepo"];
                        $requete = "UPDATE  utilisateurs SET nom='$nom', prenom='$prenom', telephone='$tel', adresse='$adresse',
                        ville='$ville', codepo='$codepo' WHERE LOGIN ='".$_SESSION['login']."'";

                        $nomc=$_POST["nomc"];
                        $numero=$_POST["numero"];
                        $crypto = $_POST["crypto"];
                        $expi=$_POST["expi"];
                        $type=$_POST["type"];

                        if($car['numero']==$numero)
                        {  
                        }
                        else
                        {
                            $cb ="INSERT INTO carte(type, nom, numero,expiration, Cryptogramme,id_utilisateur) values
                            ('$type','$nomc','$numero','$expi','$crypto','$utilisateur')";
                            $cb2 = mysqli_query($connexion, $cb);
                            $query = mysqli_query($connexion, $requete);                 

                        }                    
                       
                        $BO= "SELECT * FROM carte WHERE id_utilisateur='$utilisateur'";
                        $BOL= mysqli_query($connexion,$BO);
                        $BOLO = mysqli_fetch_array($BOL);
                                                $idc=$BOLO["id"];
            

                        $panier= "SELECT * FROM panier WHERE id_utilisateurs='$utilisateur'";
                        $panie= mysqli_query($connexion,$panier);
                        $pani = mysqli_fetch_array($panie);

                        $allez = "INSERT INTO vpanier (reference,nom,quantite,id_utilisateurs,id_panier,prix)
                         SELECT reference,nom,quantite,id_utilisateurs,id,prix FROM panier";
                        $query = mysqli_query($connexion, $allez);
                        
                        $sum = "SELECT SUM(prix*quantite) as prixtt FROM panier where id_utilisateurs='$utilisateur'";
                        $mun = mysqli_query($connexion,$sum);
                        $summun = mysqli_fetch_array($mun);

                        $quan= "SELECT sum(quantite) as quant FROM panier WHERE id_utilisateurs='$utilisateur'";
                        $tit= mysqli_query($connexion,$quan);
                        $ite = mysqli_fetch_array($tit);

                        $idpa=$pani['id'];
                        $nom=$pani['nom'];
                        $prix=$summun["prixtt"];
                        $quantite=$pani['quantite'];
                        $quanti=$ite["quant"];
                        $co="INSERT INTO commande(id_panier,id_utilisateur,prix,quantite,id_cb,date)
                        values('$idpa','$utilisateur','$prix','$quanti','$idc',CURRENT_TIMESTAMP())";
                        $query = mysqli_query($connexion, $co);
                        
                        $delete = "DELETE FROM panier where id_utilisateurs='$utilisateur'";
                        $quer= mysqli_query($connexion,$delete); 
                        header('Location: paiement.php?id='.$idpa.'');
                        }

                        ?>
                </ul>
            </nav>
        </header>

        <main> 
            <section>
                 <h2 class="vld"> Validation du panier</h2>
        <?php
		
            

            ?>
            <form  class='forme' method="post">
                <fieldset>
                    <legend> Infos personelles</legend>
                        <label>nom:
				         	<input required type="text" value="<?php if(!empty($li['nom'])){echo $li['nom'];}?>" name="nom" placeholder='nom'/>
				        </label> 
				        <label>prenom: 
					        <input required type="text" value="<?php if(!empty($li['prenom'])){echo $li['prenom'];}?>" name="prenom" placeholder='prenom'/>
                        </label> 
                        <label>telephone: 
                            <input required type="text" value="<?php if(!empty($li['tel'])){echo $li['tel'];}?>" name="tel" placeholder='telephone'/>
			  	        </label> 
                        <label>adresse: 
                            <input required type="text" value='<?php if(!empty($li['adresse'])){echo$li['adresse'];}?>' name="adresse" placeholder='adresse livraison'/>
                        </label>
                        <label>ville: 
                            <input required type="text" value="<?php if(!empty($li['ville'])){echo $li['ville'];}?>" name="ville" placeholder='ville'/>
                        </label>
                        <label>code postal: 
                            <input required type="text" value="<?php if(!empty($li['codepo'])){echo $li['codepo'];} ?>" name="codepo" placeholder='code postal'/>
                        </label>
                </fieldset>
                <fieldset>
                    <legend>carte bancaire </legend>
                        <label> type</label>
                            <ol>
                                <li>
                                    <input  id=visa name=type value="visa" type=radio>
                                        <label for=visa>VISA</label>
                                </li>
                                <li>
                                    <input id=amex name=type value="amex" type=radio>
                                        <label for=amex>AmEx</label>
                                </li>
                                <li>
                                    <input id=mastercard value="mastercard" name=type type=radio>
                                        <label for=mastercard>Mastercard</label>
                                </li>
                            </ol>                        
                        <label>nom du titulaire de la carte:
				         	<input required type="text"  value="<?php if(!empty($car['nom'])){echo $car['nom'];}?>" name="nomc" placeholder='nom'/>
				        </label> 
				        <label>numero de carte : 
                            <input required type="text"  value="<?php if(!empty($car['numero'])){echo $car['numero'];}?>"
                            minlength='16' maxlength='16' name="numero" placeholder='numero'/>
                        </label>
                        <label> date d'expiration:
                            <input required type="date"  value="<?php if(!empty($car['expiration'])){echo $car['expiration'];}?>" name="expi" placeholder='prenom'/>
                        </label>      
                        <label> cryptogramme:
                            <input required type="text" minlength='3' maxlength='3' name="crypto" placeholder='crypto'/>
                        </label>
                                              
                        
                </fieldset>         
                        <input type="submit" value="valider" name="valide"/>
                             
			</form>
                <?php 
             
       
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