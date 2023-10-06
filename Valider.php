<html>
	<head>
		<meta charset="utf-8">
		<title>commande</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
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
                <section>      
                    <form method="post">
                        <fieldset>
                            <legend>carte bancaire </legend>
                                <label> type</label>
                                    <ol>
                                        <li>
                                            <input id=visa name=type_de_carte type=radio>
                                <label for=visa>VISA</label>
                                        </li>
                                        <li>
                                            <input id=amex name=type_de_carte type=radio>
                                <label for=amex>AmEx</label>
                                        </li>
                                        <li>
                                            <input id=mastercard name=type_de_carte type=radio>
                                <label for=mastercard>Mastercard</label>
                                        </li>
                                    </ol>                        
                                <label>nom du titulaire de la carte:
				         	                <input required type="text" name="nomc" placeholder='nom'/>
				                </label> 
				               <label>numero de carte : 
                                            <input required type="text" minlength='16' maxlength='16' name="numero" placeholder='numero'/>
                                </label>
                                <label> cryptogramme:
                                            <input required type="text" minlength='3' maxlength='3' name="crypto" placeholder='crypto'/>
                                </label>
                                <label> date d'expiration:
                                            <input required type="date" name="expi" placeholder='prenom'/>
                                </label>                            
                        
                        </fieldset>         
                                            <input type="submit" value="valide" name="valide "/>
                             
			        </form>
        
                </section>
            </main>
        <footer>
	

		</footer>
       
    </body>
</html>