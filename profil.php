<html>

	<head>
		<meta charset="utf-8">
		<title>profil</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/style.css">
	</head>
	<body>
		<header class="topnav">
			<nav id="menu">
				<ul> <?php include('header.php') ;
					if(!isset($_SESSION['login']))
					{
						header('Location: connexion.php');

					}
					?></ul>				
		</header>
		<main>
			    <h1>Modification profil</h1>
            <section>
                <form class="forme" action="" method="post">
                    <fieldset>
                        <legend>Identifiants</legend>
                        <label>Login :
                            <input type="text" disabled  value="<?php echo $_SESSION['login']  ?>" name="login" maxlength="8"  required placeholder="login"/></label>
						
						<label>Mot de passe :
                            <input type="password" name="passe" minlength="4"  placeholder=" new password"/></label>
                        <label>Confirmation :
                            <input type="password" minlength="4"  name="passe2"  placeholder="confirmation"/></label>
                    </fieldset>
				     	<label>
                            <input type="checkbox" name="condition" required placeholder="condition"/> <a href="">J accepte les conditions générales d utilisation.*</a>
                        </label>
                            <input type="submit" value="modif" name="modifier"/>
                </form>
            </section>
			<?php
			$login=$_SESSION['login'];
			$connexion = mysqli_connect("localhost", "root", "", "boutique");
			$sql = "SELECT * FROM utilisateurs WHERE login = '$login'";
			$query = mysqli_query($connexion, $sql);
			$data = mysqli_fetch_array($query);

			if(!empty($_POST['modifier']))
                        {   
                            $pass= $_POST["passe"];
                            $pass= sha1($pass);
                            $pass2= $_POST["passe2"];
							$pass2= sha1($pass2);
                          
                            
                            if(($_POST['passe']!=$_POST['passe2']))
                            {
                                echo"<p class='bug'>Mots de passes rentrés différents</p>";
                            }
                            else
                            {
                                $insert="UPDATE utilisateurs SET password = '$pass' WHERE login = '".$_SESSION['login']."'";
                                $result= mysqli_query($connexion, $insert);
                                echo'<p class="bug">modifier avec succés</p>';
                            }
                        }
                        ?>
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
