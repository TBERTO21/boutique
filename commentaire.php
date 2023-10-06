<?php	
                if(isset($_SESSION['login']))
                {
                    $id=$_GET['id'];

                    if(isset($_POST['submit']))
					{
					    $auteur = $_SESSION['id'];
             			$message = $_POST['message'];
						$sujets= $_POST['sujets'];
						$connexion = mysqli_connect("localhost", "root", "", "boutique");
						$sql = "INSERT INTO `commentaires` (id, commentaires, id_utilisateur, reference,date )
						VALUES (NULL,'$message','$auteur','$sujets', CURRENT_TIMESTAMP())";
                        $query = mysqli_query($connexion, $sql);

                    }   
                        $limite = 5;
                        if (isset($_GET["page"]))
                        {
                            $page  = $_GET["page"];
                        }
                         else
                        { 
                            $page=1;
                        }	
                      
                        $debut = ($page-1) * $limite;
                        $connexion = mysqli_connect("localhost", "root", "", "boutique");
                        $sql2 = "SELECT commentaires.id, commentaires.commentaires, commentaires.id_utilisateur,commentaires.reference,
						commentaires.date, utilisateurs.login FROM commentaires INNER JOIN utilisateurs 
						WHERE  commentaires.id_utilisateur = utilisateurs.id 
                        AND reference='$id'  ORDER BY date DESC LIMIT $debut, $limite";
                        $req2 = mysqli_query($connexion,$sql2);

                        $pg = "SELECT COUNT(id) FROM  commentaires where reference='$id'";
                        $pg2 = mysqli_query($connexion, $pg);
					    $row = mysqli_fetch_row($pg2);
					    $total = $row[0];
					    $total_pages = ceil($total / $limite);
                        

        
						while ($data = mysqli_fetch_array($req2))
						{
                            ?><section class="container">
                            <p class="id"><?php echo $data['login'];?></p>
                            <p class="texte"><?php echo $data['commentaires'];?></p>
                            <span class="time"><?php echo $data['date'];?></span> 
                            </section>
                        
                            <?php	
                        }
                        
                        for ($i=1; $i<=$total_pages; $i++)
                        {

                        echo"<section class='page'><a href='produit.php?page=".$i."&amp;id=".$_GET["id"]."'>".$i."</a></section>"; 
                        }

                      
                            ?>

                   
					<section class="titre">
						<form  method="post">
							<legend class='rep'>Poster un message</legend>



					<textarea name="message"  maxlength="300" placeholder="Poster un message"></textarea>
					<input type="hidden" name="sujets" value="<?php echo $_GET['id'];?>">
					<input type="submit" name="submit" value="poster">
					
					
				
                </form></section>  
                
                    <?php
					
                    }
                        else
                        {
			            }
					?>
						
				  
                
