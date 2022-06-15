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

$nom = validation_donnees($_POST["nom"]);
$statut = validation_donnees($_POST["statut"]);
$message = validation_donnees($_POST["story"]);
//$langages = validation_donnees($_POST["langages"]);

$sth = $sgbd->prepare(" UPDATE projets SET projets.nom = :nom, projets.statut = :statut, projets.objectif = :msg 
 WHERE projets.id_projet=:id_projet");

$sth->bindParam(':nom',$nom);
$sth->bindParam(':statut',$statut);
$sth->bindParam(':msg',$message);
$sth->bindParam(':id_projet',$_GET["id_edit"]);
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


header('location:../php/index.php?ind=projets');

} else { echo 'Acces interdit';}

?>