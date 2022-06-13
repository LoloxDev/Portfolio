<?php
    include 'index.php';
    include_once dirname(__FILE__) . './../fonctions/connexion_sgbd.php';
    $sgbd= connexion_sgbd();
?>

<?php

/* if (!empty($_SESSION) && array_key_exists('id_user', $_SESSION) && 
array_key_exists('id_admin', $_SESSION) && array_key_exists('nom', $_SESSION) && 
array_key_exists('prenom', $_SESSION) && array_key_exists('login', $_SESSION) && 
array_key_exists('email', $_SESSION) && $_SESSION['id_admin'] != 4 
&& ($_SESSION['id_admin'] == 1 || $_SESSION['id_admin'] == 2)) { */
   
?> 


<section id="projets">

<?php

$_GET['ind'] = 'projets';
    $editOrAdd="../../../exec/add_produits.php";
if (!empty($_GET['id_edit'])){
    $editOrAdd="edit_produits.php?id_edit=".$_GET['id_edit'];
}

// On créer un tableau pour regrouper les données 


$editInfo = array(
    'nom' => "",
    'obj' => "",
    'statut' => "",
    'langage' => ""
);

if (!empty($_GET['id_edit'])) {

    // on fait la requete pour modifier les éléments

    $requeteEdit = $sgbd->prepare('SELECT projets.nom, projets.objectif, projets.statut, projets.id_langages, images.src, images.alt
    FROM projets INNER JOIN portfolio.images ON projets.id_img = images.id_img WHERE produits.id_produit=:id_produit');
    $requeteEdit->execute([":id_produit"=>$_GET["id_edit"]]);
    $resultat_requeteEdit = $requeteEdit->fetch((PDO::FETCH_ASSOC));

    $editInfo = array(
        
        'nom' => $resultat_requeteEdit['nom'],
        'obj' => $resultat_requeteEdit['objectif'],
        'statut' => $resultat_requeteEdit['statut'],
        'langage' => $resultat_requeteEdit['id_langages'],

    );

    }

                // ici on echo le formulaire, on utilise editOrAdd sur l'affiction, elle nous enverra sur la bonne page de réception des données.
echo' 

    <form class="row text-center " action="./src/exec/'.($editOrAdd).'" method="post" enctype="multipart/form-data" >

            <div class="col-md-12 text-center form-group">
                <input  type="file" id="file" name="file"  accept="image/png, image/jpeg, image/webp"/>';
                // ici on dit que s'il y a une photo, alors on remplace la photo par celle qu'on veux éditer
            if(!empty($resultat_requeteEdit['src'])) {
                echo '<img id="add-img" src="../data/img/'.($resultat_requeteEdit['src']).'" alt="'.($resultat_requeteEdit['alt']).'" class="img-fluid" />
                </div>';
            } else { // Sinon, on ajoute la photo de base ( upload image )
                echo '<img id="add-img" src="../img/icons8-ajouter-une-image-90.png"  class="img-fluid" />
                </div>';
            }
            echo '<div class="col-md-12 text-center form-group">
                    <label for="nom">Nom :</label>
                    <input class="form-control" type="text" name="nom" text_area="Nom" placeholder="Springfield" value="'.($editInfo['nom']).'" >

            </div> 

            <div class="col-md-12 form-group">

            <label for="categorie">Choisisez un statut:</label>
            <select class="form-control" name="statut" id="cat-select">';

                // Ici on donne l'attribut selected à la catégorie de base de l'élément qu'on souhaite modifier

            if(!empty($resultat_requeteEdit['statut'] == 'Offline')) {

                echo   '<option value="1" selected>Offline</option>
                        <option value="3">En cours de développement</option>
                        <option value="2">Online</option>';

            } elseif(!empty($resultat_requeteEdit['cat'] == 'En cours de développement')){

                echo   '<option value="1">Offline</option>
                        <option value="3"selected>En cours de développement</option>
                        <option value="2">Online</option>';
            } elseif(!empty($resultat_requeteEdit['cat'] == 'Online')){

                echo   '<option value="1">Offline</option>
                        <option value="3">En cours de développement</option>
                        <option value="2"selected>Online</option>';
            } else {

                echo
                        '<option value="1">Offline</option>
                        <option value="3">En cours de développement</option>
                        <option value="2">Online</option>';
            }
            
            echo '</select>

            </div>

            <div class="col-md-12 text-center form-group">
                   <label for="lieu">Langages</label>
                   <input class="form-control" type="text" name="langages" text_area="Langages" placeholder="HTML" value="'.($editInfo['langage']).'"> 
            </div>

            <div class="col-md-12 text-center form-group">
                    <label for="description">Objectif :</label>            
                    <textarea name="story" height=500px class="form-control textarea" readonly>'.($editInfo['obj']).'</textarea>
                </figure>
            </div>

            <button class="col-md-12 boutton form-control" type="submit">Valider</button>

    </form>';

?>

    <div>
        <h1 class="text-center">Les projets</h1>
        <table class="table table-dark">

            <thead>

                <tr>

                    <th>Image</th>
                    <th>Nom</th>
                    <th>Objectif</th>
                    <th>Statut</th>
                    <th>Langages</th>

                </tr>

            </thead>
            
            <tbody>

                <?php // Ici la requête pour le tableau

                        $requeteAdmin = $sgbd->query ('SELECT images.src, images.alt, projets.nom as pNom, projets.id_projet as pID, projets.id_img, projets.objectif, projets.statut
                        FROM projets INNER JOIN portfolio.images ON projets.id_img = images.id_img');

                        $requeteAdmin->execute();

                        $resultat_requeteAdmin = $requeteAdmin->fetchAll((PDO::FETCH_ASSOC));

                        // On affiche le tableau 

                        


                        foreach ($resultat_requeteAdmin as $articleAdmin) {

                            $requeteLang = $sgbd->prepare ('SELECT langages.nom FROM langages INNER JOIN langages_projets ON langages.id_langage = langages_projets.id_langage WHERE id_projet = :id_projet');
                            $requeteLang->bindParam(':id_projet', $articleAdmin['pID']);

                            $requeteLang->execute();
                            
                            
                            $resultat_requeteLang = $requeteLang->fetchAll((PDO::FETCH_ASSOC));

                            $listeLang="";

                            foreach ($resultat_requeteLang as $allLang) {

                                $listeLang.=$allLang['nom'].",";
                                //$listeLang=$listeLang.$allLang['nom'].",";
                            }

                            echo   '<tr>
                                        <td>';
                                        echo  '<img src="../img/'.($articleAdmin['src']).'" alt="'.($articleAdmin['alt']).'"';
                                        echo 
                                        '</td>
                                        <td>'.($articleAdmin['pNom']).'</td>
                                        <td>'.($articleAdmin['objectif']).'</td>
                                        <td>'.($articleAdmin['statut']).'</td>
                                        <td>';

                                        echo $listeLang;




                                        echo '
                                        </td>
                                        <td class="col-md-1 edit">
                                            <a class="tablebutton" href="index.php?ind=desc&id_edit='.($articleAdmin['pID']).'">
                                                <img src="../img/icons8-modifier.svg" class="testcolor">
                                            </a>
                                        </td>
                                        <td class="col-md-1 delete">
                                            <a class="tablebutton" onclick="window.open(\'./src/exec/delete_produits.php?id_delete='.($articleAdmin['pID']).'\',\'pop_up\',\'width=300, height=200, toolbar=no status=no\');">
                                                <img src="../img/poubelle.svg" class="testcolor">
                                            </a>
                                        </td>
                                    </tr>';

                        }

                ?>

            </tbody>

        </table>
    </div>
</section>

<script>

function loadFiles(event) {
    // on recupere la liste des fichiers
    let files = event.target.files;
    // Ou visualiser l'image qui sera telecharge
    let preview = document.getElementById("add-img");
    // une boucle sur les fichiers telecharges
    for (var i = 0; i < files.length; i++) {
        // recuperation du fichier
        var file = files[i];
        // le type du fichier
        var imageType = /^image\//;
  
        // verifier qu'on a bien une image, sinon on n'affiche rien.
        if (!imageType.test(file.type)) {
            continue;
        }

        // on vide l'image par defaut et on ajoute le fichier
        preview.src = "";
        preview.file = file;

        // ici on affiche l'image sur la page html (ne surtout pas le supprimer).
        var reader = new FileReader();
        reader.onload = (function(aImg) {
            return function(e) { 
                aImg.src = e.target.result;
                };
        })(preview);
        reader.readAsDataURL(file);
    }
}

/*
ajouter une image dans le telechargement
*/
function img_add() {
    document.getElementById('file').click();
}

// en cas de changement de fichier (ici d'image)
document.getElementById('file').addEventListener('change', loadFiles);
// quand on clique sur le bouton pour ajouter une image
document.getElementById('add-img').addEventListener('click', img_add);


</script>


<script src="../src/bbcode_editeur/bbcode.js"></script>

<?php  // } else { echo 'Acces non autorisé';} ?>
