<?php 

session_start();
if($_SESSION['username'] == "LoloxDev"){



    include_once dirname(__FILE__) . './../fonctions/connexion_sgbd.php';
    $sgbd= connexion_sgbd();

function validation_donnees($donnees){
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees);
    return $donnees;
}

$id_projet = validation_donnees($_POST["id_"]);

$sth = $sgbd->prepare(" UPDATE langages SET langages.nom = :nom, langages.type = :type
 WHERE langages.id_langage=:id_langage");

$sth->bindParam(':nom',$nom);
$sth->bindParam(':type',$type);
$sth->bindParam(':id_langage',$_GET["id_edit"]);
$sth->execute();
/* Pour les modifications, Rajouter un if else ( SI la page existe alors la modifier SINON la créer ) */
/* Pour rajouter la photos, créer une autre requetes sql INSERT aec le $id_produit */




 if(!empty($_FILES) && array_key_exists('file', $_FILES) && !empty($_FILES['file']['name'])) {
        $name=$_FILES["file"]["name"];
        $nomphoto="Une photo de ".$nom.".";
        $sth = $sgbd->prepare('UPDATE images SET images.src = :src, images.alt = :alt, images.titre = :titre WHERE images.id_projet=:id_projet');
        /*$sth->bindParam(':id_produit',validation_donnees($_GET["id_edit"]));
        $sth->bindParam(':src',validation_donnees($name));
        $sth->bindParam(':alt',validation_donnees($nomphoto));
        $sth->bindParam(':titre',validation_donnees($nom));*/
        $sth->execute([
            ':id_projet' => validation_donnees($_GET["id_edit"]),
            ':src' => validation_donnees($name),
            ':alt' => validation_donnees($nomphoto),
            ':titre' => validation_donnees($nom)
        ]);
        if(move_uploaded_file($_FILES['file']['tmp_name'], "../data/img/".$name)) {
            echo "Le fichier ".$name." a été sauvegardé.<br />";
        }
}


header('location:../php/index.php?ind=langages');

} else { echo 'Acces interdit';}




INSERT INTO table1 (colonne1, colonne2) SELECT col1, col2 FROM table 2

?>