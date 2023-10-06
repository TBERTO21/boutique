<html>
	<head>
		<meta charset="utf-8">
		<title>Recapitulatif</title>

        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/style.css">
	</head>
    <body>
        <header> 
            <nav>
                <ul>
                    <?php 
                     if (isset($_GET["id"]))
                     {
                    include('header.php');
                    $idpa= $_GET['id'];
                    $commande="SELECT * from commande where id_panier='$idpa'";
                    $co = mysqli_query($connexion,$commande);
                    $mande= mysqli_fetch_array($co);
                    $date=$mande["date"];
                    $ref=$mande["id"];

                     
                 $u = "SELECT * FROM utilisateurs WHERE login='$login'";
                 $ti = mysqli_query($connexion,$u);		
                 $li = mysqli_fetch_array($ti); 
                 $nom = $li["login"];

                    }
                    else{
                        header('Location: index.php');
                    }

                ?>
                </ul>
            </nav>
        </header>

            <main> 
                 <?php 

                   echo '<section><article class="val"> Felicitation '.$nom.'  pour votre commande du :';
                   echo'<p class="poo"> '.$date.' </p>';
                   echo'<p><a href="compte.php">Recapitulatif de la commande </a></p>';
                   echo '<p>Le numero de votre commande est le '.$ref.'</p></article>'; ?>  
                   <article><p>Vous devriez donc recevoir votre commande dans les jours qui viennent </p>
                   <p>Vous pouvez suivre l'évolution de cet envoi depuis le détail de votre commande <a href=#>ICI</a></p>
                   <p> Dès que vous aurez reçu votre commande, n'oubliez pas de confirmer sa
                   réception et d'évaluer le vendeur en cliquant sur le lien suivant :<a href=#>mp.timezone.php/compte/commande</a>
                   Cette action est importante car c'est uniquement à ce moment que le vendeur sera payé pour votre commande.</p>
                <p>Nous profitons de ce contact pour vous rappeler quelques principes de
sécurité afin de vous prémunir d’éventuels risques de phishing, pratique
très répandue sur internet de nos jours :
    <p>- Ne jamais entrer vos identifiants sur une page sur laquelle vous auriez
été redirigé depuis un email, même si celle-ci semble tout à fait normale.
Nous vous conseillons de toujours vous rendre vous-même sur la page principale
du site www.fnac.com pour toute identification.</P>
    <P>- Ne jamais communiquer directement vos identifiants ou toute autre
information personnelle par réponse à un email. Fnac ne vous les demandera
jamais.</p>
    <p>- Toujours rester très vigilant aux pièces jointes des emails, en
particulier si celles-ci possèdent des champs actifs (type : bouton, case à
remplir, etc.)</p>

            <p> Merci de votre confiance et à très bientôt sur Fnac.com !</p>
                                                                                                              

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