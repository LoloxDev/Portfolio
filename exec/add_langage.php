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
$id_img=$sgbd->lastInsertID();
$nom = validation_donnees($_POST["nom"]);
$type = validation_donnees($_POST["type"]);


if(!empty($_FILES) && array_key_exists('file', $_FILES) && !empty($_FILES['file']['name'])) {
    $name = validation_donnees($_FILES['file']['name']);
    $nomphoto= validation_donnees("Une photo de ".$nom.".");
    $sth = $sgbd->prepare("
    INSERT INTO images (id_img, id_projet, src, alt, titre)
    VALUES (:id, :id_pro, :src, :alt, :titre)");
    /*$sth->bindParam(':id',($id_produit), PDO::PARAM_INT);
    $sth->bindParam(':src',($name), PDO::PARAM_STR);
    $sth->bindParam(':alt',($nomphoto), PDO::PARAM_STR);
    $sth->bindParam(':titre',($nom), PDO::PARAM_STR);*/
    $sth->execute([
        ':id' => $id_img,
        ':id_pro' => 0,
        ':src' => $name,
        ':alt' => $nomphoto,
        ':titre' => $nom,
    ]);
    if(move_uploaded_file($_FILES['file']['tmp_name'], "../data/img/".$name)) {
        echo ' "Le fichier ".$name." a été sauvegardé.<br />"; ';
    } else {
        echo "Erreur lors du téléchargement du fichier ".$name.".";
    }
} else {
echo "Vous devez envoyer un fichier.";
}

$id_img2=$sgbd->lastInsertID();
$sth = $sgbd->prepare("
INSERT INTO langages (nom, type, id_img)
VALUES (:nom, :type, :id_img)");
/*$sth->bindParam(':nom',$nom, PDO::PARAM_STR);
$sth->bindParam(':id_cat',$cat, PDO::PARAM_INT);
$sth->bindParam(':lieu',$lieu, PDO::PARAM_STR);
$sth->bindParam(':description',$message, PDO::PARAM_STR);
$sth->bindParam(':id_user',$_SESSION["id_user"]);*/
$sth->execute([
':nom' => $nom,
':type' => $type,
':id_img' => $id_img2,
]);



header('location:../php/index.php?ind=langages');

} else { echo 'Acces interdit';} ?>


