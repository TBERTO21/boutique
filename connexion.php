<html>

	<head>
		<meta charset="utf-8">
		<title>connexion</title>

        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/style.css">
	</head>
<header>
<ul>
<?php include('header.php');
	if(isset($_SESSION['login']))
		{
				header('Location: index.php');
        }  ?>
</ul>
 </nav>
</header>
<body class="body3">
<main>
	
	<?php
		
	
		?>
            <section> 
                <article class="box">
                    <form class="forme" method="post">
                        <h1>Connexion</h1>
                        <fieldset>
                             <legend>Connecte Toi </legend>
                             <label for="pseudo">Pseudo :</label>
                             <input type="text" name="login"  placeholder="login"required/>
                             <label for="password">Mot de Passe :</label>
                             <input type="password" name="pass"  placeholder="mot de passe"required/>
						     <input type="submit" value="Connexion" name="Connexion"required/>
					    </fieldset>

			        </form>

			    </article>
            </section>	
            
            <section>
                <?php
                if(isset($_POST["Connexion"]))
                {
                    $login=$_POST["login"];
                    $password=($_POST["pass"]);
                    $password = sha1($password);
                    $connexion = mysqli_connect("localhost", "root", "", "boutique");
                    $requete = "SELECT * FROM utilisateurs WHERE login='$login'";
                    $query=mysqli_query($connexion,$requete); 
                    if ($query && mysqli_num_rows($query) > 0) 
                {
                    $resultat = mysqli_fetch_array($query);
                    if ($login == $resultat["login"] && $password == $resultat["password"])
                    {
                        $_SESSION["id"]=$resultat["id"];
                        $_SESSION['login']=$resultat["login"];
                        mysqli_close($connexion);
                        header('Location: index.php');
                    }
                    else {
                        echo '<p class="bug">*Login ou Mot de passe incorrect</p>';
                    }
                } else {
                    echo '<p class="bug">*Login ou Mot de passe incorrect</p>';
                }
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