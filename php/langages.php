<?php
    include_once dirname(__FILE__) . './../fonctions/connexion_sgbd.php';
    $sgbd= connexion_sgbd();
?>

<section id="projets">

    <div>
        <h1 class="text-center">Les projets</h1>
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

                        $requeteAdmin = $sgbd->query ('SELECT images.src, images.alt, langages.nom, langages.type
                        FROM langages INNER JOIN portfolio.images ON langages.id_img = images.id_img');

                        $requeteAdmin->execute();

                        $resultat_requeteAdmin = $requeteAdmin->fetchAll((PDO::FETCH_ASSOC));

                        // On affiche le tableau 

                        foreach ($resultat_requeteAdmin as $articleAdmin) {


                            echo   '<tr>
                                        <td> '.($articleAdmin['src']).'
                                        </td>
                                        <td>'.($articleAdmin['type']).'</td>
                                        <td>'.($articleAdmin['nom']).'</td>';
                                        /*
                                        <td class="col-md-1 edit">
                                            <a class="tablebutton" href="index.php?ind=desc&id_edit='.($articleAdmin['id_produit']).'">
                                                <img src="src/img/icons8-modifier.svg" class="testcolor">
                                            </a>
                                        </td>
                                        <td class="col-md-1 delete">
                                            <a class="tablebutton" onclick="window.open(\'./src/exec/delete_produits.php?id_delete='.($articleAdmin['id_produit']).'\',\'pop_up\',\'width=300, height=200, toolbar=no status=no\');">
                                                <img src="src/img/poubelle.svg" class="testcolor">
                                            </a>
                                        </td>
                                    </tr>';*/

                        }

                ?>

            </tbody>

        </table>
    </div>
</section>