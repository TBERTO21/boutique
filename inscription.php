<html>

	<head>
		<meta charset="utf-8">
		<title>inscription</title>

		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/style.css">
	</head>
	<body class=body2>
		<header>
		<nav>
		<?php include('header.php');
	if(isset($_SESSION['login']))
		{
				header('Location: index.php');
        }  ?>
</ul>
 </nav>
        </header>
        

		
		<main>
			<section><form action="inscription.php" class="forme" method="post">
			<fieldset class=inscrip>
				<legend>Créez un compte</legend>
				<label for="pseudo">Pseudo :</label>
					<input type="text" name="login" maxlength="8"  required placeholder="login"/>
				<label for="email">Email :</label>
					<input type="email" name="email"  size="30"  placeholder="toto@exemple.com"/>
				<label for="password">Mot de Passe :</label>
					<input type="password" name="passe" minlength="4" required placeholder="password"/>
				<label for="password">Confirmation mot de Passe :</label>
					<input type="password" minlength="4"  name="passe2" required placeholder="confirmation"/>					
			</fieldset>

				<label><input type="checkbox" name="condition" required placeholder="condition"/> <a href="">J'accepte les conditions générales d'utilisation.</a></label>
					<input type="submit" value="inscription" name="inscription"/>
				</form>
			</section>							
			
					<?php
					
					if(isset($_POST["inscription"]))
					{
						$login=$_POST['login'];
						$connexion = mysqli_connect("localhost", "root", "", "boutique");
						$sql = "SELECT * FROM utilisateurs WHERE login='$login'";
						$req = mysqli_query($connexion, $sql);
						$req2 = mysqli_num_rows($req);

							if(($_POST['passe']!=$_POST['passe2']))
							{
								echo"<p class='bug'>Mots de passes rentrés différents</p>";
							}

							else if($req2==1)
							{   echo "<p class='bug'>*Login existant</p>";
							}
							else
							{
								$login=$_POST["login"];
								$pass=$_POST["passe"];
							
								$email = $_POST["email"];
								$pass= sha1($pass);
								$pass2=$_POST["passe2"];

								$requete = "INSERT INTO utilisateurs(login, password,email) 
								values ('$login','$pass','$email')";
								$query = mysqli_query($connexion, $requete);
						
							

	                            mysqli_close($connexion);
                             	  header('Location: connexion.php');
                            }

                    }
                ?>



            <section>
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