<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BackOff</title>
    <link rel="stylesheet" href="../css/back.css" />
    <link rel="stylesheet" href="../css/normalizer.css" />
    <link rel="shortcut icon" href="img/bitmoji.png"/>
    <link rel="apple-touch-icon" href="img/bitmoji.png"/>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
    <link
        href="https://fonts.googleapis.com/css2?family=Comfortaa&family=Comic+Neue:wght@300&family=Montserrat&family=Montserrat+Alternates&family=Oswald&family=Playball&display=swap"
        rel="stylesheet"
    />
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
</head>
<body>
    
    <header>
        <div id="logo">
            <img src="../img/bitmoji.png" alt="Une tasse"/>
        </div>
        <h1> Bienvenue sur mon Back office </h1>
    </header>


    
<?php



if(!isset($_GET['ind'])) {
    $_GET['ind'] = 'projets' ; 
}
if($_GET['ind'] =='projets') {
    include 'projets.php';
}
elseif ($_GET['ind'] == 'langages') {
    include 'langages.php';
}
elseif ($_GET['ind'] == 'user') {
    include 'utilisateurs.php';
}


                    // Supression d'un projet


                    if(!empty($_GET['id_delete'])){
                        include_once dirname(__FILE__) . './../fonctions/connexion_sgbd.php';
                        $sgbd= connexion_sgbd();

                            $delete = $sgbd->prepare(" DELETE FROM projets WHERE id_projet=:id_produit");
                            $delete->execute(array(':id_produit'=>$_GET['id_delete']));
                        
                    

                    }

                    // Supression d'un langage

                    if(!empty($_GET['id_delete'])){
                        include_once dirname(__FILE__) . './../fonctions/connexion_sgbd.php';
                        $sgbd= connexion_sgbd();

                            $delete = $sgbd->prepare(" DELETE FROM langages WHERE id_langage=:id_produit");
                            $delete->execute(array(':id_produit'=>$_GET['id_delete']));
                        
                    

                    }
                    
                    


?>


    <nav>
        <ul>

            <li>
                <a href="../index.html">
                    Retour au site
                </a>
            </li>

            <li>
                <a href="index.php?ind=projets">
                    Projets
                </a>
            </li>

            <li>
                <a href="index.php?ind=langages">
                    Langages
                </a>
            </li>

            <li>
                <a href="index.php?ind=user">
                    Utilisateurs
                </a>
            </li>
            
        </ul>
    </nav>

    
</body>
</html>