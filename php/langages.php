<?php
    include_once dirname(__FILE__) . './../fonctions/connexion_sgbd.php';
    $sgbd= connexion_sgbd();
?>

<section id="projets">

<?php

$_GET['ind'] = 'lang';
    $editOrAdd="../exec/add_langage.php";
if (!empty($_GET['id_edit'])){
    $editOrAdd="../exec/edit_langage.php?id_edit=".$_GET['id_edit'];
}

// On créer un tableau pour regrouper les données 


$editInfo = array(
    'nom' => "",
    'type' => "",
);

if (!empty($_GET['id_edit'])) {

    // on fait la requete pour modifier les éléments

    $requeteEdit = $sgbd->prepare('SELECT langages.nom, langages.type, images.src, images.alt
    FROM langages INNER JOIN portfolio.images ON langages.id_img = images.id_img WHERE langages.id_langage=:id_lang');
    $requeteEdit->execute([":id_lang"=>$_GET["id_edit"]]);
    $resultat_requeteEdit = $requeteEdit->fetch((PDO::FETCH_ASSOC));

    $editInfo = array(
        
        'nom' => $resultat_requeteEdit['nom'],
        'type' => $resultat_requeteEdit['type'],
        'src' => $resultat_requeteEdit['src'],
        'alt' => $resultat_requeteEdit['alt'],

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
            echo '<div class="col-md-12 text-center form-group">
                    <label for="nom">Nom :</label>
                    <input class="form-control" type="text" name="nom" text_area="Nom" placeholder="Springfield" value="'.($editInfo['nom']).'" >

            </div> 

            <div class="col-md-12 form-group">

            <label for="categorie">Choisisez un type de langage:</label>
            <select class="form-control" name="type" id="cat-select">';

                // Ici on donne l'attribut selected à la catégorie de base de l'élément qu'on souhaite modifier

            if(!empty($resultat_requeteEdit['type'] == 'Programmation')) {

                echo   '<option value="Programmation" selected>Programmation</option>
                        <option value="Design">Design</option>';

            } elseif(!empty($resultat_requeteEdit['type'] == 'Design')){

                echo   '<option value="Programmation">Programmation</option>
                        <option value="Design"selected>Design</option>';
            } else {

                echo
                        '<option value="Programmation">Programmation</option>
                        <option value="Design">Design</option>';
            }
            
            echo '</select>

            </div>

            <button class="col-md-12 boutton form-control" type="submit">Valider</button>

    </form>';

    ?>

    <div>
        <h1 class="text-center">Les langages</h1>
        <table class="table table-dark">

            <thead>

                <tr>

                    <th>Image</th>
                    <th>Type de langage</th>
                    <th>Nom</th>

                </tr>

            </thead>
            
            <tbody>

                <?php // Ici la requête pour le tableau

                        $requeteAdmin = $sgbd->query ('SELECT images.src, images.alt, langages.nom, langages.type, langages.id_langage
                        FROM langages INNER JOIN portfolio.images ON langages.id_img = images.id_img');

                        $requeteAdmin->execute();

                        $resultat_requeteAdmin = $requeteAdmin->fetchAll((PDO::FETCH_ASSOC));

                        // On affiche le tableau 

                        $span = "span";


                        foreach ($resultat_requeteAdmin as $articleAdmin) {


                            echo   '<tr>';

                                if(strpos($articleAdmin['src'], $span) == false){
                                    echo'
                                
                                        <td> <img src="../img/'.($articleAdmin['src']).'" alt="'.($articleAdmin['alt']).'";
                                        </td>'; } else {
                                            echo '<td>'.($articleAdmin['src']).'</td>'
                                        ;}

                                        echo '<td>'.($articleAdmin['type']).'</td>
                                        <td>'.($articleAdmin['nom']).'</td>
                                        
                                        <td class="col-md-1 edit">
                                            <a class="tablebutton" href="index.php?ind=langages&id_edit='.($articleAdmin['id_langage']).'">
                                                <img src="../img/icons8-modifier.svg" class="testcolor">
                                            </a>
                                        </td>
                                        <td class="col-md-1 delete">
                                        <a class="tablebutton" onclick="window.open(\'../exec/delete_langage.php?id_delete='.($articleAdmin['id_langage']).'\',\'pop_up\',\'width=300, height=200, toolbar=no status=no\');">
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