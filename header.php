<?php

session_start();
$connexion = mysqli_connect("localhost", "root", "", "boutique");
mysqli_set_charset ($connexion,'utf8');

if (isset($_SESSION['login'])):
$login=$_SESSION['login'];
$uti = "SELECT * FROM utilisateurs WHERE login = '$login'";  
$li = mysqli_query($connexion,$uti);
$sa= mysqli_fetch_array($li);
$idut=$sa['id'];
?>
 <div class="header-area">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="menu-wrapper">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="index.php"><img src="assets/img/logo/logo.png" alt=""></a>
                        </div>
                        <!-- Main-menu -->
                        <div class="main-menu d-none d-lg-block">
                            <nav>                                                
                                <ul id="navigation">  
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="produit.php">shop</a></li>
                                    <?php
                                    if($sa['grade'] == 21 OR $sa['grade']== 28)
                                    {
                                        echo '<li><a href="admin.php">Admin</a></li>';
                                    }
                                    ?>                               
                                    <li><a href="#">categories</a>
                                        <ul class="submenu">
                                      <?php
                                      $sql2 = "SELECT * FROM categories";
                                      $req2 = mysqli_query($connexion,$sql2);
                                      while ($dataa = mysqli_fetch_array($req2))
                                        {
                                            echo'<li><a href="produit.php?ctg=' , $dataa['id'] , '">'.$dataa['nom'].'</a></li>';
                                        }
                                        ?>      
                                        </ul>
                                    </li>                                    
                                    <li><a href="compte.php">Mon compte</a></li><li>
                                        <form action="index.php" method="post">
                                            <input type="submit" name='deconnexion' class="deco" value="deconnexion">
                                        </form>
                                    <?php if (isset($_POST['deconnexion']))
                                    {
                                        session_unset();
                                        session_destroy();
                                        header('Location:index.php');

                                        $delete = "DELETE FROM panier where id_utilisateurs='$idut'";
                                        $quer= mysqli_query($connexion,$delete);
                                        
                                    }
                                    ?>
                                    </li>

                                </ul>
                            </nav>
                        </div>
                        <!-- Header Right -->
                        <div class="header-right">
                            <ul>
                                <li>
                                    <div class="nav-search search-switch">
                                    <a href="produit.php"><span class="flaticon-search"></span></a>
                                    </div>
                                </li>
                                <li> <a href="profil.php"><span class="flaticon-user"></span></a></li>

                                <li><a href="vpanier.php"><span class="flaticon-shopping-cart">
                                <?php
       $quan= "SELECT sum(quantite) as quant FROM panier WHERE id_utilisateurs='$idut'";
       $tit= mysqli_query($connexion,$quan);
       $ite = mysqli_fetch_array($tit);
     echo  $ite['quant'];
 ?>
                                </span></a> </li>
                            </ul>
                        </div>
                    </div>
                    <!- - Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>



 <?php else:?>     
 <div class="header-area">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="menu-wrapper">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="index.php"><img src="assets/img/logo/logo.png" alt=""></a>
                        </div>
                        <!-- Main-menu -->
                        <div class="main-menu d-none d-lg-block">
                            <nav>                                                
                                <ul id="navigation">  
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="connexion.php">Connexion</a></li>
                                    <li><a href="Inscription.php">Inscription</a></li>
                                    <li><a href="produit.php">shop</a></li>
                                    <li><a href="#">categories</a>
                                        <ul class="submenu">
                                      <?php
                                      $sql2 = "SELECT * FROM categories";
                                      $req2 = mysqli_query($connexion,$sql2);
                                      while ($dataa = mysqli_fetch_array($req2))
                                        {
                                            echo'<li><a href="produit.php?ctg=' , $dataa['id'] , '">'.$dataa['nom'].'</a></li>';
                                        }
                                        ?>      
                                        </ul>
                                        </ul>
                            </nav>
                        </div>
                        <!-- Header Right -->
                        <div class="header-right">
                            <ul>
                                <li>
                                    <div class="nav-search search-switch">
                                        <a href="produit.php"><span class="flaticon-search"></span></a>
                                    </div>
                                </li>
                                <li> <a href="profil.php"><span class="flaticon-user"></span></a></li>

                                <li><a href="vpanier.php"><span class="flaticon-shopping-cart">
 
                                </span></a> </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>





 
<?php endif;?>     