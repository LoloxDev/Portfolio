<?php
    include_once dirname(__FILE__) . './../fonctions/connexion_sgbd.php';
    $sgbd= connexion_sgbd();
?>

<?php

if($_SESSION['username'] == "LoloxDev"){
   
?> 


<section id="projets">

<?php

$_GET['ind'] = 'projets';
    $editOrAdd="../exec/add_produits.php";
if (!empty($_GET['id_edit'])){
    $editOrAdd="../exec/edit_produits.php?id_edit=".$_GET['id_edit'];
}

// On créer un tableau pour regrouper les données 


$editInfo = array(
    'nom' => "",
    'obj' => "",
    'statut' => "",
);

if (!empty($_GET['id_edit'])) {

    // on fait la requete pour modifier les éléments

    $requeteEdit = $sgbd->prepare('SELECT projets.nom, projets.objectif, projets.statut, images.src, images.alt
    FROM projets INNER JOIN portfolio.images ON projets.id_img = images.id_img WHERE projets.id_projet=:id_projet');
    $requeteEdit->execute([":id_projet"=>$_GET["id_edit"]]);
    $resultat_requeteEdit = $requeteEdit->fetch((PDO::FETCH_ASSOC));

    $editInfo = array(
        
        'nom' => $resultat_requeteEdit['nom'],
        'obj' => $resultat_requeteEdit['objectif'],
        'statut' => $resultat_requeteEdit['statut'],

    );

    }

                // ici on echo le formulaire, on utilise editOrAdd sur l'affiction, elle nous enverra sur la bonne page de réception des données.
echo' 

    <form class="row text-center " action="'.($editOrAdd).'" method="post" enctype="multipart/form-data" >

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
            echo '
            <label class="form-switch">
                <input type="checkbox" name="arch" checked id="">
                <i></i>
                <p id=""></p>                                             
            </label>

             <div class="col-md-12 text-center form-group">
                    <label for="nom">Nom :</label>
                    <input class="form-control" type="text" name="nom" text_area="Nom" placeholder="Springfield" value="'.($editInfo['nom']).'" >

            </div> 

            <div class="col-md-12 form-group">

            <label for="categorie">Choisisez un statut:</label>
            <select class="form-control" name="statut" id="cat-select">';

                // Ici on donne l'attribut selected à la catégorie de base de l'élément qu'on souhaite modifier

            if(!empty($resultat_requeteEdit['statut'] == 'Offline')) {

                echo   '<option value="Offline" selected>Offline</option>
                        <option value="En cours de développement">En cours de développement</option>
                        <option value="Online">Online</option>';

            } elseif(!empty($resultat_requeteEdit['statut'] == 'En cours de développement')){

                echo   '<option value="Offline">Offline</option>
                        <option value="En cours de développement"selected>En cours de développement</option>
                        <option value="Online">Online</option>';
            } elseif(!empty($resultat_requeteEdit['statut'] == 'Online')){

                echo   '<option value="Offline">Offline</option>
                        <option value="En cours de développement">En cours de développement</option>
                        <option value="Online"selected>Online</option>';
            } else {

                echo
                        '<option value="Offline">Offline</option>
                        <option value="En cours de développement">En cours de développement</option>
                        <option value="Online">Online</option>';
            }
            
            echo '</select>

            </div>';

            // Idem pour les langages

            /*echo '<div class="col-md-12 form-group">

            <label for="categorie">Choisisez un un ou plusieurs langages:</label>
            <select multiple="oui" class="form-control" name="langages" id="cat-select">';

                 echo
                        '<option value="1">HTML</option>
                        <option value="2">CSS</option>
                        <option value="3">JavaScript</option>
                        <option value="4">MySQL</option>
                        <option value="5">PHP</option>
                        <option value="6">Bootstrap</option>
                        <option value="7">Photoshop</option>
                        <option value="8">Adobe Illustrator</option>
                        <option value="9">Gravit Designer</option>
                        <option value="10">Wordpress</option>
                        <option value="11">Sass</option>
                        <option value="12">Adobe XDesign</option>';
            
            echo '</select>

            </div>*/

             echo '<div class="col-md-12 text-center form-group">
                    <label for="description">Objectif :</label>            
                    <textarea name="story" height=500px class="form-control textarea">'.($editInfo['obj']).'</textarea>
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


                            // On reset la variable a chaque boucle 
                            $listeLang="";

                            foreach ($resultat_requeteLang as $allLang) {

                                $listeLang.=$allLang['nom']." ";
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
                                            <a class="tablebutton" href="index.php?ind=projets&id_edit='.($articleAdmin['pID']).'">
                                                <img src="../img/icons8-modifier.svg" class="testcolor">
                                            </a>
                                        </td>

                                        <td class="col-md-1 delete">
                                            <a class="tablebutton" onclick="window.open(\'../exec/delete_produits.php?id_delete='.($articleAdmin['pID']).'\',\'pop_up\',\'width=300, height=200, toolbar=no status=no\');">
                                                <img src="../img/poubelle.svg" class="testcolor">
                                            </a>
                                        </td>

                                        <td class="col-md-1 arch">    

                                            <label class="form-switch">
                                                <input type="checkbox" checked onchange="Check(this)" id="'.($articleAdmin['pNom']).'Selector">
                                                <i></i>
                                                <p id="verdict'.($articleAdmin['pNom']).'"></p>                                             
                                            </label>

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

<?php } else { echo 'Acces non autorisé';} ?>

